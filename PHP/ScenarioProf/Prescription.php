<?php
session_start();
@$_SESSION['SaO2']=$_POST['SaO2'];
@$_SESSION['FR']=$_POST['FR'];
@$_SESSION['O2']=$_POST['O2'];
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

<div class="Titre">
    <h1>Prescription</h1>
</div>
<form action="" method="post">

    Medicament : <input type="text" name="medicament">
    <br><br>
    Dose : <input type="number" name="dose">
    <br><br>
    Prise : <input type="date" name="prise">
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


