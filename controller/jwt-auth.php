<?php
namespace controller;

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once(__DIR__ . "/../model/dao/requests/UserRequest.php");
require_once(__DIR__ . "/../model/Utilisateur.php");
require_once __DIR__ . "/../libs/functions-utils.php";
require_once(__DIR__ . "/../libs/jwt-utils.php");
use model\dao\requests\UserRequest;
use function libs\deliverResponse;
use function libs\isValidUser;

// Paramétrage de l'entête HTTP (pour la réponse au Client)
header("Content-Type:application/json");

// Identification du type de méthode HTTP envoyée par le client
$http_method = $_SERVER['REQUEST_METHOD'];
if ($http_method == 'POST') {
    $data = (array) json_decode(file_get_contents('php://input'), true);
    $userRequest = new UserRequest();
    if (!isset($data['identifiant']) || !isset($data['clef'])) {
        deliverResponse(400, "Requête invalide", null);
        exit();
    }
    if (isValidUser($data['identifiant'], $data['clef'])) {
        // Traitement
        $username = $userRequest->getUser($data['identifiant']);
        $headers = array(
            'typ' => 'JWT',
            'alg' => 'HS256'
        );

        $payload = array(
            'identifiant' => $username->getIdentifiant(),
            'exp' => (time() + 3600)
        );
        $jwt = generate_jwt($headers, $payload);
        deliverResponse(200, "Vous êtes connecté en tant que ".$username->getIdentifiant(), $jwt);
        syslog(LOG_INFO, "L'utilisateur ".$username->getIdentifiant()." s'est connecté avec succès");
    } else {
        deliverResponse(401, "Identifiant ou mot de passe incorrect veuillez reessayer de nouveau !", null);
    }
} else {
    deliverResponse(201, "En attente de REQUEST", null);
}


