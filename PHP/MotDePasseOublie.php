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
        <img src="image/logoIFSI.png" width=150 height=150 alt="">
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>


<div class="bouton_retour">
    <a href="Accueil.php"> <img src="image/fleche.png" class="icone" alt=""> </a>

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
        <input type="email" name='mail' placeholder="Entrez votre Email" required>
        <br>
        <br>
        <label>Confirmez votre email :</label>
        <br><br>
        <input type="email" name='mailV2' placeholder="Confirmez votre Email" required>
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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require ('Premier.php');
require('email.php');
require ('MotDePasse.php');
require('ConnectionBDD.php');
require('includes/Exception.php');
require('includes/PHPMailer.php');
require('includes/SMTP.php');
function email(){
    $conn = ConnectionBDD::getInstance();
    $pdo = $conn->connexion();
    $sess = new Premier();
    $sess->premier('oublie');
    if ($_SESSION['oublie']==2) {
        if (isset($_POST['mail']) and isset($_POST['mailV2'])) {
            if (@strcmp(($_POST['mail']), ($_POST['mailV2'])) == 0) {//strcmp sert a comparer les deux chaines de caracteres
                @$email = $_POST['mail'];
                $etu = $pdo->prepare("SELECT * FROM etudiant WHERE email=?");
                $prof = $pdo->prepare("SELECT * FROM prof WHERE email=?");
                $etu->execute([$email]);
                $prof->execute([$email]);
                if ($etu->rowCount() > 0 or $prof->rowCount() > 0) {
                    echo '<script>alert("Vous allez recevoir un email sur votre adresse mail")</script>';
                    $mail = new PHPMailer(true);
                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();//Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'bulletforce59750@gmail.com';                     //SMTP username
                        $mail->Password   = 'bxwvbwzeuydsgpoa';                               //SMTP password
                        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                        $mail->Port       = 25;
                        //Recipients
                        $mail->CharSet='UTF-8';
                        $mail->setFrom('bulletforce59750@gmail.com', 'IFSI');
                        $mail->Subject = 'Réinitialisation de ton mot de passe';
                        $mail->AltBody(""); 		                //Le contenu au format HTML

                        $mail->addAddress($_POST['mail'], 'Joe User');     //Add a recipient
                        $mail->send();
                        echo 'Message has been sent';
                        $_SESSION['mail']=$email;
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                } else {
                    echo '<script>alert("Vous devez vous créer un compte")</script>';

                }

            }
            else {
                echo '<script>alert("Les mails sont différents")</script>';
            }
        }
    }

}
@email();

        ?>
