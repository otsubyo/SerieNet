<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>SERIE NET</title>
    <link rel="stylesheet" href="../css/style_login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
<div class="bg-img">
    <div class="content">
        <header>Bienvenue sur <span class="logo logo1">Serie</span><span class="logo logo2">.Net</span></header>
        <form action="#">
            <div class="field">
                <span class="fa fa-user"></span>
                <label>
                    <input type="text" required placeholder="Nom d'utilisateur...">
                </label>
            </div>
            <div class="field space">
                <span class="fa fa-lock"></span>
                <label>
                    <input type="password" class="pass-key" required placeholder="Mot de passe...">
                </label>
                <span class="show">Voir</span>
            </div>
            <div class="pass">
                <a href="#">Mot de passe oublié ?</a>
            </div>
            <div class="field">
                <input type="submit" value="CONNEXION">
            </div>
        </form>

        <div class="signup">
            Pas encore membre ?
            <a href="#">S'insricre maintenant</a>
        </div>
    </div>
</div>
<script>
    const pass_field = document.querySelector('.pass-key');
    const showBtn = document.querySelector('.show');
    showBtn.addEventListener('click', function(){
        if(pass_field.type === "password"){
            pass_field.type = "text";
            showBtn.textContent = "Catcher";
            showBtn.style.color = "#3498db";
        }else{
            pass_field.type = "password";
            showBtn.textContent = "Voir";
            showBtn.style.color = "#222";
        }
    });
</script>
</body>
</html>