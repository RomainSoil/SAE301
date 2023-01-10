<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Scenario</title>
    <link rel="stylesheet" href="../PageProf.css">
    <script src="../LesFonctionsJS.js"></script>

</head>



<body>
<?php
include("BarreScenario.html");
include ('../ConnectionBDD.php');

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
function affpatient($bdd, $id){
    $sql = $bdd->prepare("SELECT * from patient where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    return $array;
    ?><br><?php
}
/* permet d'afficher les données de la prescription du patient séléctionné*/
/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affpresc($bdd, $id){
    $sql = $bdd->prepare("SELECT * from prescription where idpatient=? order by prise");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
?><br><?php
}

/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affsecu($bdd, $id){
    $sql = $bdd->prepare("SELECT * FROM miseensecurite where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    return $array;
    ?><br><?php
}

/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affsoinsrel($bdd, $id){
   $sql = $bdd->prepare("SELECT * FROM soinsrelationnels where idpatient=? order by date");
   $sql->execute(array($id));
   $array = $sql->fetchAll();
    return $array;
    ?><br><?php
}


/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affsoins($bdd, $id){
    $sql = $bdd->prepare("SELECT * FROM soins where idpatient=? order by date");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
    ?><br><?php
}


/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affelim($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM elimination where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
        ?><br><?php
    }

/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affcardio($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM cardio where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
        ?><br><?php
    }

/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affmobil($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM mobilite where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
        ?><br><?php
    }

/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affhyg($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM hygiene where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
        ?><br><?php
    }

/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affalim($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM alimentation where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
        ?><br><?php
    }

/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affneuro($bdd, $id)
    {
        $sql = $bdd->prepare("SELECT * FROM neuro where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
    }
        ?><br><?php

/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function PourAvoirToutesLesDatesDeLaMatrice($bdd, $id){
    $sql = $bdd->prepare("SELECT date FROM miseensecurite where idpatient=? order by date");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}

/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function PourAvoirToutesLesDatesDeLaPresc($bdd, $id){
    $sql = $bdd->prepare("SELECT prise FROM prescription where idpatient=? order by prise");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}

/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function PourAvoirToutesLesDatesDeLaDiag($bdd, $id){
    $sql = $bdd->prepare("SELECT date FROM diagnostic where idpatient=? order by date");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}

/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affDiag($bdd, $id)
{
    $sql = $bdd->prepare("SELECT * FROM diagnostic where idpatient=? order by date");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}
?><br><?php
/**
 * @param $bdd
 * @param $id
 * @return mixed
 */
function affrespi($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM respi where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
        }


?><br><?php
/**
 * @param $bdd
 * @param $id
 * @return void
 */
function affichage($bdd, $id){
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
    </thead>

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

<br><br>
    <table>
        <tbody>
        <thead>

        <tr>
            <th> Date </th>
    <?php
    $laListeDeToutesLesDates=PourAvoirToutesLesDatesDeLaMatrice($bdd,$id);

    for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                ?>
                <th> <?php echo $laListeDeToutesLesDates[$i][0]?></th>
                <?php
            }
            ?>
        </tr>
        <th><div class="title">Mise en sécurité </div></th>

        <tr>
            <th> Barrière de lit prescrite </th>
            <?php
            @$MiseEnSecu=affsecu($bdd, $id);
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$MiseEnSecu[$i][1] == 0) {?>
                <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                <?php
            }
            }
            ?>


        </tr>

        <tr>

            <th> Barrière de lit de confort </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$MiseEnSecu[$i][2] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }
            ?>


        </tr>

        <tr>

            <th> Surveillance contention </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$MiseEnSecu[$i][3] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }
            ?>


        </tr>
        <th><div class="title">Soins Relationnels </div></th>

        <tr>

            <th> Accueil information </th>
            <?php
            @$MiseEnSoinsRelationnel=affsoinsrel($bdd, $id);
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$MiseEnSoinsRelationnel[$i][1] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }
            ?>


        </tr>
        <tr>

            <th> Entretien Infirmier </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$MiseEnSoinsRelationnel[$i][2] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }
            ?>


        </tr>

        <tr>
            <th> Toucher/massage </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$MiseEnSoinsRelationnel[$i][3] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }
            ?>

        </tr>
        <th><div class="title">Elimination </div></th>

        <tr>

            <th> Selle </th>
            <?php
            @$Elimination=affelim($bdd, $id);
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Elimination[$i][1] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }
            ?>


        </tr>
        <tr>

            <th> Gaz </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Elimination[$i][2] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }
            ?>


        </tr>
        <tr>

            <th> Urine </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Elimination[$i][3] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }
            ?>


        </tr>
        <th><div class="title">Cardio </div></th>

        <tr>

            <th> Ta </th>
            <?php
            @$Cardio=affcardio($bdd, $id);
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                ?>
                <td> <?php echo $Cardio[$i][1]?> </td>
                <?php
            }
            ?>
        </tr>
        <tr>

            <th> Pls </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                ?>
                <td> <?php echo $Cardio[$i][2]?> </td>
                <?php
            }
            ?>
        </tr>
        <tr>

            <th> ECG </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                ?>
                <td> <?php echo $Cardio[$i][3]?> </td>
                <?php
            }
            ?>
        </tr>
        <th><div class="title">Mobilité </div></th>

        <tr>

            <th> Aide à la marche </th>
            <?php
            @$Mobilite=affmobil($bdd, $id);
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Mobilite[$i][1] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Aide au lever </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Mobilite[$i][2] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Aide au coucher </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Mobilite[$i][3] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Aide au fauteuil </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Mobilite[$i][4] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <th><div class="title">Hygiène </div></th>

        <tr>

            <th> Toilette </th>
            <?php
            @$Hygiene=affhyg($bdd, $id);
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Hygiene[$i][1] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Douche </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Hygiene[$i][2] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Bain </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Hygiene[$i][3] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Refection lit </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Hygiene[$i][4] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Change </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Hygiene[$i][5] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Soin de bouche </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Hygiene[$i][6] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Prévention d'escare </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Hygiene[$i][7] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Changement de position </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Hygiene[$i][8] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Matelas a l'air </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Hygiene[$i][9] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <th><div class="title">Alimentation </div></th>

        <tr>

            <th> A jeun </th>
            <?php
            @$Alimentation=affhyg($bdd, $id);
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Alimentation[$i][1] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Surveillance hydratation </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Alimentation[$i][2] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Surveillance alimentaire </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Alimentation[$i][3] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Régime </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Alimentation[$i][4] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <tr>

            <th> Aide au repas </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Alimentation[$i][5] == 0) {?>
                    <td> </td>
                <?php }
                else { ?>
                    <td> <?php echo "X" ?> </td>

                    <?php
                }
            }?>
        </tr>
        <th><div class="title">Soins </div></th>

        <tr>

            <th> Surveillance perfusion </th>
            <?php
            @$Soins=affsoins($bdd, $id);
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Soins[$i][1]!=null) {?>
                    <td> <?php echo @$Soins[$i][1]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>
        <tr>

            <th> Pansement </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Soins[$i][2]!=null) {?>
                    <td> <?php echo @$Soins[$i][2]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>
        <tr>

            <th> Surveillance Glycémique (en g/l)  </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Soins[$i][3]!=null) {?>
                    <td> <?php echo @$Soins[$i][3]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>
        <tr>

            <th> Bas de contention </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Soins[$i][4]!=null) {?>
                    <td> <?php echo @$Soins[$i][4]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>
        <tr>

            <th>Cathéter veineux périphérique </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Soins[$i][5]!=null) {?>
                    <td> <?php echo @$Soins[$i][5]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>
        <tr>

            <th>Sondage urinaire </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Soins[$i][6]!=null) {?>
                    <td> <?php echo @$Soins[$i][6]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>
        <tr>

            <th> Autre </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Soins[$i][7]!=null) {?>
                    <td> <?php echo @$Soins[$i][7]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>
        <th><div class="title">Neuro </div></th>

        <tr>

            <th> Temperature </th>
            <?php
            @$Neuro=affneuro($bdd, $id);
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Neuro[$i][1]!=null) {?>
                    <td> <?php echo @$Neuro[$i][1]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>
        <tr>

            <th> Glasgow </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Neuro[$i][2]!=null) {?>
                    <td> <?php echo @$Neuro[$i][2]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>
        <tr>

            <th> EVA </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Neuro[$i][3]!=null) {?>
                    <td> <?php echo @$Neuro[$i][3]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>
        <tr>

            <th> AlgoPlus </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Neuro[$i][4]!=null) {?>
                    <td> <?php echo @$Neuro[$i][4]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>
        <th><div class="title">Respi </div></th>


        <tr>

            <th> SaO2 </th>
            <?php
            @$Respi=affrespi($bdd, $id);
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Respi[$i][1]!=null) {?>
                    <td> <?php echo @$Respi[$i][1]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        <tr>

            <th> FR </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Respi[$i][2]!=null) {?>
                <td> <?php echo @$Respi[$i][2]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                <?php
                    }
            }
            ?>
        </tr>
        <tr>

            <th> O2 </th>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                if (@$Respi[$i][3]!=null) {?>
                    <td> <?php echo @$Respi[$i][3]?> </td>
                <?php } else {
                    ?>
                    <td>  </td>
                    <?php
                }
            }
            ?>
        </tr>


    </thead>
    </tbody>
</table>
    <?php
}

/**
 * @param $bdd
 * @param $id
 * @return void
 */
function modifdonnees($bdd, $id)
{
    $datespres = PourAvoirToutesLesDatesDeLaPresc($bdd,$id);
    $datesdiag = PourAvoirToutesLesDatesDeLaDiag($bdd, $id);
    $data = $_SESSION['coo'];
    if ($data != "") {
        $nom = $bdd->prepare("update patient set nom = :donnees where idpatient=:idp");
        $prenom = $bdd->prepare("update patient set prenom = :donnees where idpatient=:idp");
        $age = $bdd->prepare("update patient set age = :donnees where idpatient=:idp");
        $ddn = $bdd->prepare("update patient set ddn = :donnees where idpatient=:idp");
        $poids = $bdd->prepare("update patient set poids = :donnees where idpatient=:idp");
        $taille = $bdd->prepare("update patient set taille = :donnees where idpatient=:idp");
        $iep = $bdd->prepare("update patient set iep = :donnees where idpatient=:idp");
        $ipp = $bdd->prepare("update patient set ipp = :donnees where idpatient=:idp");
        $sexe = $bdd->prepare("update patient set sexe = :donnees where idpatient=:idp");
        $adresse = $bdd->prepare("update patient set adresse = :donnees where idpatient=:idp");
        $ville = $bdd->prepare("update patient set ville = :donnees where idpatient=:idp");
        $cp = $bdd->prepare("update patient set codepostal = :donnees where idpatient=:idp");
        $medic = $bdd->prepare("update prescription set medicament = :donnees where idpatient=:idp and prise = :prise");
        $medecin = $bdd->prepare("update prescription set medecin = :donnees where idpatient=:idp and prise = :prise");
        $nomme = $bdd->prepare("update diagnostic set nom = :donnees where idpatient=:idp and date = :prise");
        $prenomme = $bdd->prepare("update diagnostic set prenom = :donnees where idpatient=:idp and date = :prise");
        $cpt = $bdd->prepare("update diagnostic set compterendu = :donnees where idpatient=:idp and date = :prise");
        $dose = $bdd->prepare("update prescription set dose=:donnees where idpatient=:idp and prise=:prise");
        $presc = array($medic, $medecin, $dose);
        $diag = array($nomme, $prenomme, $cpt);
        $sql = array($nom, $prenom, $age, $ddn, $poids, $taille, $iep, $ipp, $sexe, $adresse, $ville, $cp);
        $mots = [$mot, $num] = explode('!', $data);
        if ($mots[2] < 12) {
            $actio = $sql[$mots[2]];
            $actio->bindParam(':donnees', $mots[1]);
            $actio->bindParam(':idp', $id);
            $actio->execute();
            $_SESSION['coo'] = "";
        } elseif ($mots[2] < 12+sizeof($datespres)) {
            echo '1';
            $action = $presc[0];
            $date = $datespres[$mots[2] - 12];
        } elseif ($mots[2] < 12 + 2 * sizeof($datespres)) {
            echo '2';
            $action = $presc[1];
            $date = $datespres[$mots[2] - 12 - sizeof($datespres)];
        } elseif ($mots[2] < 12 + 3 * sizeof($datespres)) {
            echo '3';
            $action = $presc[2];
            $date = $datespres[$mots[2] - 12 - 2 * sizeof($datespres)];
        }
        elseif ($mots[2]<12+3 * sizeof($datespres)+sizeof($datesdiag)){
            echo '4';
            $action = $diag[0];
            $date = $datesdiag[$mots[2] - 12 - 3*sizeof($datespres)];
        }
        elseif ($mots[2]<12+(3 * sizeof($datespres))+(2*sizeof($datesdiag))){
            echo '5';
            $action = $diag[1];
            $date = $datesdiag[$mots[2] - 12 - 3*sizeof($datespres)-sizeof($datesdiag)];
        }
        elseif ($mots[2]<12+(3 * sizeof($datespres))+(3*sizeof($datesdiag))){
            echo '6';
            $action = $diag[2];
            $date = $datesdiag[$mots[2] - 12 - 3*sizeof($datespres)-(2*sizeof($datesdiag))];
        }
        if (isset($action)) {
            $action->bindParam(':donnees', $mots[1]);
            $action->bindParam(':idp', $id);
            $action->bindParam(':prise', $date[0]);
            $action->execute();
            $_SESSION['coo'] = "";
        }
    }
}


@modifdonnees($bdd, $id);
affichage($bdd, $id);

?>
<br><br>
<a href="CreateScenario.php">
<button>Retour</button>
</a>