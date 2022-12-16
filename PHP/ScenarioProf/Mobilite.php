<?php
session_start();
if (isset($_POST['Valider'])) {

    @$_SESSION['Date'] = date("Y-m-d H:m:s", strtotime($_POST["date"]));
    @$_SESSION['ECG'] = $_POST['ECG'];
    @$_SESSION['pls'] = $_POST['pls'];
    @$_SESSION['TA'] = $_POST['TA'];
    require("../ConnectionBDD.php");
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    require("../FonctionPhp.php");
    @ajoutDeDonneeSansLesBooleans($bdd, "Cardio", 'ECG', $_POST['ECG']);
    @ajoutDeDonneeSansLesBooleans($bdd, "Cardio", 'pls', $_POST['pls']);
    @ajoutDeDonneeSansLesBooleans($bdd, "Cardio", 'TA', $_POST['TA']);
}
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
    <h2>Mobilité</h2>


<form method="post" action="Hygiene.php">

    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
Le patient a t-il eu une aide à la marche ?:
<input type="radio" name="AideMarche" value="oui" required>oui
<input type="radio" name="AideMarche" value="non" checked="checked" required>non
<br><br>
Le patient a t-il eu une aide au lever ?:
<input type="radio" name="AideLever" value="oui" required >oui
<input type="radio" name="AideLever" value="non" checked="checked" required>non
<br><br>
Le patient a t-il eu une aide au coucher :
<input type="radio" name="AideCoucher" value="oui" required>oui
<input type="radio" name="AideCoucher" value="non" checked="checked" required>non
<br><br>
Le patient a t-il eu une aide au fauteil :
<input type="radio" name="AideFauteil" value="oui" required>oui
<input type="radio" name="AideFauteil" value="non" checked="checked" required>non
<br><br>
    <div class="button_Suivant">
        <input type="submit" value="Valider" name="Valider">
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
