<?php
session_start();

if (isset($_POST['Valider'])) {
    @$_SESSION['Date'] = date("Y-m-d H:m:s", strtotime($_POST["date"]));
    @$_SESSION['surveillancePerf'] = $_POST['surveillancePerf'];
    @$_SESSION['pansements'] = $_POST['pansements'];
    @$_SESSION['glycemique'] = $_POST['glycemique'];
    @$_SESSION['contentions'] = $_POST['contentions'];
    @$_SESSION['Catheter'] = $_POST['Catheter'];
    @$_SESSION['sondageurinaire'] = $_POST['sondageurinaire'];
    @$_SESSION['autre'] = $_POST['autre'];

    require("../ConnectionBDD.php");
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    require("../FonctionPhp.php");
    ajoutDeDonneeAvecLesBooleans($bdd, "Soins", 'surveillancePerf');
    ajoutDeDonneeAvecLesBooleans($bdd, "Soins", 'pansements');
    ajoutDeDonneeSansLesBooleans($bdd, "Soins", 'glycemique', $_POST['glycemique']);
    ajoutDeDonneeAvecLesBooleans($bdd, "Soins", 'contentions');
    ajoutDeDonneeSansLesBooleans($bdd, "Soins", 'Catheter', $_POST['Catheter']);
    ajoutDeDonneeSansLesBooleans($bdd, "Soins", 'sondageurinaire', $_POST['sondageurinaire']);
    ajoutDeDonneeSansLesBooleans($bdd, "Soins", 'autre', $_POST['autre']);

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
    <h2>Neurologie</h2>
<form method="post" action="Transition.php" >

    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    Temperature : <input type="text" name="temperature">
    <br><br>
    Glasgow : <input type="text" name="glasgow">
    <br><br>
    EVA : <input type="text" name="EVA">
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


