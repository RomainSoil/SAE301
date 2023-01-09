<?php
// les pages transitions sont des pages qui permettent l'ajout dans la base de donnée des pages précédente et elles permettent de passer à la page d'apres

session_start();
@$_SESSION['Date']=date("Y-m-d H:m:s", strtotime($_POST["date"]));
require ("../ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
require ("../FonctionPhp.php");
@ajoutDeDonneeSansLesBooleans($bdd,"Respi",'SaO2',$_POST['Sa02']);
@ajoutDeDonneeSansLesBooleans($bdd,"Respi",'FR',$_POST['FR']);
@ajoutDeDonneeSansLesBooleans($bdd,"Respi",'O2',$_POST['O2']);
header('Location:afficheScenario.php');

?>
