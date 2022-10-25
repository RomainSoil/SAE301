<?php
session_start()
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
$bdd = ConnectionBDD::getInstance()::getpdo();

/* permet d'afficher les données du patient séléctionné*/
function affpatient($bdd, $id){
    $sql = $bdd->prepare("SELECT * from patient where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    echo sizeof($array);
    for ($i=0; $i<sizeof($array);$i++){
        echo $array[$i];
        echo " ";
    }
    ?><br><?php
}
/* permet d'afficher les données de la prescription du patient séléctionné*/
function affpresc($bdd, $id){
    $sql = $bdd->prepare("SELECT * from prescription where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    for ($i=0; $i<sizeof($array);$i++){
        echo $array[$i];
        echo " ";
    }
?><br><?php
}
/* permet d'afficher les données du diganostique du patient séléctionné*/
function affdiag($bdd, $id){
    $sql = $bdd->prepare("SELECT * from diagnotic where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    for ($i=0; $i<sizeof($array);$i++){
        echo $array[$i];
        echo " ";
    }
    ?><br><?php

function affsecu($bdd, $id){
    $sql = $bdd->prepare("SELECT * FROM miseensecurite where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    for($i=0; $i<sizeof($array); $i++){
        echo $array[$i];
        echo " ";
    }
    ?><br><?php
}

function affsoinsrel($bdd, $id){
   $sql = $bdd->prepare("SELECT * FROM soinsrelationnels where idpatient=?");
   $sql->execute(array($id));
   $array = $sql->fetch();
   for($i=0; $i<sizeof($array); $i++){
       echo $array[$i];
       echo " ";
   }
    ?><br><?php
}

    function affsecu($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM miseensecurite where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        for($i=0; $i<sizeof($array); $i++){
            echo $array[$i];
            echo " ";
        }
        ?><br><?php
    }

    function affelim($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM elimination where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        for($i=0; $i<sizeof($array); $i++){
            echo $array[$i];
            echo " ";
        }
        ?><br><?php
    }

    function affcardio($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM cardio where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        for($i=0; $i<sizeof($array); $i++){
            echo $array[$i];
            echo " ";
        }
        ?><br><?php
    }

    function affmobil($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM mobilite where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        for($i=0; $i<sizeof($array); $i++){
            echo $array[$i];
            echo " ";
        }
        ?><br><?php
    }

    function affhyg($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM hygiene where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        for($i=0; $i<sizeof($array); $i++){
            echo $array[$i];
            echo " ";
        }
        ?><br><?php
    }
    function affalim($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM alimentation where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        for($i=0; $i<sizeof($array); $i++){
            echo $array[$i];
            echo " ";
        }
        ?><br><?php
    }
    function affneuro($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM neuro where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        for($i=0; $i<sizeof($array); $i++){
            echo $array[$i];
            echo " ";
        }
        ?><br><?php
    }

    function affrespi($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM respi where idpatient=?");
        $sql->execute(array($id));
        $array = $sql->fetch();
        for($i=0; $i<sizeof($array); $i++){
            echo $array[$i];
            echo " ";
        }
        ?><br><?php
    }
}

@affdiag($bdd, $id);
@affpresc($bdd, $id);
@affpatient($bdd, $id);
@affsecu($bdd, $id);
@affsoinsrel($bdd, $id);
@affelim($bdd, $id);
@affcardio($bdd, $id);
@affmobil($bdd, $id);
@affhyg($bdd, $id);
@affalim($bdd, $id);
@affneuro($bdd, $id);
@affrespi($bdd, $id);
?>