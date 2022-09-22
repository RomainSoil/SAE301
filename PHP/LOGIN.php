<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="LOGIN.css" />
</head>
<header>
    <div id ="texte">
         <h1>Institut de Formation aux Soins Infirmiers</h1>
    </div>
</header>

<body>
<form action="Accueil.html" method="post">
<div class="bouton_retour">
    <input type="submit" value="Retour">
    <br><br><br><br><br><br>
    <br>

</div>
</form>

<div class ="box">
    <div class="connexion">
        <form action="" method="post">
            <h3>Données personnelles</h3>
            <label for="">Email :</label>
            <br>
            <input type="text" name="mail" placeholder="Entrez votre Email"/>
            <br>
            <label for="">Mot de passe : </label>
            <br>
            <input type="text" name="mdp" placeholder="Entre votre mot de passe"/>
            <br>
            <label for="">Valider votre Mot de passe : </label>
            <br>
            <input type="text" name="mdp" placeholder="Confirmez mot de passe"/>
            <br>
            <p><input type="submit" value="Valider"></p>
        </form>
    </div>
</div>


</body>
<footer>
    <div class="aide">
        <a href="https://cas.uphf.fr/login-help/" style="color:white">Besoin d'aide</a><br><br>
    </div>
</footer>
</html>
