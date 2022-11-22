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
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>



<body>
<?php
include("BarreScenario.html");
include("EnteteV2.html");
?>
<h2>Alimentation du patient</h2>
<form method="post" action="SoinsClassique.php">
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image (Facultatif) ?: <input name="userfile" type="file" />
    <input type="submit" value="Ajouter" />
    <br><br>
    Le patient est-il a jeun ?:
    <input type="radio" name="jeun" value="oui" required>oui
    <input type="radio" name="jeun" value="non" checked="checked" required>non
    <br><br>
    Le patient est-il sous surveillance hydratation ?:
    <input type="radio" name="hydratation" value="oui" required >oui
    <input type="radio" name="hydratation" value="non" checked="checked" required>non
    <br><br>
    Le patient est-il sous surveillance alimentaire :
    <input type="radio" name="alimentaire" value="oui" required>oui
    <input type="radio" name="alimentaire" value="non" checked="checked" required>non
    <br><br>
    Le patient suit-il un régime? :
    <input type="radio" name="regime" value="oui" required>oui
    <input type="radio" name="regime" value="non" checked="checked" required>non
    <br><br>
    Le patient a t-il eu une aide au repas:
    <input type="radio" name="aideRepas" value="oui" required>oui
    <input type="radio" name="aideRepas" value="non" checked="checked" required>non
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
