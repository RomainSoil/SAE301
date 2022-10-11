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

    <form action="" method="post">
        <br>
        <label>Nouveau Mot de passe :</label>
        <br><br>
        <input type="text" name='mdp' id="mdp" placeholder="Entrez votre nouveau MDP">
        <br>
        <br>
        <label>Confirmez votre Mot de passe :</label>
        <br><br>
        <input type="text" name='mdp2' id="mdp2" placeholder="Confirmez votre MDP">
        <br>
        <p><input type="submit" value="Valider"></p>
    </form>

</div>


<!--Le bas de la page-->

<footer>
    <form action="" method="post">
        <input type="submit" value="Créer un compte">
    </form> <br>
    <form action="Accueil.php" method="post">
        <input type="submit" value="Connexion">
    </form> <br>
    <form action="" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>

</html>
<?php
require ('Premier.php');
require ('Connexion.php');
require('email.php');
require ('MotDePasse.php');
require('ConnectionBDD.php');
function pdemail()
{
    $conn = new ConnectionBDD();
    $pdo = $conn->connexion();
    $MDP = new MotDePasse();
    $co = new Connexion();

    if (isset($_POST['mdp']) or isset($_POST['mpd2'])) {
        if ($MDP->password($_POST['mdp'], $_POST['mdp2']))
        {
            $MDP->changement($pdo, $_POST['mdp'], $co);
        }

}else echo $_POST['mdp'], $_POST['mdp2'];
}
pdemail();
?>
