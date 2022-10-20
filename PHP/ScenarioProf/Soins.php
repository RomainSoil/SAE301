<?php
session_start();

@$_SESSION['Date']=$_POST['date'];
@$_SESSION['prescrite']=$_POST['prescrite'];
@$_SESSION['confort']=$_POST['confort'];
@$_SESSION['surveillance']=$_POST['surveillance'];

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
    <h1>Soins Relationnel du patient</h1>
</div>
<form action="Elimination.php" method="post">
    Le patient est-il passé par l'accueil:
    <input type="radio" name="accueil" value="oui" required>oui
    <input type="radio" name="accueil" value="non" required>non
    <br><br>
    Le patient a t-il eu un entretien avec un infirmier?:
    <input type="radio" name="entretien" value="oui" required>oui
    <input type="radio" name="entretien" value="non" required>non
    <br><br>
    Le patient a t-il eu un toucher ou un massage :
    <input type="radio" name="massage" value="oui" required>oui
    <input type="radio" name="massage" value="non" required>non
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
