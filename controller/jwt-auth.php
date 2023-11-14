<?php
namespace controller;

require_once(__DIR__ . "/../model/dao/requests/UserRequest.php");
require_once(__DIR__ . "/../model/User.php");
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
    if (!isset($data['username']) || !isset($data['password'])) {
        deliverResponse(400, "Requête invalide", null);
        exit();
    }
    if (isValidUser($data['username'], $data['password'])) {
        // Traitement
        $username = $userRequest->getUser($data['username']);
        $headers = array(
            'typ' => 'JWT',
            'alg' => 'HS256'
        );

        $payload = array(
            'username' => $username->getLogin(),
            'role' => $username->getRole(),
            'exp' => (time() + 3600)
        );
        $jwt = generate_jwt($headers, $payload);
        deliverResponse(200, "Vous êtes connecté en tant que ".$username->getLogin()." avec le role ".$username->getRole(), $jwt);
        syslog(LOG_INFO, "L'utilisateur ".$username->getLogin()." s'est connecté avec succès");
    } else {
        deliverResponse(401, "Login ou mot de passe incorrect veuillez reessayer de nouveau !", null);
    }
} else {
    print_r("Serveur en attente de requête...\n");
}


