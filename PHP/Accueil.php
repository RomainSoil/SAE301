<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="Accueil.css" >
</head>
<body>
<br><br>
<! Le haut de la page avec l'image et le titre>
<header>
    <a href="Accueil.php">
        <img src="logoIFSI.png" width=150 height=150 alt="" >
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>
<! Cette classe est le formulaire de connexion au centre de la page>
<div class="f">
    <h3>Entrez votre identifiant et votre mot de passe</h3> <br>
    <form method="post">
        <input type="text" name="id" id="id" placeholder="Identifiant"><br><br>
        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe"><button type="button" onclick="changer3()">O</button><br><br>
        <input type="submit" value="Confirmer">
    </form>
</div>
<! Lien en dessous de la box connexion>

<div class="compte">
    <br><br><br>
    <a href="Login%20Maneo.php">créer un compte</a><br><br>
    <a href="MotDePasseOublie.php">Mot de passe oublié</a><br><br>
    <a href="https://cas.uphf.fr/login-help/">Besoin d'aide</a><br><br>
</div>
<! Le bas de l'image avec le carré rouge>
<footer>
    <div class="sec">
    Pour des raisons de sécurité, veuillez vous déconnecter et fermer votre navigateur lorsque vous avez fini d'accéder aux services authentifiés.
    <br>
    Vos identifiants sont strictement confidentiels et ne doivent en aucun cas être transmis à une tierce personne.
</div>
</footer>
</body>
</html>

<?php
require('email.php');
require ('MotDePasse.php');
require('ConnectionBDD.php');
require('Connexion.php');

/* La partie de la validation de connexion qui renvoie la page correspondante*/
if ($_SESSION['page']){
    echo '<script>alert("Le compte est crée")</script>';
}
$conn = new ConnectionBDD();
$pdo = $conn->connexion();
@$ClassMail = new email();
$ClassConn= new Connexion();
if (isset($_POST['id'])){
    if(@$ClassConn->connexionEtu($pdo,$_POST['id'],$_POST['mdp'])) {
        header('Location:PageEtu.php');
        exit;}
    elseif(@$ClassConn->connexionProf($pdo,$_POST['id'],$_POST['mdp'])) {
            header('Location:PageProf.php');
            exit;
    }
    else{
        echo '<script>alert("Identifiant ou mot de passe incorrect")</script>';
    }

}

?>

<script>
    ///Boutton affiche le MDP///
    e=true;
    function changer3(){
        if(e){
            document.getElementById("mdp").setAttribute("type","text");
            e=false;
        }
        else{
            document.getElementById("mdp").setAttribute("type","password");
            e=true;
        }
    }
</script>
