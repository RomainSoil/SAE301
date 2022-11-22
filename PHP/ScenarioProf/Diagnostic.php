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
require ('../ConnectionBDD.php');

?>
    <h2>Date du Diagnostic</h2>

<Form action="Diagnostic.php" method="post">
    Date :
    <input type="datetime-local" name="date" id="date" required>
    <h2>Intervenant</h2>
    Nom :<input type="text" name="nom" id="nom"  placeholder="Nom de l'intervenant " required><br>
    Prénom :<input type="text" name="prenom" id="prenom" placeholder="Prenom de l'intervenant" required><br><br>
   <h2>Diagnostic:</h2></>
<!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
Image (Facultatif) ?: <input name="userfile" type="file" />
<input type="submit" value="Ajouter" />
<br><br>
    <div class="Diagnostic">
    <textarea name="diagnostic" id="diagnostic" rows="20" cols="80" required> </textarea></div> <br>
    <div class="button_Suivant">
        <input type="submit" name="Valider" onclick="<?php
        $bdd = ConnectionBDD::getInstance()::getpdo(); insertDiag($bdd)?>">
    </div>
</Form>
<br>
<form action="Prescription.php" method="post">
    <input type="submit" name="suivant" value="Suivant">
</form>

<footer>    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>
</html>

<?php
/**
 * @param $bdd
 * @return void
 */
function insertDiag($bdd){
    if (isset($_POST['Valider'])){
        $sql = $bdd->prepare("INSERT INTO diagnostic(date,nom,prenom,compterendu, idpatient ) values (?, ?, ?, ?, ?)");
        $sql ->bindParam(1, $_POST['date']);
        $sql ->bindParam(2, $_POST['nom']);
        $sql ->bindParam(3, $_POST['prenom']);
        $sql ->bindParam(4, $_POST['diagnostic']);
        $sql ->bindParam(5, $_SESSION['patient']);

        $sql ->execute();
    }
}
/* permet de créer un nouveau diagnostic et le mettre dans la base de données*/

?>


