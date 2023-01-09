<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ReponseEtudiant </title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include('BarreScenarioEtu.html');

include('../ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

/**
 * @param $bdd
 * @return void
 */
function reponse($bdd){
        if (isset($_POST['Valider'])) {
            $sql = $bdd->prepare("INSERT INTO reponseetu (email, idpatient, texte) values (?,?,?)");
            $sql->execute(array($_SESSION['email'],$_SESSION['patient'],$_POST['textereponse']));
            header('Location: ScenarioEtu.php');



    }}

    $nomscena = $bdd->prepare("SELECT nom,prenom,age FROM patient where idpatient=?");
    $nomscena->bindParam(1, $_SESSION['patient']);
    $nomscena->execute();
    $res = $nomscena->fetch();




reponse($bdd);
?>
<br>
<form action="ScenarioEtu.php" method="post">
    <button class="button-90" role="button" >Retour</button>
</form>
<h4>Réponse au Scénario : <?php echo $res[0]," ",$res[1]," ",$res[2]," ans" ?>  </h4>


<form method="post">
    <div class="Diagnostic">
    <textarea name="textereponse" id="textereponse" rows="20" cols="80" required> </textarea></div> <br>
    <input type="submit" name="Valider" value="Envoyer">
</form>

