<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> hello Word </title>
</head>

<body>

<?php
echo "Hello word ";
echo "baptiste c'est un bg";
?>

<?php

try {
    $pdo= new PDO(
        'pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo70','iutinfo70','mh8cvgzj');
} catch (PDOException $e) {
    die ('Erreur : ' . $e->getMessage());
}


?>

<!-- Pour Inserer valeurs -->
<?php

$sql= "INSERT INTO patient (nom, prenom, age, ddn, poids, taille, iep, ipp, sexe, adresse, codepostal)
      VALUES('X', 'Y', '18', '2020-09-10', 70, 180, 1, 1, 'Male', '1 rue de monsieur X', 59000)";

try {
    $affected= $pdo->exec($sql);
} catch (PDOException $e) {
    die ($e->getMessage());
}
?>

<?php

$req= "SELECT * FROM patient";

try{
    foreach ($pdo->query($req) as $row){
        echo $row['nom'] . "\n";
    }
} catch (PDOException $e) {
    die ($e->getMessage());
}
?>



</body>
</html>
