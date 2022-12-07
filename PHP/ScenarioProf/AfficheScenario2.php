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
<a href="CreateScenario.php">
    <button>Retour</button>
</a>
<br><br>
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
    <table>
        <br><br>
        <thead>


        <tr>
            <th> Date </th>

            <?php
            $laListeDesDates=PourAvoirToutesLesDatesDeLaPresc($bdd,$id);

            for ($i=0; $i<count( $laListeDesDates); $i++){
                ?>
                <th> <?php echo  $laListeDesDates[$i][0]?></th>
                <?php
            }
            ?>
        </tr>
        <th><div class="title">Prescription </div></th>

        <tr>
            <th> Medicament </th>
            <?php
            @$Presc=affpresc($bdd, $id);
            for ($i=0; $i<count($laListeDesDates); $i++){
                ?>
                <td onclick="change(<?php echo $i+12?>)"> <?php echo $Presc[$i][3]?> </td>
                <?php
            }
            ?>


        </tr>
        <tr>
            <th> Médecin </th>
            <?php
            @$Presc=affpresc($bdd, $id);
            for ($i=0; $i<count($laListeDesDates); $i++){
                ?>
                <td onclick="change(<?php echo $i+12+sizeof(PourAvoirToutesLesDatesDeLaPresc($bdd, $id)) ?>)"> <?php echo $Presc[$i][5]?> </td>
                <?php
            }
            ?>
        </tr>
        <tr>
            <th> Dose </th>
            <?php
            @$Presc=affpresc($bdd, $id);
            for ($i=0; $i<count($laListeDesDates); $i++){
                ?>
                <td onclick="change(<?php echo $i+12+(2*sizeof(PourAvoirToutesLesDatesDeLaPresc($bdd, $id))) ?>)"> <?php echo $Presc[$i][2]?> </td>
                <?php
            }
            ?>


        </tr>
        </thead>
    </table>





    <br>
    <table>
        <br><br>
        <thead>


        <tr>
            <th> Date </th>

            <?php
            $laListeDesDates=PourAvoirToutesLesDatesDeLaDiag($bdd,$id);

            for ($i=0; $i<count( $laListeDesDates); $i++){
                ?>
                <th> <?php echo  $laListeDesDates[$i][0]?></th>
                <?php
            }
            ?>
        </tr>
        <th><div class="title">Intervenant </div></th>

        <tr>
            <th> Nom </th>
            <?php
            @$Diag=affDiag($bdd, $id);
            for ($i=0; $i<count($laListeDesDates); $i++){
                ?>
                <td onclick="change(<?php echo $i+12+(3*sizeof(PourAvoirToutesLesDatesDeLaPresc($bdd, $id))) ?>)"> <?php echo $Diag[$i][2]?> </td>
                <?php
            }
            ?>


        </tr>
        <tr>
            <th> Prenom </th>
            <?php
            @$Diag=affDiag($bdd, $id);
            for ($i=0; $i<count($laListeDesDates); $i++){
                ?>
                <td> <?php echo $Diag[$i][3]?> </td>
                <?php
            }
            ?>
        </tr>
        <th><div class="title">Diagnostic </div></th>

        <tr>
            <th> Compte Rendu </th>
            <?php
            @$Diag=affDiag($bdd, $id);
            for ($i=0; $i<count($laListeDesDates); $i++){
                ?>
                <td> <?php echo $Diag[$i][4]?> </td>
                <?php
            }
            ?>


        </tr>
        </thead>
    </table>

    <?php



    $donnee = AvoirLesDonneeDunPatient($bdd);


    @$categorie = $donnee[0]['nom'];
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
            <th><div class="title"><?php echo $donnee[$i]['nom']?> </div></th>


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



}}


affichage($bdd, $id);
?>
<br><br>





