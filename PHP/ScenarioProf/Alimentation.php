<?php
session_start();
@$_SESSION['toilette']=$_POST['toilette'];
@$_SESSION['douche']=$_POST['douche'];
@$_SESSION['bain']=$_POST['bain'];
@$_SESSION['refectionLit']=$_POST['refectionLit'];
@$_SESSION['change']=$_POST['change'];
@$_SESSION['soinBouche']=$_POST['soinBouche'];
@$_SESSION['escare']=$_POST['escare'];
@$_SESSION['position']=$_POST['position'];
@$_SESSION['matelas']=$_POST['matelas'];
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
include("ScenarioProf/BarreScenario.html");
include("ScenarioProf/EnteteV2.html");
?>
<div class="Titre">
    <h1>Alimentation du patient</h1>
</div>
<form method="post" action="Neuro.php">
    Le patient est-il a jeun ?:
    <input type="radio" name="jeun" value="oui" required>oui
    <input type="radio" name="jeun" value="non" required>non
    <br><br>
    Le patient est-il sous surveillance hydratation ?:
    <input type="radio" name="hydratation" value="oui" required >oui
    <input type="radio" name="hydratation" value="non" required>non
    <br><br>
    Le patient est-il sous surveillance alimentaire :
    <input type="radio" name="alimentaire" value="oui" required>oui
    <input type="radio" name="alimentaire" value="non" required>non
    <br><br>
    Le patient suit-il un régime? :
    <input type="radio" name="regime" value="oui" required>oui
    <input type="radio" name="regime" value="non" required>non
    <br><br>
    Le patient a t-il eu une aide au repas:
    <input type="radio" name="aideRepas" value="oui" required>oui
    <input type="radio" name="aideRepas" value="non" required>non
    <br><br>
    <div class="button_Suivant">
        <input type="submit" value="Valider">
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
