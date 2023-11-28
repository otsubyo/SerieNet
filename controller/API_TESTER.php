<?php
require_once(__DIR__ . "/../model/dao/requests/SerieRequest.php");
require_once(__DIR__ . "/../model/Serie.php");

use model\dao\requests\SerieRequest;
use model\Serie;

$serieRequest = new SerieRequest();

$series = $serieRequest->getSerieByGenre('Action');

foreach ($series as $serie){
    echo $serie->toString();
    echo "<br>";
    echo "<br>";
}
