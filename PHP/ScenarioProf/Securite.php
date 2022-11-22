<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../PageProf.css">
    <script type="text/javascript" src="../LesFonctionsJS.js"></script>

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
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image (Facultatif) ?: <input name="userfile" type="file" />
    <input type="submit" value="Ajouter" />
    <br><br>
    Date :
        <input type="datetime-local" name="date" id="date" required>
    <h4>La date sélectionnée sera identique pour les catégories suivantes, vos informations seront enregistrées dans cette dernière catégorie.</h4>
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




