<?php
namespace libs;

require_once __DIR__ . "/../model/dao/requests/UserRequest.php";
require_once __DIR__ . "/../model/Utilisateur.php";
use Exception;
use model\dao\requests\UserRequest;
use model\Utilisateur;

/**
 * Cette fonction vérifie si l'utilisateur est valide
 * @param string $username
 * @param string $password
 * @return bool
 */
function isValidUser(string $username, string $password): bool
{
    $userRequest = new UserRequest();
    // Protection contre les injections SQL et XSS
    $user = $userRequest->getUser(htmlspecialchars($username));
    $pass = hash('sha256', htmlspecialchars($password));

    if ($user->getIdentifiant() == $username
        && $user->getMotDePasse() == $pass) {
        return true;
    }

    return false;
}

/**
 * Cette fonction envoie une réponse au client
 * @param $status
 * @param $statusMessage
 * @param $data
 * @return void
 */
function deliverResponse($status, $statusMessage, $data): void
{
    // Paramétrage de l'entête HTTP, suite
    header("HTTP/1.1 $status $statusMessage");

    // Paramétrage de la réponse retournée
    $response['status'] = $status;
    $response['status_message'] = $statusMessage;
    $response['data'] = $data;

    // Mapping de la réponse au format JSON
    $jsonResponse = json_encode($response);
    echo $jsonResponse;
}

/**
 * Cette fonction permet de récupérer le token JWT envoyé par le client et retourne l'utilisateur correspondant
 * @param string $bearer_token
 * @param UserRequest $userRequest
 * @return Utilisateur
 * @throws Exception
 */
function getJWTUser(string $bearer_token, UserRequest $userRequest): Utilisateur
{
    $jwt = str_replace('Bearer ', '', $bearer_token);
    $payload = decode_jwt($jwt);
    return $userRequest->getUser($payload['identifiant']);
}

