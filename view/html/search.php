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

$series = array();

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $series = $serieRequest->getSeriesSearch($search, "VF", false);
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
    <title>Recherche</title>
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
    <span></span>
    <span></span>
</div>
<section class="Search">
    <form id="form-search" action="" method="get">
        <label>
            <input type="search" name="search" onsubmit="return redirectToPage()" placeholder=" Rechercher une autre série..." required>
        </label>
    </form>
</section>

<section class="search-results">
    <div class="banner-content">
        <h2>Résultats de votre recherche</h2>
        <div class="box-container">
            <?php foreach ($series as $serie) {
                echo "<div class='box'>";
                echo "<img src='../../ressources/posts/" . $serie->getImage() ."' alt=''>";
                echo "</div>";
            } ?>
        </div>
    </div>
</body>
</html>
