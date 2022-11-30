<?php
session_start();

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
    <h2>Respiration</h2>
<form method="post" action="Transition2.php">
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image (Facultatif) ?: <input name="userfile" type="file" />
    <input type="submit" value="Ajouter" />
    <br><br>
    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    SaO2 : <input type="text" name="SaO2">
    <br><br>
    FR : <input type="text" name="FR">
    <br><br>
    O2 : <input type="text" name="O2">
    <br><br>

    <input type="submit" value="Valider" name="ValidScenario" >



</form>
<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>
</html>
