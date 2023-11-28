<?php
namespace model\dao\requests;

require_once(__DIR__ . "/../../dao/Database.php");
require_once(__DIR__ . "/../../Serie.php");
require_once(__DIR__ . "/../../Genre.php");

use model\Genre;
use model\Serie;
use PDO;
use model\dao\Database;

/**
 * Une classe représentant une requete sur les séries
 */
class SerieRequest
{
    private PDO $linkpdo;

    public function __construct()
    {
        $this->linkpdo = Database::getInstance('root', "9wms351v")->getConnection();
    }

    public function getGenresSerie(string $serieID): array
    {
        $sql = "SELECT genre.id,genre.genre_name
                FROM serie
                         JOIN serie_genre ON serie.id = serie_genre.serie_id
                         JOIN genre ON serie_genre.genre_id = genre.id
                WHERE serie.id = :id";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id' => $serieID));
        (array) $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data) {
            die("ERROR 404 : Données introuvable !");
        }
        $genres = array();
        foreach ($data as $row) {
            $genres[] = new Genre($row['id'],$row['genre_name']);
        }
        return $genres;
    }

    public function getSerie($id): Serie
    {
        $sql = "SELECT * FROM serie WHERE id = :id";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id' => $id));
        (array) $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data) {
            die("ERROR 404 : Données introuvable !");
        }
        $genres = $this->getGenresSerie($id);
        return new Serie($data['id'], $data['name'], $genres, $data['etoiles'], $data['synopsis']);
    }

    public function getSeriesSearch($id, $lang = "VF"): array
    {
        // Construire l'URL de l'API Flask
        $encodedId = urlencode($id);
        if (!in_array($lang, array('VF', 'VO'))) {
            die('Erreur : la langue doit être VF ou VO.');
        }
        $apiUrl = "http://localhost:5000/search?id=$encodedId&lang=$lang";

        // Effectuer la requête GET
        $response = file_get_contents($apiUrl);

        // Vérifier si la requête a réussi
        if ($response === false) {
            die('Erreur lors de la récupération des données depuis l\'API.');
        }

        // Décoder la réponse JSON
        $data = json_decode($response, true);

        // Vérifier si le décodage JSON a réussi
        if ($data === null) {
            die('Erreur lors du décodage de la réponse JSON : ' . json_last_error_msg());
        }

        $series = array();
        foreach ($data as $serie) {
            $series[] = $this->getSerie($serie);
        }
        return $series;
    }

    /*
     * Retourne les séries correspondant à un genre donné
     * @param string $genre
     * @return array
     */
    public function getSerieByGenre(string $genre): array
    {
        $sql = "SELECT serie.id FROM serie
                         JOIN serie_genre ON serie.id = serie_genre.serie_id
                         JOIN genre ON serie_genre.genre_id = genre.id
                WHERE genre.genre_name = :genre";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':genre' => $genre));
        (array) $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data) {
            die("ERROR 404 : Données introuvable !");
        }

        $series = array();
        foreach ($data as $row) {
            $series[] = $this->getSerie($row['id']);
        }
        return $series;
    }
}
