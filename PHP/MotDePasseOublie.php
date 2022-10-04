<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="MotDePasseOublie.css">
</head>
<body>

<header>
    <a href="Accueil.php">
        <img src="logoIFSI.png" width=150 height=150 alt="">
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>


<div class="bouton_retour">
    <a href="Accueil.php"> <img src="fleche.png"  class="icone" alt=""> </a>

</div>


<div class="mess">
    Entrez votre Email, <br>
        vous allez recevoir un mail pour vérifier votre identitée </text>
</div>
<br>

<div class ="box">

    <form action="MotDePasseOublie.php" method="post">

        <br>
        <label>Email :</label>
        <br><br>
        <input type="text" name='mail' placeholder="Entrez votre Email">
        <br>
        <br>
        <label>Confirmez votre email :</label>
        <br><br>
        <input type="text" name='mailV2' placeholder="Confirmez votre Email">
        <br>
        <p><input type="submit" value="Valider"></p>
    </form>

</div>


<footer>
    <form action="Login%20Maneo.php" method="post">
        <input type="submit" value="Créer un compte">
    </form> <br>
    <form action="Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>

</html>


<?php
require('email.php');
require ('MotDePasse.php');
require('ConnectionBDD.php');

$conn = new ConnectionBDD();
$pdo = $conn->connexion();
if (@strcmp(($_POST['mail']),($_POST['mailV2']))==0 and isset($_POST['mail'])) {
    @$email = $_POST['mail'];
    $stmt = $pdo->prepare("SELECT * FROM etudiant WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user != null) {
        /// envoie mail
    }
    else {
        echo '<script>alert("Vous devez vous créer un compte");</script>';


    }


}

?>