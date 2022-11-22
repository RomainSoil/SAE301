<?php
session_start();
@$_SESSION['SaO2']=$_POST['SaO2'];
@$_SESSION['FR']=$_POST['FR'];
@$_SESSION['O2']=$_POST['O2'];

require ('../ConnectionBDD.php');
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
<form action="Securite.php" method="post">
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image (Facultatif) ?: <input name="userfile" type="file" />
    <input type="submit" value="Ajouter" />
    <br><br>
    Medicament :
    <button type="button" onclick="afficher()">ajouter médicament</button>
    <br><br>
    <div class="button_Suivant">
        <input type="submit" name="Valider" value="Suivant">
    </div>


</form>
<br><br>
<form method="post" style="visibility: hidden" id="form">
    Nom médicament : <input type="text" name="nommedic" required>
    <br><br>
    Nom Médecin : <input type="text" name="nom" required>
    <br><br>
    Dose (en mg) : <input type="number" name="cp" required>
    <br><br>
    Prise : <input type="datetime-local" name="prisemedic" required>
    <br><br>
    <input type="submit" name="creermedic" value="Enregistrer le medicament" onclick="<?php
    $bdd = ConnectionBDD::getInstance()::getpdo(); insert($bdd)?>">

</form>

<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
    </body>
</html>
<?php
    /* permet d'ajouter a la base de donnée la prescription du patient*/
    /**
    * @param $bdd
    * @return void
    */
    function insert($bdd){
    if (isset($_POST['creermedic'])){
    $sql = $bdd->prepare("INSERT INTO prescription(prise, dose, medicament, idpatient, medecin ) values (?, ?, ?, ?, ?)");
    $sql ->bindParam(1, $_POST['prisemedic']);
    $sql ->bindParam(2, $_POST['cp']);
    $sql ->bindParam(3, $_POST['nommedic']);
    $sql ->bindParam(4, $_SESSION['patient']);
    $sql ->bindParam(5, $_POST['nom']);

    $sql ->execute();
    }
    }
    /* permet de créer un nouveau médicament et le mettre dans la base de données*/

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



