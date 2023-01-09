
<?php
session_start();
$_SESSION['IdChat']=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AccueilAnglais</title>
    <link rel="stylesheet" href="SiteIFSI.css" >
    <script src="LesFonctionsJS.js"></script>

</head>
<body>
<br><br>
<!--Le haut de la page avec l'image et le titre-->
<header>
    <div class="traduction">
        <form action="Accueil.php" method="post">
            <input type="submit" value="Francais">
        </form>
    </div>
    <a href="Accueil.php">
        <img src="image/logoIFSI.png"  width=234 height=125  alt="" >
    </a>
    <h1> Institute of Nursing Training </h1>
    <br><br>
</header>
<!--Cette classe est le formulaire de connexion au centre de la page-->
<div class="Connexion">
    <h3>Enter your login and password</h3> <br>
    <form method="post">
        <input type="email" name="id" id="id" placeholder="login" required><br><br>
        <input type="password" name="mdp" id="mdp" placeholder="password"><button type="button" onclick="changer('mdp')">O</button><br><br>
        <input type="submit" value="submit">
    </form>
</div>
<!--Lien en dessous de la box connexion-->

<div class="href">
    <br><br><br>
    <a href="Login.php">create an account</a><br><br>
    <a href="MotDePasseOublie.php">forgot password</a><br><br>
    <a href="https://cas.uphf.fr/login-help/">need help</a><br><br>
</div>
<!--Le bas de l'image avec le carré rouge-->
<footer>
    <div class="securite">
        For security reasons, please log out and close your browser when you are finished accessing authenticated services.
    <br>
        Your identifiers are strictly confidential and must under no circumstances be transmitted to a third party.
</div>
</footer>
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
if (isset($_SESSION['page'])){
    echo '<script>alert("Le compte est crée")</script>';
}
/* La partie de la validation de connexion qui renvoie la page correspondante*/

$conn = ConnectionBDD::getInstance();
$pdo = $conn::getpdo();
@$ClassMail = new email();
$ClassConn= new Connexion();
if (@$ClassMail->email($_POST['id']) && isset($_POST['id'])){
    if(@$ClassConn->connexionEtu($pdo,$_POST['id'],$_POST['mdp'])) {
        $username = new username();
        $_SESSION['Pseudo']=$_POST['id'];
        $_SESSION['username']=$username->username($_POST['id']);
        $_SESSION['fonction']= 'etu';
        header('Location:PageEtu.php');
        exit;}
    elseif(@$ClassConn->connexionProf($pdo,$_POST['id'],$_POST['mdp'])) {
        $username = new username();
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



