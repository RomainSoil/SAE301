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
    <link rel="stylesheet" href="Patient.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>
<div class="Titre">
    <h1>Mobilité</h1>
</div>

<body>
<form method="post" action="Hygiene.php">
Le patient a t-il eu une aide à la marche ?:
<input type="radio" name="AideMarche" value="oui" required>oui
<input type="radio" name="AideMarche" value="non" required>non
<br><br>
Le patient a t-il eu une aide au lever ?:
<input type="radio" name="AideLever" value="oui" required >oui
<input type="radio" name="AideLever" value="non" required>non
<br><br>
Le patient a t-il eu une aide au coucher :
<input type="radio" name="AideCoucher" value="oui" required>oui
<input type="radio" name="AideCoucher" value="non" required>non
<br><br>
Le patient a t-il eu une aide au fauteil :
<input type="radio" name="AideFauteil" value="oui" required>oui
<input type="radio" name="AideFauteil" value="non" required>non
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
