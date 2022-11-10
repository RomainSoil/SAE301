<?php
session_start();

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
include ('BarreScenario.html');
include ('EnteteV2.html');
include ('../ConnectionBDD.php');
?>
    <h2>Date du Diagnostic</h2>

<Form method="post">
    Date :
    <input type="datetime-local" name="date" id="date" required>
    <h2>Intervenant</h2>
    Nom :<input type="text" name="nom" id="nom"  placeholder="Nom de l'intervenant " required><br>
    Prénom :<input type="text" name="prenom" id="prenom" placeholder="Prenom de l'intervenant" required><br><br>
   <h2>Diagnostic:</h2>
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image  ? (Facultatif) <input name="userfile" type="file" />
    <input type="submit" value="Ajouter le fichier" />
    <br><br>
    <div class="Diagnostic">
    <textarea name="diagnostic" id="diagnostic" rows="20" cols="80" required> </textarea></div> <br>
    <div class="button_Suivant">
        <input type="submit" name="Valider">
    </div>
</Form>

<footer>    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>
</html>

<?php

/* permet d'inscrir dans la base de données les informations du diagnostique du patient séléctionné*/
function creerDiagnostic($bdd){
    if (isset($_POST['Valider'])){
        $sql = $bdd->prepare("INSERT INTO intervenant (nom,prenom,date,compterendu) values (?,?, ?,?)");
        $sql->execute(array($_POST['nom'],$_POST['prenom'],$_POST['date'],$_POST['diagnostic']));
        header(header: 'Location: Prescription.php');
        exit;}
}
creerDiagnostic(ConnectionBDD::getInstance()::getpdo());

?>


