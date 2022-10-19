<?php
session_start();
@$_SESSION['AideMarche']=$_POST['AideMarche'];
@$_SESSION['AideLever']=$_POST['AideLever'];
@$_SESSION['AideCoucher']=$_POST['AideCoucher'];
@$_SESSION['AideFauteil']=$_POST['AideFauteil'];
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
<body>
<form action="Alimentation.php" method="post">
    Le patient a t-il eu une toilette ?:
    <input type="radio" name="toilette" value="oui" required>oui
    <input type="radio" name="toilette" value="non" required>non
    <br>
    Le patient a t-il eu douche ?:
    <input type="radio" name="douche" value="oui" required >oui
    <input type="radio" name="douche" value="non" required>non
    <br>
    Le patient a t-il eu un bain :
    <input type="radio" name="bain" value="oui" required>oui
    <input type="radio" name="bain" value="non" required>non
    <br>
    Le patient a t-il eu une refection de lit :
    <input type="radio" name="refectionLit" value="oui" required>oui
    <input type="radio" name="refectionLit" value="non" required>non
    <br>
    Le patient a t-il eu une change:
    <input type="radio" name="change" value="oui" required>oui
    <input type="radio" name="change" value="non" required>non
    <br>
    Le patient a t-il eu un soin de bouche :
    <input type="radio" name="soinBouche" value="oui" required>oui
    <input type="radio" name="soinBouche" value="non" required>non
    <br>
    Le patient a t-il eu une prévention d'escare :
    <input type="radio" name="escare" value="oui" required>oui
    <input type="radio" name="escare" value="non" required>non
    <br>
    Le patient a t-il changer de position :
    <input type="radio" name="position" value="oui" required>oui
    <input type="radio" name="position" value="non" required>non
    <br>
    Le patient a t-il eu un matelas à l'air :
    <input type="radio" name="matelas" value="oui" required>oui
    <input type="radio" name="matelas" value="non" required>non
    <br>
</form>
</body>
</html>

<?php
?>
