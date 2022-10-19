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
    <link rel="stylesheet" href="Patient.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>

<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>
<form>
    date :<input type="date" id="start" name="date">
    temperature : <input type="text" name="temperature">
    temperature : <input type="text" name="temperature">
</form>


</div>
</body>
</html>

<?php
?>
