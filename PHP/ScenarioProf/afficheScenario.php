<?php
session_start();
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
<?php
include("BarreScenario.html");
include ('../ConnectionBDD.php');

?>
<div class="Titre">
    <h1>Le Scénario</h1>
</div>
</body>
</html>

<?php
$id = $_SESSION['scenario'];
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

/* permet d'afficher les données du patient séléctionné*/
function affpatient($bdd, $id){
    $sql = $bdd->prepare("SELECT * from patient where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    echo sizeof($array);
    return $array;
    ?><br><?php
}
/* permet d'afficher les données de la prescription du patient séléctionné*/
function affpresc($bdd, $id){
    $sql = $bdd->prepare("SELECT * from prescription where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    return $array;
?><br><?php
}
/* permet d'afficher les données du diganostique du patient séléctionné*/
function affdiag($bdd, $id){
    $sql = $bdd->prepare("SELECT * from diagnostic where idpatient=?");
    $sql->execute(array($id));
    echo gettype($sql->fetch()[0]);
    $array = $sql->fetch();

    return $array;
    ?><br><?php
}

function affsecu($bdd, $id){
    $sql = $bdd->prepare("SELECT * FROM miseensecurite where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    return $array;
    ?><br><?php
}

function affsoinsrel($bdd, $id){
   $sql = $bdd->prepare("SELECT * FROM soinsrelationnels where idpatient=?");
   $sql->execute(array($id));
   $array = $sql->fetch();
    return $array;
    ?><br><?php
}


    function affelim($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM elimination where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        return $array;
        ?><br><?php
    }

    function affcardio($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM cardio where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        return $array;
        ?><br><?php
    }

    function affmobil($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM mobilite where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        return $array;
        ?><br><?php
    }

    function affhyg($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM hygiene where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        return $array;
        ?><br><?php
    }
    function affalim($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM alimentation where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        return $array;
        ?><br><?php
    }
    function affneuro($bdd, $id)
    {
        $sql = $bdd->prepare("SELECT * FROM neuro where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        return $array;
    }
        ?><br><?php

    function affrespi($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM respi where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        return $array;
        }
?><br><?php
function affichage($bdd, $id){
?>
<table>
    <thead>
    <tr>
        <th colspan="1">numero 1</th>
        <th colspan"1">numero 2</th>
        <th colspan"1">numero 3</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>The table body</td>
        <td>with two columns</td>
        <td> troisieme colonne</td>
    </tr>
    <tr>
        <td>une nouvelle ligne</td>
    </tr>
    </tbody>
</table>
<?php
}

affichage($bdd, $id);
?>