<?php
namespace view\html;

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once(__DIR__ . "/../../model/dao/requests/UserRequest.php");
require_once(__DIR__ . "/../../model/dao/requests/SerieRequest.php");
require_once(__DIR__ . "/../../model/dao/requests/HistoriqueRequest.php");
require_once(__DIR__ . "/../../model/Serie.php");

use model\dao\requests\SerieRequest;
use model\dao\requests\HistoriqueRequest;

session_start();
if (!isset($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}


$serieRequest = new SerieRequest();
$historiqueRequest = new HistoriqueRequest();

$series = array();

if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
    if (isset($_GET['langue']))
        $lang = htmlspecialchars($_GET['langue']);
    else
        $lang = "VF";

    $series = $serieRequest->getSeriesSearch($search, $lang, false);
    $historiqueRequest->insertHistoriqueRecherche($_SESSION['profile'], $search);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/script.js"></script>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/base_style.css">
    <link rel="icon" href="../../ressources/images/sn_logo.png">
    <title>Recherche</title>
</head>
<body>
<div class="navigation-bar">
    <div class="logo">
        <a href=href="index.php?profile=<?= $_SESSION['profile'] ?>" style="text-decoration: none"><span class="logo">Serie</span><span class="logo1">.Net</span></a>
    </div>
    <div class="menu">
        <ul>
            <li><a href="accueil.php?profile=<?= $_SESSION['profile'] ?>">Accueil</a></li>
            <li><a href="liste-favoris.php">Votre liste</a></li>
            <li><a href="explorer.php">Explorer</a></li>
            <li><a href="login.php">Déconnexion</a></li>
        </ul>
    </div>
    <!-- Barre de recherche -->
    <span></span>
    <span></span>
</div>
<section class="Search">
    <form id="form-search" action="" method="get">
        <label>
            <input type="search" name="search" onsubmit="return redirectToPage()" placeholder=" Rechercher une autre série..." required>
        </label>
        <div id="select-lang">
            <div>
                <input type="radio" id="html" name="langue" value="VF" required>
                <label for="html">Français</label>
            </div>
            <div>
                <input type="radio" id="css" name="langue" value="VO" required>
                <label for="css">Anglais</label>
            </div>
        </div>
    </form>
</section>

<section class="search-results">
    <div class="banner-content">
        <h2>Résultats de votre recherche</h2>
        <div class="box-container">
            <?php foreach ($series as $serie): ?>
                <div class='box' onclick="redirectToSerieInfos(<?= $serie->getIdentifiant() ?>)">
                    <img src='../../ressources/posts/<?= $serie->getImage() ?>' alt=''>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if (count($series) == 1): ?>
        <div class="banner-content">
            <h2>Du même genre</h2>
            <div class="box-container">
                <?php
                // si la recherche renvoie uniquement une série, on affiche les séries du même genre
                $genres = $series[0]->getGenres();
                shuffle($genres);
                $seriesSameGenre = $serieRequest->getSeriesByGenre($genres[0]->getNom(), false);

                foreach ($seriesSameGenre as $serie): ?>
                    <div class='box' onclick="redirectToSerieInfos(<?= $serie->getIdentifiant() ?>)">
                        <img src='../../ressources/posts/<?= $serie->getImage() ?>' alt=''>
                    </div>
                <?php endforeach; ?>
            </div>
    <?php endif; ?>
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
        window.location.href = 'serie-infos.php?id=' + id;
    }
</script>
</html>
