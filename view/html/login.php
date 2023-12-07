<?php
namespace view\html;

require_once(__DIR__ . "/../../model/dao/requests/UserRequest.php");
require_once(__DIR__ . "/../../libs/jwt-utils.php");
use model\dao\requests\UserRequest;

session_start();
if (isset($_SESSION['login'])) {
    session_destroy();
}

$username = null;
$password = null;

$userRequest = new UserRequest();
$URL = "http://localhost/SerieNet/controller/jwt-auth.php";

if (isset($_POST['btn-validate'])) {
    $username = $_POST['inputUsername'];

    $user = $userRequest->getUser($username);
    // POST AUTH
    $data = array("identifiant" => $username, "clef" => $_POST['inputPassword']);
    $data_string = json_encode($data);
    $result = file_get_contents($URL,
        false,
        stream_context_create(array('http' => array('method' => 'POST',
            'content' => $data_string,
            'header' => array('Content-Type: application/json'."\r\n"
                .'Content-Length: '.strlen($data_string)."\r\n"))))
        );
        $receveid_data = json_decode($result, true);

    if ($receveid_data['status'] == 200) {
        $_SESSION['login'] = $user->getIdentifiant();
        $_SESSION['start_time'] = time();
        $_SESSION['token'] = get_bearer_token();
        header("Location: profile.php");
        exit();
    } else {
        echo "Erreur de connexion";
    }
}
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>SERIE NET</title>
    <link rel="stylesheet" href="../css/style_login.css">
    <link rel="icon" href="../../ressources/images/sn_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="bg-img">
    <div class="content">
        <header>Bienvenue sur <span class="logo logo1">Serie</span><span class="logo logo2">.Net</span></header>
        <form action="" method="post">
            <div class="field">
                <span class="fa fa-user"></span>
                <label>
                    <input type="text" required placeholder="Nom d'utilisateur..." name="inputUsername">
                </label>
            </div>
            <div class="field space">
                <span class="fa fa-lock"></span>
                <label>
                    <input type="password" class="pass-key" required placeholder="Mot de passe..." name="inputPassword">
                </label>
                <span class="show">Voir</span>
            </div>
            <div class="pass">
                <a href="#">Mot de passe oublié ?</a>
            </div>
            <div class="field">
                <input type="submit" value="CONNEXION" name="btn-validate">
            </div>
        </form>

        <div class="signup">
            Pas encore membre ?
            <a href="#">S'insricre maintenant</a>
        </div>
    </div>
</div>
</body>
</html>
