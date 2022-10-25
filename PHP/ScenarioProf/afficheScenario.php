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

function affpresc($bdd, $id){
    $sql = $bdd->prepare("SELECT * from prescription where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    echo sizeof($array);
    for ($i=0; $i<sizeof($array);$i++){
        echo $array[$i];
        echo " ";
    }
?><br><?php
}

function affdiag($bdd, $id){
    $sql = $bdd->prepare("SELECT * from diagnotic where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    echo sizeof($array);
    for ($i=0; $i<sizeof($array);$i++){
        echo $array[$i];
        echo " ";
    }
    ?><br><?php
}
@affdiag($bdd, $id);
@affpresc($bdd, $id);
@affpatient($bdd, $id);
?>