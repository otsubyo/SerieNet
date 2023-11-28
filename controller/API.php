<?php
namespace controller;

require_once(__DIR__ . "/../libs/jwt-utils.php");
require_once(__DIR__ . "/../model/dao/requests/SerieRequest.php");
require_once(__DIR__ . "/../model/dao/requests/UserRequest.php");
require_once (__DIR__ . "/../libs/functions-utils.php");
require_once(__DIR__ . "/../model/Serie.php");

use model\dao\requests\SerieRequest;
use model\dao\requests\ProfilRequest;
use model\dao\requests\UserRequest;
use function libs\deliverResponse;

$http_method = $_SERVER['REQUEST_METHOD'];
$userRequest = new UserRequest();
$serieRequest = new SerieRequest();
$profilRequest = new ProfilRequest();

switch ($http_method) {
    // Cas de la méthode GET
    case "GET":
        if (isset($_GET['id']) && isset($_GET['lang'])) {
            $id = htmlspecialchars($_GET['id']);
            $lang = htmlspecialchars($_GET['lang']);
            $serie = $serieRequest->getSeriesSearch($id, $lang);
            if ($serie != null) {
                deliverResponse(200, "Série trouvée", $serie);
            } else {
                deliverResponse(404, "Série non trouvée", null);
            }
        }
        break;
    // Cas de la méthode POST
    case "POST":
        break;

}
