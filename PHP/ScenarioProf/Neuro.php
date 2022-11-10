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
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>
    <h2>Neurologie</h2>
<form method="post" action="Transition.php" >
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image  ? (Facultatif) <input name="userfile" type="file" />
    <input type="submit" value="Ajouter le fichier" />
    <br><br>
    Temperature : <input type="number" name="temperature">
    <br><br>
    Glasgow : <input type="text" name="glasgow">
    <br><br>
    EVA : <input type="number" name="EVA">
    <br><br>
    AlgoPlus : <input type="text" name="AlgoPlus">
    <br><br>
    <div class="button_Suivant">
        <input type="submit" value="Valider" name="Valdider">
    </div>


</form>
<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>

</div>
</body>
</html>


