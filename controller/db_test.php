<?php
require_once __DIR__ . "/../model/dao/Database.php";
require_once __DIR__ . "/../model/Serie.php";
require_once __DIR__ . "/../model/Genre.php";
require_once __DIR__ . "/../model/dao/requests/SerieRequest.php";

use model\dao\Database;
use model\Serie;
use model\Genre;
use model\dao\requests\SerieRequest;

$linkPDO = Database::getInstance("amdjad", "9wms351v")->getConnection();

$serieRequest = new SerieRequest();

try {
    $sql = "SELECT serie.id FROM serie
            JOIN serie_genre ON serie.id = serie_genre.serie_id
            JOIN genre ON serie_genre.genre_id = genre.id
            WHERE genre.genre_name = :genre";
    $stmt = $linkPDO->prepare($sql);
    $stmt->execute(array(':genre' => 'Action'));

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$data) {
        die("ERROR 404 : Données introuvables !");
    }
    //print_r($data);
    $series = array();
    foreach ($data as $row) {
        echo $row['id']." ";
        $series[] = $serieRequest->getSerie($row['id']);
    }

    foreach ($series as $serie) {
        echo $serie->toString();
        echo "<br>";
        echo "<br>";
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

