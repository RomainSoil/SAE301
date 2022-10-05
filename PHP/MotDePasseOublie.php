<?php
session_start();
?>
<!doctype html>
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


<div class="bouton_retour">
    <a href="Accueil.php"> <img src="fleche.png"  class="icone" alt=""> </a>

</div>

<!--box milieu-->

<div class="mess">
    Entrez votre Email, <br>
        vous allez recevoir un mail pour vérifier votre identitée
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

<!--Le bas de la page-->

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

require ('Premier.php');
require('email.php');
require ('MotDePasse.php');
require('ConnectionBDD.php');
function email()
{
    $conn = new ConnectionBDD();
    $pdo = $conn->connexion();
    $sess = new Premier();
    $sess->premier('oublie');
    echo $_SESSION['oublie'];
    if ($_SESSION['oublie']==2) {
        if (isset($_POST['mail']) and isset($_POST['mailV2'])) {
            if (@strcmp(($_POST['mail']), ($_POST['mailV2'])) == 0) {//strcmp sert a comparer les deux chaines de caracteres
                @$email = $_POST['mail'];
                $etu = $pdo->prepare("SELECT * FROM etudiant WHERE email=?");
                $prof = $pdo->prepare("SELECT * FROM prof WHERE email=?");
                $etu->execute([$email]);
                $prof->execute([$email]);
                if ($etu->rowCount() > 0 or $prof->rowCount() > 0) {
                    /// envoie mail
                    echo '<script>alert("Vous allez recevoir un email sur votre adresse mail")</script>';
                } else {
                    echo '<script>alert("Vous devez vous créer un compte")</script>';

                }

            }
            else {
                echo '<script>alert("Les mails sont différents")</script>';
            }
        } else {
            echo '<script>alert("Les champs mail doivent être remplis")</script>';
        }
    }

}
@email();
        ?>
