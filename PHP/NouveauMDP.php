<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="MotDePasseOublie.css">
</head>
<body>
<!--Le haut de la page avec l'image et le titre-->

<header>
    <a href="Accueil.php">
        <img src="logoIFSI.png" width=150 height=150 alt="">
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>


<!--box de milieu-->

<div class="mess">
    Entrez votre nouveau mot de passe, <br>
        Puis retournez vous connecter.
</div>
<br>

<div class ="box">

    <form action="MotDePasseOublie.php" method="post">
        <br>
        <label>Email :</label>
        <br><br>
        <input type="text" name='email' placeholder="Entrez votre email">
        <br>
        <br>
        <label>Nouveau Mot de passe :</label>
        <br><br>
        <input type="text" name='mdp' placeholder="Entrez votre nouveau MDP">
        <br>
        <br>
        <label>Confirmez votre Mot de passe :</label>
        <br><br>
        <input type="text" name='mdp2' placeholder="Confirmez votre MDP">
        <br>
        <p><input type="submit" value="Valider"></p>
    </form>

</div>


<!--Le bas de la page-->

<footer>
    <form action="Login%20Maneo.php" method="post">
        <input type="submit" value="Créer un compte">
    </form> <br>
    <form action="Accueil.php" method="post">
        <input type="submit" value="Connexion">
    </form> <br>
    <form action="Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>

</html>
<?php
require ('Premier.php');
require('email.php');
require ('MotDePasse.php');
require('ConnectionBDD.php');
function email()
{
    $conn = new ConnectionBDD();
    $pdo = $conn->connexion();
    $MDP = new MotDePasse();

    if (isset($_POST['mdp']) and isset($_POST['mpd2'])) {
        if ($MDP->password($_POST['mdp'], $_POST['mdp2']))
        {
            //met la classe que tu as crée
        }

}}


