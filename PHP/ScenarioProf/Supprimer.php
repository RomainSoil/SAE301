<?php session_start() ;
include ('../ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require('FonctionScenario.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Supprimer</title>
    <link rel="stylesheet" href="../PageProf.css">
    <script type="text/javascript" src="../LesFonctionsJS.js"></script>

</head>

<?php
include("BarreScenario.html");

if (isset($_POST['Non'])) {
    header('Location: CreateScenario.php');


}
?>

<body>
<br><br><br><br>
<form method="post" >
    <div class="supprimer">
        Êtes-vous sur de supprimer ce patient ?
        <input type="submit" name="OuiSupp" value="Oui">
        <input type="submit" name="Non" value="Non">
    </div>
</form>

</body>
</html>

<?php effacer($bdd);
