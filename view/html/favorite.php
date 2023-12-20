<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/base_style.css">
    <link rel="icon" href="../../ressources/images/sn_logo.png">
    <title>Ma Liste</title>
</head>
<body>
    <div class="navigation-bar">
        <div class="logo">
            <a href="index.php" style="text-decoration: none">
                <span class="logo">Serie</span><span class="logo1">.Net</span>
            </a>
        </div>
        <div class="menu">
            <ul>
            <li><a href="#">Accueil</a></li>
                <li><a href="ma_liste.php">Votre liste</a></li>
                <li><a href="explore.php">Explorer</a></li>
                <li><a href="login.php">Déconnexion</a></li>
            </ul>
        </div>
        <form action="" class="search-bar" method="post" onsubmit="return redirectToPage()">
            <label for="search-bar"></label>
            <input type="search" id="search-bar" name="search" placeholder=" Rechercher une série..." required>
        </form>
    </div>
    
    <section class="ma-liste-content">
        <div class="banner-content">
            <h2><span class="red-text">Ma</span> Liste</h2>
            <div class="box-container">
                <?php foreach ($seriesMaListe as $serie): ?>
                    <div class='box' onclick="redirectToSerieInfos(<?= $serie->getIdentifiant() ?>)">
                        <img src='../../ressources/posts/<?= $serie->getImage() ?>' alt=''>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="ma-liste-content">
        <div class="banner-content">
            <h2><span class="red-text">Vos</span> recommandations</h2>
            <div class="box-container">
                <?php foreach ($seriesMaListe as $serie): ?>
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

    <script>
        function redirectToSerieInfos(id) {
            window.location.href = 'serie_infos.php?id=' + id;
        }
    </script>
    <script src="../js/script.js"></script>
</body>
</html>
