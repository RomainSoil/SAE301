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
    $array = $EtuGroupe->fetch();
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

<td><?php echo etugrp($bdd)[0]?></td>
<td><?php echo etugrp($bdd)[1]?></td>



</body>
</html>

