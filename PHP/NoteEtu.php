<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NoteEtu </title>
    <link rel="stylesheet" href="PageProf.css" >
    <script src="LesFonctionsJS.js"></script>

</head>
<body>
<?php
include('ScenarioProf/BarreScenarioEtu.html');

include('ConnectionBDD.php');
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

require('ScenarioProf/FonctionScenario.php');
?>

<form method="post">
    <textarea name="notesEtu" rows="10" cols="40"></textarea>
    <br>
    <input type="submit" name="submitNotesEtu" value="Baptiste Da Costa">
</form>

<?php
if(isset($_POST['notesEtu'])){
    $bddNote= $bdd->prepare("INSERT INTO iutinfo134.public.noteEtu VALUES (?,?,?)");
    $bddNote->bindParam(1,$_SESSION['email']);
    $bddNote->bindParam(2,$_SESSION['patient']);
    $bddNote->bindParam(3,$_POST['notesEtu']);
    $bddNote->execute();
}

?>