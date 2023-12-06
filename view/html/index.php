<?php
namespace view\html;

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once(__DIR__ . "/../../model/dao/requests/UserRequest.php");
require_once(__DIR__ . "/../../model/dao/requests/SerieRequest.php");
require_once(__DIR__ . "/../../model/Serie.php");

use model\dao\requests\SerieRequest;

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
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
    <title>Accueil</title>
</head>
<body>
<div class="navigation-bar">
    <div class="logo">
        <a href="index.php" style="text-decoration: none"><span class="logo">Serie</span><span class="logo1">.Net</span></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Votre liste</a></li>
            <li><a href="explore.html">Explorer</a></li>
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
        <h2>Reprendre la lecture</h2>
        <div class="box-container">
            <?php foreach ($reprendre_lecture as $serie) {
                echo "<div class='box'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            } ?>
        </div>
    </div>
</section>
<section class="top-tendance-content">
    <div class="banner-content">
        <h2>Top du moment</h2>
        <div class="box-container">
            <?php foreach ($top_tendance as $serie) {
                echo "<div class='box'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            } ?>
        </div>
    </div>
</section>
<footer>
    <br>
</footer>
</body>
<script src="../js/script.js"></script>
<script>

</script>
</html>