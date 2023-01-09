<?php

// Obtient une instance de la connexion à la base de données
$pdo = ConnectionBDD::getInstance();

// Obtient l'objet PDO utilisé pour interagir avec la base de données
$bdd = $pdo::getpdo();

/**
 * Retourne l'ID de la dernière ligne insérée dans la table 'donnee'
 * @param PDO $bdd L'objet PDO utilisé pour interagir avec la base de données
 * @return mixed L'ID de la dernière ligne insérée
 */
function PourConnaitreLeIdDeLaDonnee($bdd){
    // Prépare une instruction SELECT pour obtenir la valeur maximale de la colonne 'iddonnee' dans la table 'donnee'
    $sql=$bdd->prepare("Select max(iddonnee) from donnee ");
    $sql->execute();
    // Récupère le résultat sous forme de tableau
    $array = $sql->fetch();
    return $array[0];
}

/**
 * @param PDO $bdd L'objet PDO utilisé pour interagir avec la base de données
 * @param string $categorie Le nom de la catégorie à insérer
 * @param string $column Le nom de la colonne à insérer
 * @return void
 */
function ajoutDeDonneeAvecLesBooleans($bdd, $categorie, $column){
    // Définit des variables pour représenter des valeurs booléennes
    $varOui = "x";
    $varNon= " ";

    // Prépare une instruction INSERT pour insérer une ligne dans la table 'donnee'
    $sql=$bdd->prepare("Insert into donnee (date, nom, donnee,idpatient) VALUES (?,?,?,?)");

    // Lie les valeurs aux paramètres de l'instruction INSERT
    $sql->bindParam(1,$_SESSION['Date']);
    $sql->bindParam(2, $column);
    if ($_POST[$column]=="oui") {
        $sql->bindParam(3,$varOui );
    } else {
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

/**
 * @param $bdd
 * @param $categorie
 * @param $column
 * @param $donnee
 * @return void
 */
function ajoutDeDonneeSansLesBooleans($bdd, $categorie, $column, $donnee){


    $sql=$bdd->prepare("Insert into donnee (date, nom, donnee,idpatient) VALUES (?,?,?,?)");
    $sql->bindParam(1,$_SESSION['Date']);
    $sql->bindParam(2, $column);
    $sql->bindParam(3,$donnee);
    $sql->bindParam(4,$_SESSION['patient']);
    $sql->execute();
    $id=PourConnaitreLeIdDeLaDonnee($bdd);
    $sql=$bdd->prepare("Insert into categoriedonnee (nom, iddonnee) VALUES (?,?)");
    $sql->bindParam(1,$categorie);
    $sql->bindParam(2,$id);
    $sql->execute();
}

/**
 * @param $bdd
 * @return mixed
 */
function AvoirLesDonneeDunPatient ($bdd){
    $sql=$bdd->prepare("Select c.nom, donnee.nom as type, donnee.donnee, date from donnee join categoriedonnee c on donnee.iddonnee = c.iddonnee join patient p on donnee.idpatient = p.idpatient join categorie c2 on c.nom = c2.nom 
        where p.idpatient=? order by (c.nom,donnee.nom,date)");
    $sql->bindParam(1,$_SESSION['scenario']);
    $sql->execute();
    $array = $sql->fetchAll();
    return $array;


}

/**
 * @param $bdd
 * @param $nomCategorie
 * @return int
 */
function AvoirLeNombreDunType ($bdd, $nomCategorie){
    $sql=$bdd->prepare("Select c.nom from donnee join categoriedonnee c on donnee.iddonnee = c.iddonnee join patient p on donnee.idpatient = p.idpatient join categorie c2 on c.nom = c2.nom 
        where p.idpatient=? and c.nom=? ");
    $sql->bindParam(1,$_SESSION['scenario']);
    $sql->bindParam(2,$nomCategorie);
    $sql->execute();
    $array = $sql->fetchAll();
    return count($array);


}

/**
 * @param $bdd
 * @param $nomCategorie
 * @param $nomtype
 * @return int
 */
function AvoirLeNombreDeColoneDunType ($bdd, $nomCategorie, $nomtype){
    $sql=$bdd->prepare("Select donnee.nom from donnee join categoriedonnee c on donnee.iddonnee = c.iddonnee join patient p on donnee.idpatient = p.idpatient join categorie c2 on c.nom = c2.nom 
        where p.idpatient=? and c.nom=? and donnee.nom=?");
    $sql->bindParam(1,$_SESSION['scenario']);
    $sql->bindParam(2,$nomCategorie);
    $sql->bindParam(3,$nomtype);
    $sql->execute();
    $array = $sql->fetchAll();
    return count($array);


}

/**
 * @param $bdd
 * @param $id
 * @return mixed
 * Cette fonction permet l'affichage des données de la table diagnostic, ce qui va nous permettre de les afficher dans un tableau
 */
function affDiag($bdd, $id)
{
    $sql = $bdd->prepare("SELECT * FROM diagnostic where idpatient=? order by date");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}

/**
 * @param $bdd
 * @param $id
 * @return mixed
 * Cette fonction permet de récupérer les dates des diagnostics afin de les afficher dans le tableau
 */
function PourAvoirToutesLesDatesDeLaDiag($bdd, $id){
    $sql = $bdd->prepare("SELECT date FROM diagnostic where idpatient=? order by date");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}

/**
 * @param $bdd
 * @param $id
 * @return mixed
 *  * Cette fonction permet de récupérer les dates des prescriptions afin de les afficher dans le tableau

 */
function PourAvoirToutesLesDatesDeLaPresc($bdd, $id){
    $sql = $bdd->prepare("SELECT prise FROM prescription where idpatient=? order by prise");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}

/**
 * @param $bdd
 * @param $id
 * @return mixed
 *  * Cette fonction permet l'affichage des données de la table prescription, ce qui va nous permettre de les afficher dans un tableau

 */
function affpresc($bdd, $id)
{
    $sql = $bdd->prepare("SELECT * from prescription where idpatient=? order by prise");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;

}
