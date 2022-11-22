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
    <title>Soins</title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>

<h2>Soins du patient</h2>
<form action="Neuro.php" method="post">
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image (Facultatif) ?: <input name="userfile" type="file" />
    <input type="submit" value="Ajouter" />
    <br><br>
    Le patient a-t-il une surveillance perf ? :
    <input type="radio" name="surveillancePerf" value="oui" required>oui
    <input type="radio" name="surveillancePerf" value="non" checked="checked" required>non
    <br><br>
    Le patient a-t-il des pansements ? :
    <input type="radio" name="pansements" value="oui" required>oui
    <input type="radio" name="pansements" value="non" checked="checked" required>non
    <br><br>
    Surveillance Glycémique (en g/l) :
    <input type="number" step="0.01" name="glycémique" value="oui" required>
    <br>
    <br>
    Le patient a-t-il des bas de contentions ? :
    <input type="radio" name="contentions" value="oui" required>oui
    <input type="radio" name="contentions" value="non" checked="checked" required>non
    <br><br>
    Cathéter veineux périphérique ? :
    <input type="text" name="Cathéter" required>
    <br><br>
    Sondage urinaire ? :
    <input type="text" name="sondageurinaire" required>
    <br><br>
    Autre ? :
    <input type="text" name="autre" required>
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
