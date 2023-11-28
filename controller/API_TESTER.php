<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once(__DIR__ . "/../model/dao/requests/SerieRequest.php");
require_once(__DIR__ . "/../model/Serie.php");

use model\dao\requests\SerieRequest;
use model\Serie;

$serieRequest = new SerieRequest();

$series = $serieRequest->getSeriesSearch("avion crash île", "VF");

foreach ($series as $serie){
    echo json_encode($serie, JSON_PRETTY_PRINT);
    echo "<br>";
    echo "<br>";
}
