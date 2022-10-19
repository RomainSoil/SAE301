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
<body>
<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>
<form action="Repsi.php" method="post">

    temperature : <input type="number" name="temperature">
    glasgow : <input type="text" name="glasgow">
    EVA : <input type="number" name="EVA">
    AlgoPlus : <input type="text" name="AlgoPlus">
</form>


</div>
</body>
</html>

<?php
?>
