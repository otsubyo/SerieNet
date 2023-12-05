<?php
namespace controller;

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once(__DIR__ . "/../model/dao/requests/SerieRequest.php");
require_once(__DIR__ . "/../libs/functions-utils.php");

use model\dao\requests\SerieRequest;
use function libs\deliverResponse;

$serieRequest = new SerieRequest();

$http_method = $_SERVER['REQUEST_METHOD'];

switch ($http_method) {
    // Cas de la méthode GET
    case "GET":
        if (isset($_GET['id']) && isset($_GET['lang'])) {
            $id = htmlspecialchars($_GET['id']);
            $lang = htmlspecialchars($_GET['lang']);
            $series = $serieRequest->getSeriesSearch($id, $lang);
            if ($series != null) {
                deliverResponse(200, "Series trouvees", $series);
            } else {
                deliverResponse(404, "Series non trouvees", null);
            }
        } elseif (isset($_GET['genre'])) {
            $genre = htmlspecialchars($_GET['genre']);
            $series = $serieRequest->getSerieByGenre($genre);

            if ($series != null) {
                deliverResponse(200, "Series trouvees", $series);
            } else {
                deliverResponse(404, "Series non trouvees", null);
            }
        } elseif (isset($_GET['id']) && !isset($_GET['lang'])) {
            deliverResponse(400, "Requete invalide", null);
        } else {
            $series = $serieRequest->getAllSeries();
            deliverResponse(200, "Toutes les series", $series);
        }
        break;
    // Cas de la méthode POST
    case "POST":
        deliverResponse(500, "Requete non implementee", null);

}
