<?php
session_start();
@$_SESSION['ECG']=$_POST['ECG'];
@$_SESSION['pls']=$_POST['pls'];
@$_SESSION['TA']=$_POST['TA'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="Patient.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>

<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>

<body>

<form method="post" action="Mobilite.php">
    Veuillez entrez l'url de l'image ?
<input type="text" nom="radio">
</form>


</body>
</html>

<?php
?>
