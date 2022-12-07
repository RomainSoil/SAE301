<?php
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

function effacer($bdd){
    if (isset($_POST['OuiSupp'])) {
        $patient = $bdd->prepare("Delete FROM patient where idpatient=?");
        $patient->bindParam(1,$_SESSION['patient']);
        $patient->execute();
        header('Location:CreateScenario.php ');

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

function nomgrp($bdd)
{
    $nomgrp = $bdd->prepare("SELECT nom FROM groupeclasse where idgroupe=?");
    $nomgrp->bindParam(1, $_SESSION['grp']);
    $nomgrp->execute();
    $res = $nomgrp->fetch();
    return $res[0];
}
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