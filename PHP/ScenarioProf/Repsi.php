<?php
session_start();
@$_SESSION['temperature']=$_POST['temperature'];
@$_SESSION['glasgow']=$_POST['glasgow'];
@$_SESSION['EVA']=$_POST['EVA'];
@$_SESSION['AlgoPlus']=$_POST['AlgoPlus'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="Patient.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>

<form action="" method="post">

    Sa02 : <input type="number" name="Sa02">
    FR : <input type="number" name="FR">
    02 : <input type="text" name="02">
</form>

<div class="Titre">
    <h1>Radio</h1>
</div>


