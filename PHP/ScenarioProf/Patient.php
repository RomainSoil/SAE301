<?php
session_start();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Patient</title>
        <link rel="stylesheet" href="../PageProf.css">
        <script type="text/javascript" src="../LesFonctionsJS.js"></script>

    </head>

    <body>
    <!--Le haut de la page avec l'image et le titre-->
    <?php
    include ('BarreScenario.html');
    include ('Entete.html');
    include ('../ConnectionBDD.php')
    ?>
    <h2> Information sur la patient </h2>
        <form method="post">
        Nom :<input type="text" name="nom" id="nom" placeholder="Entrez le Nom du patient " required><br>
        Prénom :<input type="text" name="prenom" id="prenom" placeholder="Entrez le Prenom du patient" required><br><br>
        Age :<input type="number" name="age" id="age" placeholder="Entrez l' âge du patient" required><br>
        Date de naissance :<input type="date" name="DDN" id="DDN" required><br><br>
        Poids (en kg) :<input type="number" name="poids" id="poids" placeholder="Entrez le poids du patient" required><br>
        Taille (en cm)<input type="number" name="taille" id="Taille" placeholder="Entrez la taille du patient" required><br><br>
        <br>
        IEP :<input type="number" name="IEP" id="IEP" placeholder="Entrez le IEP du patient" required><br>
        IPP :<input type="number" name="IPP" id="IPP" placeholder="Entrez le IPP du patient" required><br><br>
        Sexe :<select name="sexe" id="sexe" required>
            <option value="">--Veuillez choisir le sexe--</option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
        </select><br><br>
        <br>
        Adresse:<input type="text" name="adresse" id="adresse" placeholder="Entrez l'adresse du patient" ><br>
        Ville :<input type="text" name="ville" id="ville" placeholder="Entrez la ville du patient" ><br>
        Code postal :<input type="number" name="CP" id="CP" placeholder="Entrez le code postal" ><br>
        <br>
        <div class="button_Suivant">
            <input type="submit" value="Valider" name="ValidPatient" onclick="<?php creerPatient($bdd=ConnectionBDD::getInstance()::getpdo());?>">
        </div>
    </form>



    <!--Le bas de page avec le boutton si on a besoin d'aide-->

    <div class="footer-CreateScenario">
        <form action="../BesoinAide.php" method="post">
            <button class="button-28" role="button" type="submit">Besoin d'aide</button>
        </form>
    </div>
    </body>
    </html>

<?php

/* permet de créer un nouveau patient*/
/**
 * @param $bdd
 * @return void
 */
function creerPatient($bdd){
    if (isset($_POST['ValidPatient'])) {
        $sql = $bdd->prepare("INSERT INTO patient(nom, prenom, age, ddn, poids, taille, iep, ipp, sexe, adresse, ville, codepostal, emailprof) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->execute(array(@$_POST['nom'], @$_POST['prenom'], @$_POST['age'], @$_POST['DDN'], @$_POST['poids'], @$_POST['taille'], @$_POST['IEP'], @$_POST['IPP'], @$_POST['sexe'], @$_POST['adresse'], @$_POST['ville'], @$_POST['CP'], @$_SESSION['email']));
        header('Location: Radio.php');
        exit;
    }
}

?>