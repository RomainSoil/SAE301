<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ScenarioEtudiant </title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include('BarreScenarioEtu.html');

include('../ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

require('FonctionScenario.php');


/* permet de créer une liste déroulante avec tous les patients*/
$patients = $bdd->prepare("SELECT * FROM patient where emailprof=?");
$patients->bindParam(1,$_SESSION['email']);
$patients->execute();
?>

<form method="post" action="Note.php">
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
        <button class="button-90" role="button" type="submit" name="note">Voir les notes </button>

    </form>