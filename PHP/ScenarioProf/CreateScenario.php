<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Creation Scenario</title>
    <link rel="stylesheet" href="../PageProf.css">
    <script src="../LesFonctionsJS.js"></script>

</head>



<body>
<?php
include("BarreScenario.html");
?>
<h2>Création de Scénario</h2>






<!--selection du patient avec ses options de navigation-->

    <?php
    include ('../ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();

    require('FonctionScenario.php');

/* fonction qui nous oblige a selectionner un groupe pour accèder a la page d'affichage de groupe*/
    if (isset($_POST['affgrp']) && $_POST['grp2']!='!') {
        $_SESSION['grp']=$_POST['grp2'];
        header('Location: afficheGroupe.php');


    }

    /* fonction qui nous oblige à sélectionner un patient pour accéder à la page de suppression de scenario*/

    if (isset($_POST['patient']) && $_POST['patient']!='2') {
        header('Location: Supprimer.php');


    }
    affichersce();
    contrainte();
    creerGroupe($bdd);
    ajoutEtu($bdd);
    Scenario($bdd);


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
            }             $_SESSION['patient']=$_POST['patient'];

            ?>
    </select>
        <button class="button-90" type="submit" name="Contrainte">Ajouter une contrainte</button>
        <button class="button-90" type="submit" name="affiche">Afficher le scénario</button>
        <button class="button-90" type="submit" name="Supprimer">Supprimer le patient</button>

    </form>
<br>



<form method="post">
    <h4>Créer un groupe</h4>
    <input type="text" placeholder="Nom du groupe" name="grp">
    <button class="button-90" type="submit" name="Creer">Créer le groupe</button>
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
    <button class="button-90" type="submit" name="affgrp">Afficher le groupe</button>


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
    <button class="button-90" type="submit" name="ajoutEtu">Ajouter</button>


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
    <button class="button-90" type="submit" name="envoie">Envoyer</button>



</form>
<br>
<!--Le bas de page avec le boutton si on a besoin d'aide et de création d'un nouveau patient-->
<div class="footer-CreateScenario">
    <form action="Patient.php" method="post">
        <button class="button-28" type="submit">Créer un patient</button>
    </form>
    <br>
    <form action="../BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>

</html>



