<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/script.js"></script>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/base_style.css">
    <title>Accueil</title>
</head>
<body>
<div class="navigation-bar">
    <div class="logo">
        <span class="logo">Serie</span><span class="logo1">.Net</span>
    </div>
    <div class="menu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#">Votre liste</a></li>
            <li><a href="#">Explorer</a></li>
            <li><a href="#">Déconnexion</a></li>
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
            <div class="box">
                <img src="../../ressources/posts/stargate_universe.jpg" alt="">
            </div>
            <div class="box">
                <img src="../../ressources/posts/battlestar_galactica.jpg" alt="">
            </div>
            <div class="box">
                <img src="../../ressources/posts/bionic_woman.jpg" alt="">
            </div>
            <div class="box">
                <img src="../../ressources/posts/caprica.jpg" alt="">
            </div>
            <div class="box">
                <img src="../../ressources/posts/doctor_who.jpg" alt="">
            </div>
        </div>
    </div>
</body>
</html>




<section class="search-results">
    <div class="banner-content">
    </div>
</section>
