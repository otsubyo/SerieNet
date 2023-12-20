<?php
namespace controller;

require_once __DIR__ . "/../model/dao/Recommandations.php";

use model\dao\Recommandations;

$recommendations = new Recommandations();

$recommandations = $recommendations->getRecommandationsSeries(4);

foreach ($recommandations as $recommandation) {
    echo $recommandation->getNom() . "<br>";
}
