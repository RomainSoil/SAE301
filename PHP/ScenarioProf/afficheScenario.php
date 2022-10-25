<?php
session_start();
$_SESSION['patient']=$_POST['patient'];
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
?>
<?php

/*   $sql="Select idpatient From patient WHERE  ";*/

function radio($sql){
    $sql2="Select * from radio WHERE idpatient = $sql";
    }
function diagnotic($sql){
    $sql2="Select * from diagnotic WHERE idpatient = $sql";
}
function miseensecurite($sql){
    $sql2="Select * from miseensecurite WHERE idpatient = $sql";
}
function soinsrelationnels($sql){
    $sql2="Select * from soinsrelationnels WHERE idpatient = $sql";
}
function elimination($sql){
    $sql2="Select * from elimination WHERE idpatient = $sql";
}
function cardio($sql){
    $sql2="Select * from cardio WHERE idpatient = $sql";
}
function mobilite($sql){
    $sql2="Select * from mobilite WHERE idpatient = $sql";
}
function hygiene($sql){
    $sql2="Select * from hygiene WHERE idpatient = $sql";
}
function alimentation($sql){
    $sql2="Select * from alimentation WHERE idpatient = $sql";
}
function neuro($sql){
    $sql2="Select * from neuro WHERE idpatient = $sql";
}
function respi($sql){
    return $sql2="Select * from respi WHERE idpatient = $sql";
}


?>

<?php
echo miseensecurite(6)[1]
?>
<div class="Titre">
    <h1>Le Scénario</h1>
</div>
</body>
</html>

