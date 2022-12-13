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

$scena = $bdd->prepare("SELECT  nom,prenom,DDN, p.idpatient from groupescenario join groupeetudiant g on groupescenario.idgroupe = g.idgroupe join patient p on groupescenario.idpatient = p.idpatient  where email=?" );
$scena->bindParam(1,$_SESSION['email']);
$scena->execute();

affichersce();




?>

<h2>Scénario</h2>
<div class="footer-CreateScenario">
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</div>

<form method="post">
    <select name="patient">
        <option value="2">Sélectionnez un scénario</option>
        <?php

        while ($scenario = $scena->fetch()){
            $sc = $scenario[0];
            $sc.=" ";
            $sc.=$scenario[1];
            $sc.=" ";
            $sc.=$scenario[2]
            ?>
            <option value=<?php echo $scenario[3]?>><?php echo $sc?></option>
            <?php
        }

        ?>
    </select>
    <input type="submit" value="Afficher le scénario" name="affiche">
</form>

</body>
</html>

<?php
if(isset($_POST['patient'])) {
    $_SESSION['patient'] = $_POST['patient'];
}
?>
