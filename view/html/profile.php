<?php
namespace view\html;

require_once(__DIR__ . "/../../model/dao/requests/UserRequest.php");
require_once(__DIR__ . "/../../libs/jwt-utils.php");
require_once(__DIR__ . "/../../model/dao/requests/ProfilRequest.php");

use model\dao\requests\ProfilRequest;
use model\dao\requests\UserRequest;

session_start();
if (!isset($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$user = $_SESSION['login'];

$userRequest = new ProfilRequest();
$profiles = $userRequest->getProfils($user);

$images = array("blue.jpg", "red.jpg", "green.jpg");
shuffle($images);
$i = 0;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qui est-ce ?</title>
    <link rel="stylesheet" href="../css/style_profile.css">
    <link rel="icon" href="../../ressources/images/sn-logo.png">
</head>

<body>
    <div class="logo-container">
        <h1>Serie<span>.Net</span></h1>
    </div>

    <h2> <a href="login.php" style="text-decoration: none"> Qui est-ce ?</a></h2>
    <div class="team-profile">
        <div class="profile-container">
            <?php foreach ($profiles as $profile) { ?>
                <a href="index.php" class="profile-card">
                    <img src="../../ressources/images/<?= $images[$i] ?>" alt="profile picture">
                    <h3><?= $profile->getNom() ?></h3>
                </a>
                <?php $i++; ?>
            <?php } ?>
        </div>
    </div>
</body>

</html>
