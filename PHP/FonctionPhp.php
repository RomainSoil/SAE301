<?php
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

function PourConnaitreLeIdDeLaDonnee($bdd){
    $sql=$bdd->prepare("Select max(iddonnee) from donnee ");
    $sql->execute();
    $array = $sql->fetch();
    return $array[0];
}

function ajoutDeDonneeAvecLesBooleans($bdd,$categorie,$column){
    $varOui = "x";
    $varNon= " ";

    $sql=$bdd->prepare("Insert into donnee (date, nom, donnee,idpatient) VALUES (?,?,?,?)");
    $sql->bindParam(1,$_SESSION['Date']);
    $sql->bindParam(2, $column);
    if ($_POST[$column]=="oui")
        $sql->bindParam(3,$varOui );
    else {
        $sql->bindParam(3,$varNon );
    }
    $sql->bindParam(4,$_SESSION['patient']);
    $sql->execute();
    $id=PourConnaitreLeIdDeLaDonnee($bdd);
    $sql=$bdd->prepare("Insert into categoriedonnee (nom, iddonnee) VALUES (?,?)");
    $sql->bindParam(1,$categorie);
    $sql->bindParam(2,$id);
    $sql->execute();
}

function ajoutDeDonneeSansLesBooleans($bdd,$categorie,$column,$donnee){


    $sql=$bdd->prepare("Insert into donnee (date, nom, donnee,idpatient) VALUES (?,?,?,?)");
    $sql->bindParam(1,$_SESSION['Date']);
    $sql->bindParam(2, $column);
    $sql->bindParam(3,$donnee );
    $sql->bindParam(4,$_SESSION['patient']);
    $sql->execute();
    $id=PourConnaitreLeIdDeLaDonnee($bdd);
    $sql=$bdd->prepare("Insert into categoriedonnee (nom, iddonnee) VALUES (?,?)");
    $sql->bindParam(1,$categorie);
    $sql->bindParam(2,$id);
    $sql->execute();
}

function AvoirLesDonneeDunPatient ($bdd){
    $sql=$bdd->prepare("Select c.nom, donnee.nom as type, donnee.donnee, date from donnee join categoriedonnee c on donnee.iddonnee = c.iddonnee join patient p on donnee.idpatient = p.idpatient join categorie c2 on c.nom = c2.nom 
        where p.idpatient=? order by (c.nom,donnee.nom,date)");
    $sql->bindParam(1,$_SESSION['scenario']);
    $sql->execute();
    $array = $sql->fetchAll();
    return $array;


}

function AvoirLeNombreDunType ($bdd,$nomCategorie){
    $sql=$bdd->prepare("Select c.nom from donnee join categoriedonnee c on donnee.iddonnee = c.iddonnee join patient p on donnee.idpatient = p.idpatient join categorie c2 on c.nom = c2.nom 
        where p.idpatient=? and c.nom=? ");
    $sql->bindParam(1,$_SESSION['scenario']);
    $sql->bindParam(2,$nomCategorie);
    $sql->execute();
    $array = $sql->fetchAll();
    return count($array);


}

function AvoirLeNombreDeColoneDunType ($bdd,$nomCategorie,$nomtype){
    $sql=$bdd->prepare("Select donnee.nom from donnee join categoriedonnee c on donnee.iddonnee = c.iddonnee join patient p on donnee.idpatient = p.idpatient join categorie c2 on c.nom = c2.nom 
        where p.idpatient=? and c.nom=? and donnee.nom=?");
    $sql->bindParam(1,$_SESSION['scenario']);
    $sql->bindParam(2,$nomCategorie);
    $sql->bindParam(3,$nomtype);
    $sql->execute();
    $array = $sql->fetchAll();
    return count($array);


}

function affDiag($bdd, $id)
{
    $sql = $bdd->prepare("SELECT * FROM diagnostic where idpatient=? order by date");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}

function PourAvoirToutesLesDatesDeLaDiag($bdd, $id){
    $sql = $bdd->prepare("SELECT date FROM diagnostic where idpatient=? order by date");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}
function PourAvoirToutesLesDatesDeLaPresc($bdd, $id){
    $sql = $bdd->prepare("SELECT prise FROM prescription where idpatient=? order by prise");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}
function affpresc($bdd, $id)
{
    $sql = $bdd->prepare("SELECT * from prescription where idpatient=? order by prise");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;

}
