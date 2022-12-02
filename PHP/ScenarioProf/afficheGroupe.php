<?php
session_start();
include ('../ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
echo $_SESSION['grp'];

function etugrp($bdd)
{
    $grpetu=$_SESSION['grp'];
    /* permet de créer une liste déroulante avec tous les etudiants des groupes */
    $EtuGroupe = $bdd->prepare("SELECT email FROM groupeetudiant where idgroupe=?");
    $EtuGroupe->execute(array($grpetu));
    $array = $EtuGroupe;
    return $array;
}
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
Groupe : <?php echo $_SESSION['grp']?>
<br>
Étudiants : <br>

<?php
$grp = etugrp($bdd)->fetchAll();
for($i=0; $i<sizeof($grp); $i++){
?>
    <td><?php echo $grp[$i][0]?></td>
<?php }?>



</body>
</html>

