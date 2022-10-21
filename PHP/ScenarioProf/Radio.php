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
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="Patient.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("BarreScenario.html");
include("EnteteV2.html");
?>

<div class="Titre">
    <h1>Radio</h1>
</div>
<form method="post" action="Mobilite.php">
    Veuillez entrez l'url de l'image ?
<input type="url" name="radio">
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
