<?php
namespace view\html;

require_once(__DIR__ . "/../../model/dao/requests/UserRequest.php");
require_once(__DIR__ . "/../../model/dao/requests/SerieRequest.php");
require_once(__DIR__ . "/../../model/Serie.php");

use model\dao\requests\SerieRequest;

session_start();
if (!isset($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$serieRequest = new SerieRequest();

$science_fiction = $serieRequest->getSeriesByGenre("Science-fiction",false); shuffle($science_fiction);
$action = $serieRequest->getSeriesByGenre("Action",false); shuffle($action);
$drame = $serieRequest->getSeriesByGenre("Drame",false); shuffle($drame);
$fantastique = $serieRequest->getSeriesByGenre("Fantastique",false); shuffle($fantastique);
$comedie = $serieRequest->getSeriesByGenre("Comédie",false); shuffle($comedie);
$teen = $serieRequest->getSeriesByGenre("Teen",false); shuffle($teen);
$espionnage = $serieRequest->getSeriesByGenre("Espionnage",false); shuffle($espionnage);
$horreur = $serieRequest->getSeriesByGenre("Horreur",false); shuffle($horreur);
$thriller = $serieRequest->getSeriesByGenre("Thriller",false); shuffle($thriller);
$aventure = $serieRequest->getSeriesByGenre("Aventure",false); shuffle($aventure);
$medical = $serieRequest->getSeriesByGenre("Médical",false); shuffle($medical);
$historique = $serieRequest->getSeriesByGenre("Historique",false); shuffle($historique);
$musical = $serieRequest->getSeriesByGenre("Musical",false); shuffle($musical);
$comedie_dramatique = $serieRequest->getSeriesByGenre("Comédie dramatique",false); shuffle($comedie_dramatique);
$sport = $serieRequest->getSeriesByGenre("Sport",false); shuffle($sport);
$mystere = $serieRequest->getSeriesByGenre("Mystère",false); shuffle($mystere);
$crime = $serieRequest->getSeriesByGenre("Crime",false); shuffle($crime);
$surnaturel = $serieRequest->getSeriesByGenre("Surnaturel",false); shuffle($surnaturel);
$animation = $serieRequest->getSeriesByGenre("Animation",false); shuffle($animation);
$romance = $serieRequest->getSeriesByGenre("Romance",false); shuffle($romance);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../../ressources/images/sn_logo.png">
    <link rel="stylesheet" href="../css/base_style.css">
    <title>Explorer</title>
</head>
<body>
<div class="navigation-bar">
    <div class="logo">
        <a href="index.php?profile=<?= $_SESSION['profile'] ?>" style="text-decoration: none"><span class="logo">Serie</span><span class="logo1">.Net</span></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="index.php?profile=<?= $_SESSION['profile'] ?>">Accueil</a></li>
            <li><a href="liste-favoris.php">Votre liste</a></li>
            <li><a href="">Explorer</a></li>
            <li><a href="login.php">Déconnexion</a></li>
        </ul>
    </div>
    <!-- Barre de recherche -->
    <form action="" class="search-bar" method="post" onsubmit="return redirectToPage()" >
        <label for="search-bar"></label><input type="search" id="search-bar" name="search" placeholder=" Rechercher une série..." required>
    </form>
</div>
<section class="science-fiction">
    <div class="banner-content">
        <h2>SCIENCE FICTION</h2>
        <div class="box-container">
            <?php foreach ($science_fiction as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>

        </div>
    </div>
</section>
<section class="thriller">
    <div class="banner-content">
        <h2>THRILLER</h2>
        <div class="box-container">
            <?php foreach ($action as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="drame">
    <div class="banner-content">
        <h2>DRAME</h2>
        <div class="box-container">
            <?php foreach ($drame as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="action">
    <div class="banner-content">
        <h2>ACTION</h2>
        <div class="box-container">
            <?php foreach ($action as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="espionnage">
    <div class="banner-content">
        <h2>ESPIONNAGE</h2>
        <div class="box-container">
            <?php foreach ($espionnage as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="fantastique">
    <div class="banner-content">
        <h2>FANTASTIQUE</h2>
        <div class="box-container">
            <?php foreach ($fantastique as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="surnaturel">
    <div class="banner-content">
        <h2>SURNATUREL</h2>
        <div class="box-container">
            <?php foreach ($surnaturel as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            }?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="comedie">
    <div class="banner-content">
        <h2>COMÉDIE</h2>
        <div class="box-container">
            <?php foreach ($comedie as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            }?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="crime">
    <div class="banner-content">
        <h2>CRIME</h2>
        <div class="box-container">
            <?php foreach ($crime as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() . "' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="mystere">
    <div class="banner-content">
        <h2>MYSTERE</h2>
        <div class="box-container">
            <?php foreach ($mystere as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="aventure">
    <div class="banner-content">
        <h2>AVENTURE</h2>
        <div class="box-container">
            <?php foreach ($aventure as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() . "' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="romance">
    <div class="banner-content">
        <h2>ROMANCE</h2>
        <div class="box-container">
            <?php foreach ($romance as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() . "' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="comedie-dramatique">
    <div class="banner-content">
        <h2>COMÉDIE DRAMATIQUE</h2>
        <div class="box-container">
            <?php foreach ($comedie_dramatique as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() . "' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="horreur">
    <div class="banner-content">
        <h2>HORREUR</h2>
        <div class="box-container">
            <?php foreach ($horreur as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() . "' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="musical">
    <div class="banner-content">
        <h2>MUSICAL</h2>
        <div class="box-container">
            <?php foreach ($musical as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() . "' alt=''>";
                echo "</div>";
            } ?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="sport">
    <div class="banner-content">
        <h2>SPORT</h2>
        <div class="box-container">
            <?php foreach ($sport as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() . "' alt=''>";
                echo "</div>";
            }?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="animation">
    <div class="banner-content">
        <h2>ANIMATION</h2>
        <div class="box-container">
            <?php foreach ($animation as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() . "' alt=''>";
                echo "</div>";
            }?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="medical">
    <div class="banner-content">
        <h2>MEDICAL</h2>
        <div class="box-container">
            <?php foreach ($medical as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() . "' alt=''>";
                echo "</div>";
            }?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="historique">
    <div class="banner-content">
        <h2>HISTORIQUE</h2>
        <div class="box-container">
            <?php foreach ($historique as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            }?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
<section class="teen">
    <div class="banner-content">
        <h2>TEEN</h2>
        <div class="box-container">
            <?php foreach ($teen as $serie) {
                echo "<div class='box' onclick='redirectToSerieInfos(" . $serie->getIdentifiant() . ")'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            }?>
            <a href="#"><button class="btn">Voir plus</button></a>
        </div>
    </div>
</section>
</body>
<script>
    function redirectToSerieInfos(id) {
        window.location.href = 'serie-infos.php?id=' + id;
    }
</script>
<script src="../js/script.js"></script>
</html>
