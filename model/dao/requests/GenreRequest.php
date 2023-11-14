<?php
namespace model\dao\requests;

require_once(__DIR__ . "/../../dao/Database.php");
use model\Serie;
use PDO;
use function libs\deliverResponse;
use model\dao\Database;
use model\dao\requests\SerieRequest;

class GenreRequest
{
    private $linkpdo;

    public function __construct()
    {
        $this->linkpdo = Database::getInstance('root', "9wms351v")->getConnection();
    }

    public function getGenres(): array
    {
        $sql = "SELECT * FROM genre";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute();
        (array) $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data) {
            die("ERROR 404 : Données introuvable !");
        }
        return $data;
    }

    public function getGenre($id): array
    {
        $sql = "SELECT * FROM genre WHERE id = :id";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id' => $id));
        (array) $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$data) {
            die("ERROR 404 : Données introuvable !");
        }
        return $data;
    }

    public function getSeriesGenre($id): array
    {
        $sql = "SELECT serie.id, serie.name, serie.etoiles, serie.synopsis
                FROM serie
                         JOIN serie_genre ON serie.id = serie_genre.serie_id
                         JOIN genre ON serie_genre.genre_id = genre.id
                WHERE genre.id = :id";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id' => $id));
        (array) $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$data) {
            die("ERROR 404 : Données introuvable !");
        }
        $series = array();
        $serieRequest = new SerieRequest();
        foreach ($data as $serie) {
            $series[] = $serieRequest->getSerie($serie['id']);
        }
        return $series;
    }

    public function insertGenre($name)
    {
        $sql = "INSERT INTO genre (genre_name) VALUES (:name)";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':name' => $name));
    }

    public function deleteGenre($id)
    {
        $sql = "DELETE FROM genre WHERE id = :id";
        $stmt = $this->linkpdo->prepare($sql);
        $stmt->execute(array(':id' => $id));
    }

}
