<?php
session_start();
@$_SESSION['SaO2']=$_POST['SaO2'];
@$_SESSION['FR']=$_POST['FR'];
@$_SESSION['O2']=$_POST['O2'];
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
?>
    <h2>Prescription</h2>
<form action="" method="post">
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image (Facultatif) ?: <input name="userfile" type="file" />
    <input type="submit" value="Ajouter" />
    <br><br>
    Medicament : <input type="text" name="medicament" required>
    <button type="button" onclick="afficher()">ajouter medicament</button>

    <br><br>
    Dose : <input type="number" name="dose" required>
    <br><br>
    Prise : <input type="date" name="prise" required>
    <br><br>
    Nom Médecin : <input type="text" name="nom" required>
    <br><br>
    <div class="button_Suivant">
        <input type="submit" name="Valider">
    </div>


</form>
<form method="post" style="visibility: hidden" id="form">
    Nom médicament : <input type="text" name="nommedic" required>
    <br><br>
    cp : <input type="number" name="cp" required>
    <br><br>
    prise : <input type="number" name="prisemedic" required>
    <br><br>
    <input type="submit" name="creermedic">

</form>

<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
    </body>


<?php
require ('../ConnectionBDD.php');
$bdd = ConnectionBDD::getInstance()::getpdo();
/* permet d'ajouter a la base de donnée la prescription du patient*/
function insert($bdd){
    if (isset($_POST['Valider'])){
        $sql = $bdd->prepare("INSERT INTO prescription(prise, medicament, idpatient, medecin, dose) values (?, ?, ?, ?, ?)");
        $sql->execute(array($_POST['prise'], $_POST['medicament'], $_SESSION['patient'], $_POST['nom'], $_POST['dose']));
        echo 'Prescription ajoutée';
        header(header : 'Location: Securite.php');

    }
}
/* permet de créer un nouveau médicament et le mettre dans la base de données*/
function creermedic($bdd)
{
    if (isset($_POST['creermedic'])) {
        $sql = $bdd->prepare("INSERT INTO medicament(nom, cp, prise) values (?, ?, ?)");
        $sql->execute($_POST['nommedic'], $_POST['cp'], $_POST['prisemedic']);
        echo 'medicament crée';
}
}
insert($bdd);
creermedic($bdd);

?>
<script>
    /* permet d'afficher ou non la création de médicaments*/
    e=true;
function afficher(){
    if (e) {
        document.getElementById('form').setAttribute('style', 'visibility:visible')
        e=false;
    }else {
        document.getElementById('form').setAttribute('style', 'visibility:hidden')
        e=true;
    }
    }</script>
</html>


