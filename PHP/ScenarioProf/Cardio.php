<?php
session_start();
@$_SESSION['urine']=$_POST['urine'];
@$_SESSION['gaz']=$_POST['gaz'];
@$_SESSION['selles']=$_POST['selles'];
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
    include("BarreScenario.html");
    include("Entete.html");
    ?>
<div class="Titre">
    <h1>Cardio</h1>
</div>
<form method="post" action="Radio.php">
    TA : <input type="text" name="TA" id="TA" > <br><br>
    PLS :<input type ="int" name="pls" id=pls> <br><br>
    ECG :<input type="text" name="ECG" id="ECG">
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
