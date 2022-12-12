<?php
session_start();
require ("../ConnectionBDD.php");
require("../FonctionPhp.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
$_SESSION['Date']=date("Y-m-d H:m:s", strtotime($_POST["date"]));

@ajoutDeDonneeSansLesBooleans($bdd,$_POST['categorie'],$_POST['type'],$_POST['donnee']);
header('Location:CreateScenario.php');
