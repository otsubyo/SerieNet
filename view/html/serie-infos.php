<?php
namespace view\html;

require_once(__DIR__ . "/../../model/dao/requests/SerieRequest.php");
require_once (__DIR__ . "/../../model/dao/requests/FavorisRequest.php");
require_once(__DIR__ . "/../../libs/jwt-utils.php");


use Exception;
use model\dao\requests\SerieRequest;
use model\dao\requests\FavorisRequest;
use function is_jwt_valid;

session_start();
if (!isset($_SESSION['token']) || !is_jwt_valid($_SESSION['token']) || !isset($_SESSION['login'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$serieRequest = new SerieRequest();
$favorisRequest = new FavorisRequest();

$serie = null;
if (isset($_GET['id'])) {
    try {
        $serie = $serieRequest->getSerie($_GET['id']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {
    exit();
}

$name = 'add';
$buttonValue = "Ajouter à ma liste";

// Si la série est déjà dans la liste, on change le bouton
if ($favorisRequest->isFavoris($_SESSION['profile'], $serie->getIdentifiant())) {
    $buttonValue = "Retirer de ma liste";
    $name = 'remove';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $value = $_POST['add'];
        if ($favorisRequest->addFavoris($_SESSION['profile'], $value)) {
            $buttonValue = "Retirer de ma liste";
            $name = 'remove';
        }
    }

    if (isset($_POST['remove'])) {
        $value = $_POST['remove'];
        if ($favorisRequest->deleteFavoris($_SESSION['profile'], $value)) {
            $buttonValue = "Ajouter à ma liste";
            $name = 'add';
        }
    }
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
        <a href="accueil.php?profile=<?= $_SESSION['profile'] ?>" style="text-decoration: none"><span class="logo">Serie</span><span class="logo1">.Net</span></a>
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
            <form action="" method="post">
                <input type="hidden" name="<?= $name ?>" value=<?= $serie->getIdentifiant() ?>>
                <button type="submit" class="btn">
                    <?= $buttonValue ?>
                </button>
            </form>
        </div>
    </div>

</div>
</body>
<script src="../js/script.js"></script>
</html>