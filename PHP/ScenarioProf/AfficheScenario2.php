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
require('../FonctionPhp.php');

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
<?php



$donnee = AvoirLesDonneeDunPatient($bdd);


$categorie = $donnee[0]['nom'];
$max = count($donnee);
$i = 0;
$var=0;

while ($i<$max){
    ?>
    <br>
    <?php
    if ($categorie==$donnee[$i]['nom'] || $var==0){
        $var=1;
        ?>
            <table>
        <tr>
                <th> <?php echo $donnee[$i]['nom']?> </th>
        </tr>
        <tr>
            <?php $nomType=$donnee[$i]['type'];
                $nbType=AvoirLeNombreDeColoneDunType($bdd,$categorie,$nomType);


        ?>
        </tr>
        <tr>
            <th> <?php echo $donnee[$i]['type']?> </th>

            <?php
            for ($j=$i; $j<$i+$nbType; $j++){

                ?>
                <td> <?php echo $donnee[$j]['date']?> </td>

                <?php
            }
            ?>
            </tr>
            <tr>
                <th> <?php echo 'donnée'?> </th>
                <?php
        for ($j=$i; $j<$i+$nbType; $j++){   ?>
                <td> <?php echo $donnee[$j]['donnee']?> </td>

                <?php

        }
        ?> </tr> <?php
        $i = $i+$nbType-1;
        if ($i>=$max)
            break;
    }

    else
    {
        ?>
        </table>
        <?php
    }




    ?>
        <?php
        if ($var==1){
            $i=$i+1;
            if ($i>=$max)
                break;
            $categorie=$donnee[$i]['nom'];


            ?>
            </table>
<?php
        }

}

}


affichage($bdd, $id);
?>





