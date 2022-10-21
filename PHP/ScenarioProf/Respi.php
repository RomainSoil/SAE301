<?php
session_start();
@$_SESSION['temperature']=$_POST['temperature'];
@$_SESSION['glasgow']=$_POST['glasgow'];
@$_SESSION['EVA']=$_POST['EVA'];
@$_SESSION['AlgoPlus']=$_POST['AlgoPlus'];

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
    <h1>Respiration</h1>
</div>
<form action="Prescription.php" method="post">

    SaO2 : <input type="number" name="SaO2">
    <br><br>
    FR : <input type="number" name="FR">
    <br><br>
    O2 : <input type="text" name="O2">
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




