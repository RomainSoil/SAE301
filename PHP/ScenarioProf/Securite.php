<?php
session_start();
@$_SESSION['nom']=$_POST['nom'];
@$_SESSION['prenom']=$_POST['prenom'];
@$_SESSION['DDN']=$_POST['DDN'];
@$_SESSION['poids']=$_POST['poids'];
@$_SESSION['taille']=$_POST['taille'];
@$_SESSION['IEP']=$_POST['IEP'];
@$_SESSION['IPP']=$_POST['IPP'];
@$_SESSION['sexe']=$_POST['sexe'];
if (empty($_POST['adresse'])){
@$_SESSION['adresse']=$_POST['adresse'];}
if (empty($_POST['CP'])){
    @$_SESSION['CP']=$_POST['CP'];}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="Patient.css">
    <script type="text/javascript" src="../LesFonctionsJS.js"></script>

</head>

<body>
<!--Le haut de la page avec l'image et le titre-->
<?php
include ('BarreScenario.html');
include ('Entete.html');
?>
<div class="Titre">
<h1> Information sur la sécurité </h1>
</div>
<form method="post" action="Soins.php">
    Date :
        <input type="datetime-local" name="date" id="date" required>

    <br><br>
    Une barriere de lit prescrite pour le patient :
             <input type="radio" name="prescrite" value="oui"required>oui
            <input type="radio" name="prescrite" value="non"required>non
    <br><br>
    Une barriere de lit pour le confort du patient :
    <input type="radio" name="confort" value="oui"required>oui
    <input type="radio" name="confort" value="non"required>non
    <br><br>
    Le patient a t-il des surveillances de contentions :
    <input type="radio" name="surveillance" value="oui"required>oui
    <input type="radio" name="surveillance" value="non"required>non
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



