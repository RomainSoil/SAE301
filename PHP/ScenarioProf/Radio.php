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
    <h1>Radio</h1>
</div>
<form method="post" action="Mobilite.php">
    Veuillez entrez l'url de l'image ?
<input type="url" nom="radio">
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
