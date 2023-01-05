<?php
session_start();

$leScenario=$_POST['patient'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Note</title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include("BarreScenario.html");

include ('../ConnectionBDD.php');
require('FonctionScenario.php');

$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

$etudiants = $bdd->prepare("select nom,prenom from GroupeEtudiant join GroupeScenario using(idGroupe) join Etudiant E on GroupeEtudiant.email = E.email where idPatient = ?");
$etudiants->bindParam(1,$leScenario);
$etudiants->execute();
$res=$etudiants->fetchAll();
?>

<table>
  <thead>
    <tr>
      <th>Étudiant</th>
      <?php
        {
          echo "<th>Examen 1</th>";
        }
      ?>
</tr>
</thead>
<tbody>
<?php
for ($i = 0; $i < count($res); $i++) {
    echo "<tr>";
    echo "<td>$res[$i]</td>";
    for ($j = 0; $j < $exam_count; $j++) {
        echo "<t[$i][$1]</td>";
    }
    echo "</tr>";
}
?>
</tbody>
</table>




?>
<br>
<?php
function LesSujets($bdd){
    $sql = $bdd->prepare("SELECT distinct sujet FROM note");
    $sql->execute();
    $array = $sql->fetchAll();
    return $array;
}

function LesEtu($bdd){
    $sql = $bdd->prepare("SELECT distinct email FROM note");
    $sql->execute();
    $array = $sql->fetchAll();
    return $array;
}

function LesNotes($bdd){
    $sql = $bdd->prepare("SELECT distinct note FROM note");
    $sql->execute();
    $array = $sql->fetchAll();
    return $array;
}


?>

<h4>Note</h4>
<table>
    <br><br>
    <thead>


    <tr>

    <?php
    // Déclarez les tableaux de sujets, de noms d'élèves et de notes
    $subjects = LesSujets($bdd);
    $students = LesEtu($bdd);
    $notes = LesNotes($bdd);
    $grades = array();


    // Remplissez la matrice de notes en utilisant une boucle
    for ($i = 0; $i < count($subjects); $i++) {
        for ($j = 0; $j < count($students); $j++) {
            $grades[$i][$j] = rand(0, 100); // remplacez cette ligne par votre propre code pour obtenir les notes
        }
    }

    // Affichez la matrice sous forme de tableau HTML
    echo "<table>";

    // Affichez la première ligne de la matrice avec les sujets
    echo "<tr>";
    echo "<th>Email/Sujets</th>";
    for ($i = 0; $i < count($subjects); $i++) {
        echo "<th>" . $subjects[$i][0] . "</th>";
    }
    echo "</tr>";

    // Affichez le reste de la matrice en utilisant une boucle
    foreach ($students as $student) {
        echo "<tr>";
        echo "<td>" . $student[0] . "</td>";} // affichez le nom de l'élève dans la première colonne
        for ($j = 0; $j < count($notes); $j++) {
            echo "<td>" . $notes[$j][0] . "</td>"; // affichez la note dans les autres colonnes
        }
        echo "</tr>";


    echo "</table>";
    ?>

</body>
</html>