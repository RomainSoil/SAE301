<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../PageProf.css">
    <script type="text/javascript" src="../LesFonctionsJS.js"></script>

</head>



<body>
<?php
include("BarreScenario.html");
?>
<h2>Création de Scénario</h2>


    <!--Le bas de page avec le boutton si on a besoin d'aide et de création d'un nouveau patient-->
    <div class="footer-CreateScenario">
        <form action="Patient.php" method="post">
            <input type="submit" value="Créer un patient" name="Créer">
        </form>
        <br>
        <form action="../Accueil.php" method="post">
            <input type="submit" value="Besoin d'aide ?">
        </form>
    </div>




<!--selection du patient avec ses options de navigation-->

    <?php
    include ('../ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();

    function effacer($bdd){
        if (isset($_POST['Supprimer'])){
            $Supp=$_POST['patient'];

        }
        if (isset($_POST['OuiSupp'])) {
            $patient = $bdd->prepare("Delete FROM patient where idpatient=?");
            $patient->bindParam(1, $Supp);
            $patient->execute();
            header('CreateScenario.php');
        }

    }
    /* permet de pouvoir appuyer sur le bouton 'ajouter contraintes' si et seulement si un patient est sélectionné*/
    /**
     * @return void
     */
    function contrainte()
    {
        if (isset($_POST['patient']) && $_POST['patient'] != 2) {
            if (isset($_POST['Contrainte'])) {
                $_SESSION['patient'] = $_POST['patient'];
                header('Location: Radio.php');
            }
        }
    }

    /* permet d'appuyer sur le bouton afficher scénario si et seulement si un patient est séléctionné*/
    /**
     * @return void
     */
    function affichersce()
    {
        if (isset($_POST['patient']) && $_POST['patient'] != 2) {
            if (isset($_POST['affiche'])) {
                $_SESSION['scenario'] = $_POST['patient'];
                header('Location: afficheScenario2.php');
            }
        }
    }
    function creerGroupe($bdd){
    if (isset($_POST['Creer'])) {
        $creer = $bdd->prepare("INSERT INTO groupeclasse(nom) values (?)");
        $creer->execute(array($_POST['grp']));
        header('Location: CreateScenario.php');



    }}

    function EstDeJaDansLeGroupe($bdd,$groupe,$mail){
        $sql = $bdd->prepare("SELECT email FROM groupeetudiant where idgroupe=? ");
        $sql->bindParam(1,$groupe);
        $sql->execute();
        $rep=$sql->fetchAll();
         foreach ($rep as $i) {
                if($i['email'] == $mail){
                    return true;
                }

}
         return false;
    }
    function ajoutEtu($bdd){
        if (isset($_POST['ajoutEtu']) && $_POST['grp2']!='!'&&$_POST['etud']!='!'){
        $groupe=@$_POST['grp2'];
        $mail=@$_POST['etud'];

           if (EstDeJaDansLeGroupe($bdd,$groupe,$mail)){
                    echo '<script>alert("Cet étudiant est déjà dans ce groupe")</script>';

            }

                else {
                    $ajout = $bdd->prepare("INSERT INTO groupeetudiant(idgroupe, email) values (?,?)");
                    $ajout->execute(array($groupe,$mail));
                }



        }}

    function Scenario($bdd){
        if (isset($_POST['envoie']) && $_POST['GroupeScena']!="!" && $_POST['patientScena']!="!") {
            $ajout = $bdd->prepare("INSERT INTO groupescenario(idgroupe,idpatient) values (?,?)  ");
            $ajout->execute(array($_POST['GroupeScena'],$_POST['patientScena']));
        }}

    if (isset($_POST['affgrp']) && $_POST['grp2']!='!') {
        $_SESSION['grp']=$_POST['grp2'];
        header('Location: afficheGroupe.php');


    }
    affichersce();
    contrainte();
    creerGroupe($bdd);
    ajoutEtu($bdd);
    Scenario($bdd);
    effacer($bdd);


    /* permet de créer une liste déroulante avec tous les patients*/
        $patients = $bdd->prepare("SELECT * FROM patient where emailprof=?");
        $patients->bindParam(1,$_SESSION['email']);
        $patients->execute();

    /* permet de créer une liste déroulante avec tous les patientsScenario*/
    $patientsScenario = $bdd->prepare("SELECT * FROM patient where emailprof=?");
    $patientsScenario->bindParam(1,$_SESSION['email']);
    $patientsScenario->execute();

    /* permet de créer une liste déroulante avec tous les etudiants*/
    $etudiants = $bdd->prepare("SELECT * FROM etudiant");
    $etudiants->execute();

    /* permet de créer une liste déroulante avec tous les groupes*/
    $groupes = $bdd->prepare("SELECT * FROM groupeclasse");
    $groupes->execute();

    /* permet de créer une liste déroulante avec tous les groupesScenario*/
    $groupesScenario = $bdd->prepare("SELECT * FROM groupeclasse");
    $groupesScenario->execute();



    ?>
    <form method="post">
    <select name="patient">
        <option value="2">Sélectionnez un patient</option>
            <?php
            while ($patient = $patients->fetch()){
                $pat = $patient[1];
                $pat.=" ";
                $pat.=$patient[2];
                $pat.=" ";
                $pat.=$patient[4];
                ?>
            <option value=<?php echo $patient[0]?>><?php echo $pat?></option>
    <?php
            }
            ?>
    </select>
        <input type="submit" value="Ajouter une contrainte" name="Contrainte">
        <input type="submit" value="Afficher le scénario" name="affiche">
        <input type="button" value="Supprimer le patient" name = "Supprimer" onclick="afficher()">

    </form>
<br>

<form method="post"  style="visibility: hidden" id="form">
    <div class="supprimer">
    Êtes-vous sur de supprimer ce patient ?
    <input type="submit" name="OuiSupp" value="Oui">
    <input type="button" name="Non" value="Non" onclick="afficher()">
    </div>
</form>

<form method="post">
    <h4>Créer un groupe</h4>
    <input type="text" placeholder="Nom du groupe" name="grp">
    <input type="submit" value="Créer le groupe" name="Creer">
    <br>
    <h4>Ajouter étudiant au groupe</h4>
    <select name="grp2">
        <option value="!">Sélectionnez un Groupe</option>
        <?php
        while ($groupe = $groupes->fetch()){
            $grp =$groupe[1];
            $grp.=" ";
            ?>
            <option value=<?php echo $groupe[0]?>><?php echo $grp?></option>
            <?php

        }$_SESSION['grp']=$_POST['grp2'];

        ?>
    </select>
    <input type="submit" value="Afficher le groupe" name="affgrp">

    <select name="etud">
        <option value="!">Sélectionnez un étudiant</option>
        <?php
        while ($etudiant = $etudiants->fetch()){
            $etu =$etudiant[2];
            $etu.=" ";
            $etu.=$etudiant[3];
            ?>
            <option value=<?php echo $etudiant[0]?>><?php echo $etu?></option>
            <?php
        }



        ?>
    </select>
    <input type="submit" value="Ajouter" name="ajoutEtu">

    <h4>Envoie du scénario</h4>
    <select name="patientScena">
        <option value="!">Sélectionnez un scénario</option>
        <?php
        while ($patient = $patientsScenario->fetch()){
            $pat = $patient[1];
            $pat.=" ";
            $pat.=$patient[2];
            $pat.=" ";
            $pat.=$patient[4];
            ?>
            <option value=<?php echo $patient[0]?>><?php echo $pat?></option>
            <?php
        }
        ?>
    </select>
    <select name="GroupeScena">
        <option value="!">Sélectionnez un Groupe</option>
        <?php
        while ($groupe = $groupesScenario->fetch()){
            $grp =$groupe[1];
            $grp.=" ";
            ?>
            <option value=<?php echo $groupe[0]?>><?php echo $grp?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" value="Envoyer" name="envoie">


</form>
<br>

</body>

</html>

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
    }
</script>


