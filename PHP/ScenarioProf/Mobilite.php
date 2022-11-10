<?php
session_start();
@$_SESSION['ECG']=$_POST['ECG'];
@$_SESSION['pls']=$_POST['pls'];
@$_SESSION['TA']=$_POST['TA'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>
    <h2>Mobilité</h2>


<form method="post" action="Hygiene.php">
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image  ? (Facultatif) <input name="userfile" type="file" />
    <input type="submit" value="Ajouter le fichier" />
    <br><br>
Le patient a t-il eu une aide à la marche ?:
<input type="radio" name="AideMarche" value="oui" required>oui
<input type="radio" name="AideMarche" value="non" checked="checked" required>non
<br><br>
Le patient a t-il eu une aide au lever ?:
<input type="radio" name="AideLever" value="oui" required >oui
<input type="radio" name="AideLever" value="non" checked="checked" required>non
<br><br>
Le patient a t-il eu une aide au coucher :
<input type="radio" name="AideCoucher" value="oui" required>oui
<input type="radio" name="AideCoucher" value="non" checked="checked" required>non
<br><br>
Le patient a t-il eu une aide au fauteil :
<input type="radio" name="AideFauteil" value="oui" required>oui
<input type="radio" name="AideFauteil" value="non" checked="checked" required>non
<br><br>
    <div class="button_Suivant">
        <input type="submit" value="Valider">
    </div>
</form>
<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>
</html>

<?php
?>
