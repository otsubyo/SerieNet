<?php
namespace view\html;
require_once(__DIR__ . "/../../model/dao/requests/SerieRequest.php");


use model\dao\requests\SerieRequest;

session_start();
if (!isset($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$serieRequest = new SerieRequest();

if (isset($_GET['id'])) {
    $serie = $serieRequest->getSerie($_GET['id']);
} else {
    exit();
}


?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>SERIE NET</title>
    <link rel="stylesheet" href="../css/base_style.css">
    <link rel="stylesheet" href="../css/style_serief.css">
    <link rel="icon" href="../../ressources/images/sn_logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="navigation-bar">
    <div class="logo">
        <a href="index.php" style="text-decoration: none"><span class="logo">Serie</span><span class="logo1">.Net</span></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#">Votre liste</a></li>
            <li><a href="explore.php">Explorer</a></li>
            <li><a href="login.php">Déconnexion</a></li>
        </ul>
    </div>
    <!-- Barre de recherche -->
    <form action="" class="search-bar" method="post" onsubmit="return redirectToPage()">
        <label for="search-bar"></label><input type="search" id="search-bar" name="search"
                                               placeholder=" Rechercher une série..." required>
    </form>
</div>
<div class="bg-img">
    <!-- Affichage des informations de la série -->
    <div class="box-content">
        <div class="serie-infos">
            <div class="serie-infos-img">
                <?php echo "<img src=" . "../../ressources/posts/" . $serie->getImage() . " alt=''>"; ?>
            </div>
            <div class="serie-infos-text">
                <h1><?= $serie->getNom() ?></h1>
                <p><strong style="color: #AD241B">Synopsis</strong> : <?= $serie->getSynopsis() ?></p>
                <p><strong style="color: #AD241B">Etoiles</strong> : <?= $serie->getEtoiles() ?></p>
                <p><strong style="color: #AD241B">Genre</strong> : <?= $serie->getGenresString() ?></?>
            </div>
        </div>

        <!-- Bouton pour ajouter la série à la liste -->
        <div class="serie-infos-btn">
            <button type="button" class="btn btn-primary">Ajouter à ma liste</button>
        </div>
    </div>

</div>
</body>
<script src="../js/script.js"></script>
</html>