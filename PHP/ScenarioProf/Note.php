<?php
session_start();

$leScenario=$_POST['patient'];
$_SESSION['patient']=$_POST['patient'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Note</title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("BarreScenario.html");

include ('../ConnectionBDD.php');
require('FonctionScenario.php');

$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

/*on récupère les nom,prenom et email des étudiants afin de les afficher dans une liste déroulante*/
$etudiants = $bdd->prepare("select nom,prenom,E.email from GroupeEtudiant join GroupeScenario using(idGroupe) join Etudiant E on GroupeEtudiant.email = E.email where idPatient = ?");
$etudiants->bindParam(1,$leScenario);
$etudiants->execute();
$res=$etudiants->fetchAll();
?>
<br>
<button class="button-90" onclick="window.history.back()">Retour</button>
<br>
<br>
<table>
  <thead>
    <tr>
        <th><div class="title">Étudiant </div></th>

        <?php
        {
          echo "<th>NOTE</th>";
        }
      ?>
</tr>
</thead>
<tbody>
<?php
foreach ($res as $etu){
    $note=AvoirLaNoteDunEtu($bdd,$etu[2]);

    ?>
        <tr>
    <th> <?php echo $etu[0]," ",$etu[1]?></th>
    <td> <?php echo $note?></td>

    </tr>
<?php

}
?>
</tbody>
</table>

<div class="footer-CreateScenario">
    <br>
    <form action="../BesoinAide.php" method="post">
        <button class="button-28" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>






