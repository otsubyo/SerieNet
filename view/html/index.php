<?php
namespace view\html;

require_once(__DIR__ . "/../../model/dao/requests/SerieRequest.php");

use model\dao\requests\SerieRequest;

session_start();
if (!isset($_SESSION['login'], $_GET['profile'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['profile'])) {
    $_SESSION['profile'] = $_GET['profile'];
}

$serieRequest = new SerieRequest();

$series = $serieRequest->getAllSeries(false);
shuffle($series);

$reprendre_lecture = array_slice($series, 0, 6);
$top_tendance = array_slice($series, 6, 8);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/base_style.css">
    <link rel="icon" href="../../ressources/images/sn_logo.png">
    <title>SERIE NET</title>
</head>
<body>
<div class="navigation-bar">
    <div class="logo">
        <a href="index.php" style="text-decoration: none"><span class="logo">Serie</span><span class="logo1">.Net</span></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="">Accueil</a></li>
            <li><a href="favorite.php">Votre liste</a></li>
            <li><a href="explore.php">Explorer</a></li>
            <li><a href="login.php">Déconnexion</a></li>
        </ul>
    </div>
    <!-- Barre de recherche -->
    <form action="" class="search-bar" method="post" onsubmit="return redirectToPage()" >
        <label for="search-bar"></label><input type="search" id="search-bar" name="search" placeholder=" Rechercher une série..." required>
    </form>
</div>
<section class="banner">
    <video autoplay muted loop id="banner-video">
        <source src="../../ressources/videos_annonce/4400.mp4" type="video/mp4">
    </video>
    <div class="banner-content">
        <h2>LES 4400</h2>
        <p>4 400 personnes portées disparues durant le xxe siècle,
            parfois depuis plus de 60 ans, réapparaissent en un seul et
            même lieu : Seattle (dans l'État de Washington, sur la côte
            ouest des États-Unis) suite au passage d'un mystérieux
            astéroïde.Pour chacune d'elles, le temps s'est arrêté,
            mais elles vont…</p>
        <button class="btn">Regarder</button>
    </div>
</section>
<section class="reprendre-content">
    <div class="banner-content">
        <h2><span>Reprendre</span> la lecture</h2>
        <div class="box-container">
            <?php foreach ($reprendre_lecture as $serie): ?>
                <div class='box' onclick="redirectToSerieInfos(<?= $serie->getIdentifiant() ?>)">
                    <img src='../../ressources/posts/<?= $serie->getImage() ?>' alt=''>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="top-tendance-content">
    <div class="banner-content">
        <h2><span>Top</span> du moment</h2>
        <div class="box-container">
            <?php foreach ($top_tendance as $serie): ?>

                <div class='box' onclick="redirectToSerieInfos(<?= $serie->getIdentifiant() ?>)">
                    <img src='../../ressources/posts/<?= $serie->getImage() ?>' alt=''>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="pied">
    <div class="footer-content">
        <div class="footer-section about">
            <h1 class="logo-text"><span>SERIE</span>.NET</h1>
            <p>
                Serie.Net est une plateforme de recherche de séries des années 2000.
                Elle vous permet de retrouver vos séries préférées et de consulter les
                informations relatives à ces dernières. Vous pouvez également les ajouter à
                votre liste personnelle.
            </p>
        </div>
    </div>
</div>
</body>
<script>
    function redirectToSerieInfos(id) {
        window.location.href = 'serie_infos.php?id=' + id;
    }
</script>
<script src="../js/script.js"></script>
</html>