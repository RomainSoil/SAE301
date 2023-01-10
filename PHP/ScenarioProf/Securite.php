<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sécurité</title>
    <link rel="stylesheet" href="../PageProf.css">
    <script src="../LesFonctionsJS.js"></script>

</head>

<body>
<!--Le haut de la page avec l'image et le titre-->
<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>
<h2> Information sur la sécurité </h2>
<!--formulaire sur la securite qui sera enregistrer dans la base de donnée apres avoir valide toutes les categories-->

<form method="post" action="Soins.php">

        Date :
            <input type="datetime-local" name="date" id="date" required>
    <br><br>
    Une barriere de lit prescrite pour le patient :
             <input type="radio" name="prescrite" value="oui" required>oui
            <input type="radio" name="prescrite" value="non" checked="checked" required>non
    <br><br>
    Une barriere de lit pour le confort du patient :
    <input type="radio" name="confort" value="oui" required>oui
    <input type="radio" name="confort" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il des surveillances de contentions :
    <input type="radio" name="surveillance" value="oui" required>oui
    <input type="radio" name="surveillance" value="non" checked="checked" required>non
    <br><br>
    <div class="button_Suivant">
        <input type="submit" value="Valider" name="Valider">
    </div>






</form>

<div class="footer-CreateScenario">
    <form action="../BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>




