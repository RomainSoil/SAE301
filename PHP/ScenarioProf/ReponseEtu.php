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

function reponse($bdd){
    if (isset($_POST['Valider'])) {
        $sql = $bdd->prepare("INSERT INTO reponseetu (email, idpatient, texte) values (?,?,?)");
        $sql->execute(array($_SESSION['email'],$_SESSION['patient'],$_POST['textereponse']));
        header('Location: ScenarioEtu.php');



    }}

reponse($bdd);
?>
<button class="button-90" onclick="window.history.back()">Retour</button>

<h4>Réponse au Scénario : <?php echo $_SESSION['patient'], $_SESSION['email'] ?>  </h4>


<form method="post">
    <div class="Diagnostic">
    <textarea name="textereponse" id="textereponse" rows="20" cols="80" required> </textarea></div> <br>
    <input type="submit" name="Valider" value="Envoyer">
</form>

