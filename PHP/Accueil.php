<?php
session_start();
$_SESSION['IdChat']=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="SiteIFSI.css" >
    <script src="LesFonctionsJS.js"></script>

</head>
<body>
<br><br>
<!--Le haut de la page avec l'image et le titre-->
<header>
    <div class="traduction">
        <form action="AccueilAnglais.php" method="post">
            <input type="submit" value="Anglais">
        </form>
    </div>
    <a href="Accueil.php">
        <img src="image/logoIFSI.png" width=234 height=125 alt="" >
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>
<!--Cette classe est le formulaire de connexion au centre de la page-->
<div class="Connexion">
    <h3>Entrez votre identifiant et votre mot de passe</h3> <br>
    <form method="post">
        <input type="email" name="id" id="id" placeholder="Identifiant" required><br><br>
        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe"><button type="button" onclick="changer('mdp')">O</button><br><br>
        <input type="submit" value="Confirmer">
    </form>
</div>
<!--Lien en dessous de la box connexion-->

<div class="href">
    <br><br><br>
    <a href="Login.php">créer un compte</a><br><br>
    <a href="MotDePasseOublie.php">Mot de passe oublié</a><br><br>
    <a href="BesoinAide.php">Besoin d'aide</a><br><br>
</div>
<!--Le bas de l'image avec le carré rouge-->
    <div class="securite">
    Pour des raisons de sécurité, veuillez vous déconnecter et fermer votre navigateur lorsque vous avez fini d'accéder aux services authentifiés.
    <br>
    Vos identifiants sont strictement confidentiels et ne doivent en aucun cas être transmis à une tierce personne.
</div>
</body>
</html>


<?php
require('email.php');
require ('MotDePasse.php');
require('ConnectionBDD.php');
require('Connexion.php');
require('username.php');
$_SESSION['IdChat']=1;
/* La partie de la validation de connexion qui renvoie la page correspondante*/



/* La partie de la validation de connexion qui renvoie la page correspondante*/
$conn = ConnectionBDD::getInstance();
$pdo = $conn::getpdo();
@$ClassMail = new email();
$ClassConn= new Connexion();
if (@$ClassMail->email($_POST['id']) && isset($_POST['id'])){
    if(@$ClassConn->connexionEtu($pdo,$_POST['id'],$_POST['mdp'])) {
        $username = new username();
        $_SESSION['email']=$_POST['id'];
        $_SESSION['Pseudo']=$_POST['id'];
        $_SESSION['username']=$username->username($_POST['id']);
        $_SESSION['fonction']= 'etu';
        header('Location:PageEtu.php');
        exit;}
    elseif(@$ClassConn->connexionProf($pdo,$_POST['id'],$_POST['mdp'])) {
        $username = new username();
        $_SESSION['email']=$_POST['id'];
        $_SESSION['Pseudo']=$_POST['id'];
        $_SESSION['username']=$username->username($_POST['id']);
        $_SESSION['fonction']= 'prof';
        header('Location:PageProf.php');
        exit;
    }
    else{
        echo '<script>alert("Identifiant ou mot de passe incorrect")</script>';
    }

}

?>



