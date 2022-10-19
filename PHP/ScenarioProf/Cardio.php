<?php
session_start();
@$_SESSION['urine']=$_POST['urine'];
@$_SESSION['gaz']=$_POST['gaz'];
@$_SESSION['selles']=$_POST['selles'];
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
    include("BarreScenario.html");
    include("EnteteV2.html");
    ?>
<form method="post" action="Radio.php">
    TA : <input type="text" name="TA" id="TA" > <br>
    pls :<input type ="int" name="pls" id=pls> <br>
    ECG :<input type="text" name="ECG" id="ECG">

</form>
<body>
</body>
</html>

<?php
?>
