<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> hello Word </title>
</head>

<body>

<?php
echo "Hello word ";
?>

<?php


$dsn= 'pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134';
$user= 'iutinfo134';
$passwd= 'NuVRPnlV';

try {
    $pdo = new PDO($dsn, $user, $passwd);
} catch (PDOException $e) {
    die ('Erreur : ' . $e->getMessage());
}

    if (isset($_POST["id"]) and isset($_POST["mdp"])) {

        $requete = $pdo->prepare("Insert into etudiant (email) VALUES (?)");
        $requete->execute(array($_POST['id']));


    }


$pdo= null;
?>

</body>
</html>
