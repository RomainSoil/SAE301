<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nouveau MDP</title>
    <link rel="stylesheet" href="SiteIFSI.css">
    <script src="LesFonctionsJS.js"></script>
</head>
<body>
<!--Le haut de la page avec l'image et le titre-->

<header>
    <a href="Accueil.php">
        <img src="../PHP/image/logoIFSI.png" width=150 height=150 alt="">
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>


<!--box de milieu-->

<h3>
    Entrez votre nouveau mot de passe, <br>
    Puis retournez vous connecter.
</h3>
<br>

<div class ="inscription">

    <form action="" method="post">
        <br>
        <label>Nouveau Mot de passe :</label>
        <br><br>
        <input type="password" name='mdp' id="mdp" placeholder="Entrez votre nouveau MDP" required ><button type="button" onclick="changer('mdp')">O</button>
        <br>
        <br>
        <label>Confirmez votre Mot de passe :</label>
        <br><br>
        <input type="password" name='mdp2' id="mdp2" placeholder="Confirmez votre MDP" required><button type="button" onclick="changer('mdp2')">O</button>
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
    <form action="BesoinAide.php" method="post">
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
/**
 * @return void
 */
function changemail()
{
    $conn = ConnectionBDD::getInstance();
    $pdo = $conn::getpdo();
    $MDP = new MotDePasse();
    $co = new Connexion();

    if (isset($_POST['mdp']) or isset($_POST['mpd2'])) {
        if ($MDP->password($_POST['mdp'], $_POST['mdp2']))
        {
            $MDP->changement($pdo, $_POST['mdp'], $co);
        }

    }}
changemail();
?>