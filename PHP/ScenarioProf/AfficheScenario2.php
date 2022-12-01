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
include('../ConnectionBDD.php');

?>
<h2>Le Scénario</h2>
</body>
</html>

<?php
$id = $_SESSION['scenario'];
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

/* permet d'afficher les données du patient séléctionné*/
/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affpatient($bdd, $id)
{
    $sql = $bdd->prepare("SELECT * from patient where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    return $array;
    ?><br><?php
}

function affichage($bdd, $id)
{
    ?>
    <table>
        <thead>
        <tr>
            <th colspan
            "1">Nom</th>
            <th colspan
            "1">Prénom</th>
            <th colspan
            "1">age</th>
            <th colspan
            "1">poids</th>
            <th colspan
            "1">date de naissance</th>
            <th colspan
            "1">taille</th>
            <th colspan
            "1">iep</th>
            <th colspan
            "1">ipp</th>
            <th colspan
            "1">sexe</th>
            <th colspan
            "1">adresse</th>
            <th colspan
            "1">ville</th>
            <th colspan
            "1">Code Postale</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo affpatient($bdd, $id)[1] ?></td>
            <td><?php echo affpatient($bdd, $id)[2] ?></td>
            <td> <?php echo affpatient($bdd, $id)[3] ?></td>
            <td> <?php echo affpatient($bdd, $id)[5] ?></td>
            <td> <?php echo affpatient($bdd, $id)[4] ?></td>
            <td> <?php echo affpatient($bdd, $id)[6] ?></td>
            <td> <?php echo affpatient($bdd, $id)[7] ?></td>
            <td> <?php echo affpatient($bdd, $id)[8] ?></td>
            <td> <?php echo affpatient($bdd, $id)[9] ?></td>
            <td> <?php echo affpatient($bdd, $id)[10] ?></td>
            <td> <?php echo affpatient($bdd, $id)[11] ?></td>
            <td> <?php echo affpatient($bdd, $id)[12] ?></td>

        </tr>

        </tbody>
    </table>
<?php }

require('../FonctionPhp.php');


$donnee = AvoirLesDonneeDunPatient($bdd);


$categorie = $donnee[0]['nom'];
$max = count($donnee);
$i = 0;
while ($i <= $max) {
    ?>
        <table>
            <thead>
    <td> <?php echo $categorie; ?> </td> <?php
    while ($categorie == $donnee[$i]['nom']) {
        ?>
        <tr>
            <td> <?php echo $donnee[$i]['donnee'] ?> </td>
            <td> <?php echo $donnee[$i]['date'] ?> </td>
        </tr>
        <?php
        $i = $i+ 1;
    }
    ?>
            </thead>
    </table>
<?php
    $categorie = $donnee[$i]['nom'];
}

?>





