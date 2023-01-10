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
include('BarreScenario.html');

include('../ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

require('FonctionScenario.php');


/* permet de créer une liste déroulante avec tous les patients*/
$patients = $bdd->prepare("SELECT * FROM patient where emailprof=?");
$patients->bindParam(1,$_SESSION['email']);
$patients->execute();
?>
<h4>Notes des Scénarios</h4>
<form method="post" action="Note.php">
    <select name="patient">
        <option value="2">Sélectionnez un patient</option>
            <?php
/* liste deroulante qui nous permet de sélectionner un patient*/
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
        <button class="button-90" type="submit" name="note">Voir les notes </button>

    </form>
<div class="footer-CreateScenario">

    <br>
    <form action="../BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>