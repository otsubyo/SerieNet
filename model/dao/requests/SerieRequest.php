<?php
namespace model\dao\requests;

require_once(__DIR__ . "/../../dao/Database.php");
use model\Serie;
use PDO;
use function libs\deliverResponse;
use model\dao\Database;

/**
 * Une classe représentant une requete sur les séries
 */
class SerieRequest
{
    private $linkpdo;

    public function __construct()
    {
        $this->linkpdo = Database::getInstance('root', "9wms351v")->getConnection();
    }

    public function getGenresSerie($id): array
    {
        $sql = "SELECT genre.genre_name
                FROM serie
                         JOIN serie_genre ON serie.id = serie_genre.serie_id
                         JOIN genre ON serie_genre.genre_id = genre.id
                WHERE serie.id = :id";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id' => $id));
        (array) $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data) {
            die("ERROR 404 : Données introuvable !");
        }
        return $data;
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
        return new Serie($data['id'], $data['nom'], $genres, $data['etoiles'], $data['synopsis']);
    }

    public function getSeries($id, $lang = "VF"): array
    {
        // Construire l'URL de l'API Flask
        $apiUrl = "http://localhost:5000/search/$id/$lang";

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
            $series[] = $this->getSerie($serie['id']);
        }
        return $series;
    }
}
