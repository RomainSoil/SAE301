<?php
session_start();
@$_SESSION['alimentaire']=$_POST['alimentaire'];
@$_SESSION['hydratation']=$_POST['hydratation'];
@$_SESSION['regime']=$_POST['regime'];
@$_SESSION['jeun']=$_POST['jeun'];
@$_SESSION['aideRepas']=$_POST['aideRepas'];
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
    <h1>Neurologie</h1>
</div>
<form action="Respi.php" method="post">
    <br><br>
    Temperature : <input type="number" name="temperature">
    <br><br>
    Glasgow : <input type="text" name="glasgow">
    <br><br>
    EVA : <input type="number" name="EVA">
    <br><br>
    AlgoPlus : <input type="text" name="AlgoPlus">
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

</div>
</body>
</html>

<?php


?>
