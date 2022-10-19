<?php
session_start();
@$_SESSION['massage']=$_POST['massage'];
@$_SESSION['entretien']=$_POST['entretien'];
@$_SESSION['accueil']=$_POST['accueil'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="Patient.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<?php
include("BarreScenario.html");
include("EnteteV2.html");
?>
<body>
<div class="Titre">
    <h1>Elimination du patient</h1>
</div>
<form action="Cardio.php" method="post">
    Le patient a t-il eu des selles ?:
    <input type="radio" name="selles" value="oui"required>oui
    <input type="radio" name="selles" value="non"required>non
    <br><br>
    Le patient a t-il eu des gaz ?:
    <input type="radio" name="gaz" value="oui"required>oui
    <input type="radio" name="gaz" value="non"required>non
    <br><br>
    Le patient a t-il uriner :
    <input type="radio" name="urine" value="oui"required>oui
    <input type="radio" name="urine" value="non"required>non
    <br>
    <br>
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
