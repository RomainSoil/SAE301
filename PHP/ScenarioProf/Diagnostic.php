<?php
session_start();

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
include ('../ConnectionBDD.php');
?>
<div class="Titre">
    <h3>Date du Diagnostic</h3>
</div>
<Form method="post">
    Date :
    <input type="datetime-local" name="date" id="date" required>
    <div class="Titre">
        <h3>Intervenant</h3>
    </div>
    Nom :<input type="text" name="nom" id="nom"  placeholder="Nom de l'intervenant " required><br>
    Prénom :<input type="text" name="prenom" id="prenom" placeholder="Prenom de l'intervenant" required><br><br>
    <div class="Titre"><h3>Diagnostic:</h3></div>
    <div class="text_area">
    <textarea name="diagnostic" id="diagnostic" rows="20" cols="80" required> </textarea></div> <br>
    <div class="button_Suivant">
        <input type="submit" name="Valider">
    </div>
</Form>

<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>
</html>

<?php

/* permet d'inscrir dans la base de données les informations du diagnostique du patient séléctionné*/
function creerDiagnostic($bdd){
    if (isset($_POST['Valider'])){
        $sql = $bdd->prepare("INSERT INTO intervenant (nom,prenom,compterendu) values (?, ?,?)");
        $sql->execute(array($_POST['nom'],$_POST['prenom'],$_POST['diagnostic']));
        header(header: 'Location: Securite.php');
        exit;}
}
creerDiagnostic(ConnectionBDD::getInstance()::getpdo());

?>


