<?php
session_start();
if (isset($_POST['Valider'])) {

    @$_SESSION['nom'] = $_POST['nom'];
    @$_SESSION['prenom'] = $_POST['prenom'];
    @$_SESSION['DDN'] = $_POST['DDN'];
    @$_SESSION['poids'] = $_POST['poids'];
    @$_SESSION['taille'] = $_POST['taille'];
    @$_SESSION['IEP'] = $_POST['IEP'];
    @$_SESSION['IPP'] = $_POST['IPP'];
    @$_SESSION['sexe'] = $_POST['sexe'];
    if (empty($_POST['adresse'])) {
        @$_SESSION['adresse'] = $_POST['adresse'];
    }
    if (empty($_POST['CP'])) {
        @$_SESSION['CP'] = $_POST['CP'];
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Radio</title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("BarreScenario.html");
include("EnteteV2.html");
?>

    <h2>Radio</h2>
<form method="post" action="Diagnostic.php">
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image ?: <input name="userfile" type="file" />
    <input type="submit" value="Ajouter" />
    <br><br>
    <div class="button_Suivant">
        <input type="submit" value="Valider">
    </div>

</form>
<div class="footer-CreateScenario">
    <form action="../BesoinAide.php" method="post">
        <button class="button-28" role="button" type="submit">Besoin d'aide</button>
    </form>
</div>

</body>
</html>

<?php
?>
