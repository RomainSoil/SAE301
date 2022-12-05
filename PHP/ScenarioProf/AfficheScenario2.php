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
require('../FonctionPhp.php');

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
            <?php $patient = array("Nom", "Prénom", "Age", "Date de naissance", "Poids", "Taille", "IEP", "IPP", "Sexe", "Adresse", "Ville", "Code Postale");
            for ($i=0; $i<sizeof($patient); $i++){?>
                <th><?php echo $patient[$i]?></th>
            <?php }?>

        </tr>
        </thead>
        <tbody>
        <tr>
            <?php for ( $i=0; $i<12; $i++){?>
                <td onclick="change(<?php echo $i ?>)"><?php echo affpatient($bdd, $id)[$i+1] ?></td>
            <?php }

            ?>

        </tr>

        </tbody>
    </table>
<?php }

require('../FonctionPhp.php');


    $donnee = AvoirLesDonneeDunPatient($bdd, $id);


    $categorie = $donnee[0]['nom'];
    $max = count($donnee);
    $i = 0;
    while ($i <= $max) {
        ?>
        <table>
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
            $i = $i+ 1;
            ?>
        </table>
        <?php
        $categorie = $donnee[$i]['nom'];
}

affichage($bdd, $id);
?>





