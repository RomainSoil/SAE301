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
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>

<body>
<?php
include("BarreScenario.html");
include("EnteteV2.html");
?>

    <h2>Elimination du patient</h2>

<form action="Cardio.php" method="post">
    URL Image  ? (Facultatif)
    <input type="url" name="radio">
    <br><br>
    Le patient a t-il eu des selles ?:
    <input type="radio" name="selles" value="oui" required>oui
    <input type="radio" name="selles" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu des gaz ?:
    <input type="radio" name="gaz" value="oui" required>oui
    <input type="radio" name="gaz" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il uriner :
    <input type="radio" name="urine" value="oui" required>oui
    <input type="radio" name="urine" value="non" checked="checked" required>non
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
