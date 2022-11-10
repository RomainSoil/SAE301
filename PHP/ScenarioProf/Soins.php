<?php
session_start();

@$_SESSION['Date']=date("Y-m-d H:m:s", strtotime($_POST["date"]));
@$_SESSION['prescrite']=$_POST['prescrite'];
@$_SESSION['confort']=$_POST['confort'];
@$_SESSION['surveillance']=$_POST['surveillance'];

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

    <h2>Soins Relationnel du patient</h2>
<form action="Elimination.php" method="post">
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image (Facultatif) ?: <input name="userfile" type="file" />
    <input type="submit" value="Ajouter" />
    <br><br>
    Le patient est-il passé par l'accueil:
    <input type="radio" name="accueil" value="oui" required>oui
    <input type="radio" name="accueil" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu un entretien avec un infirmier?:
    <input type="radio" name="entretien" value="oui" required>oui
    <input type="radio" name="entretien" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu un toucher ou un massage :
    <input type="radio" name="massage" value="oui" required>oui
    <input type="radio" name="massage" value="non" checked="checked" required>non
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
