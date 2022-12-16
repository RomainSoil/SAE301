<?php
session_start();
if (isset($_POST['Valider'])) {

    @$_SESSION['Date'] = date("Y-m-d H:m:s", strtotime($_POST["date"]));
    @$_SESSION['AideMarche'] = $_POST['AideMarche'];
    @$_SESSION['AideLever'] = $_POST['AideLever'];
    @$_SESSION['AideCoucher'] = $_POST['AideCoucher'];
    @$_SESSION['AideFauteil'] = $_POST['AideFauteil'];
    require("../ConnectionBDD.php");
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();
    require("../FonctionPhp.php");
    @ajoutDeDonneeAvecLesBooleans($bdd, "Mobilite", 'AideMarche');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Mobilite", 'AideLever');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Mobilite", 'AideCoucher');
    @ajoutDeDonneeAvecLesBooleans($bdd, "Mobilite", 'AideFauteil');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hygiène</title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>

<body>
<?php
include("BarreScenario.html");
include("EnteteV2.html");
?>
    <h2>Hygiène</h2>
<form action="Alimentation.php" method="post">

    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    Le patient a t-il eu une toilette ?:
    <input type="radio" name="toilette" value="oui" required>oui
    <input type="radio" name="toilette" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu douche ?:
    <input type="radio" name="douche" value="oui" required >oui
    <input type="radio" name="douche" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu un bain :
    <input type="radio" name="bain" value="oui" required>oui
    <input type="radio" name="bain" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu une refection de lit :
    <input type="radio" name="refectionLit" value="oui" required>oui
    <input type="radio" name="refectionLit" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu une change:
    <input type="radio" name="change" value="oui" required>oui
    <input type="radio" name="change" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu un soin de bouche :
    <input type="radio" name="soinBouche" value="oui" required>oui
    <input type="radio" name="soinBouche" value="non"  checked="checked" required>non
    <br><br>
    Le patient a t-il eu une prévention d'escare :
    <input type="radio" name="escare" value="oui" required>oui
    <input type="radio" name="escare" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il changer de position :
    <input type="radio" name="position" value="oui" required>oui
    <input type="radio" name="position" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu un matelas à l'air :
    <input type="radio" name="matelas" value="oui" required>oui
    <input type="radio" name="matelas" value="non" checked="checked" required>non
    <br><br>
    <div class="button_Suivant">
        <input type="submit" value="Valider" name="Valider">
    </div>

</form>
<div class="footer-CreateScenario">
    <form action="../BesoinAide.php" method="post">
        <button class="button-28" role="button" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>

<?php
?>
