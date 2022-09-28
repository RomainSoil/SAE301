<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="MotDePasseOublie.css" />
</head>
<header>
    <img src="logoIFSI.png" width=10% height=10%/>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>

<body>

<div class="bouton_retour">
    <a href="Accueil.php"> <img src="fleche.png"  class="icone"> </a>

</div>


<div class="mess">
<text> Entrez votre Email, <br>
    vous allez recevoir un mail pour vérifier votre identitée </text>
</div>
<br>

<div class ="box">

        <form action="" method="post">

            <br>
            <label for="">Email :</label>
            <br>
            <input type="text" name="mail" placeholder="Entrez votre Email"/>
            <br>
            <br>
            <input type="text" name="mailV2" placeholder="Confirmez votre Email"/>
            <br>
            <p><input type="submit" value="Valider"></p>
        </form>

</div>


</body>
<footer>
        <form action="Accueil.php" method="post">
            <input type="submit" value="Besoin d'aide ?">
        </form> <br>
    <form action="Login%20Maneo.php" method="post">
            <input type="submit" value="Créer un compte">
    </form>
</footer>

</html>


<?php
require('email.php');
require ('MotDePasse.php');
require('ConnectionBDD.php');

    $conn = new ConnectionBDD();
    $pdo = $conn->connexion();

    if ($_POST["mail"].\Sodium\compare($_POST["mailV2"])==0) {
        $email = $_POST['mail'];
        $stmt = $pdo->prepare("SELECT * FROM etudiant WHERE email=?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user != null) {
           /// envoie mail
    }
        else {
            echo "Vous n'avez pas encore de compte veeuillez en créer un";
            ///mettre un bouton qui renvoie à la page de création
        }


    }

        ?>
