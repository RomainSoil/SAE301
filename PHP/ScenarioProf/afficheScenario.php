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
    $sql = $bdd->prepare("SELECT * from prescription where idpatient=?");
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
        <th colspan"1">Nom</th>
        <th colspan"1">Prénom</th>
        <th colspan"1">age</th>
        <th colspan"1">poids</th>
        <th colspan"1">date de naissance</th>
        <th colspan"1">taille</th>
        <th colspan"1">iep</th>
        <th colspan"1">ipp</th>
        <th colspan"1">sexe</th>
        <th colspan"1">adresse</th>
        <th colspan"1">ville</th>
        <th colspan"1">Code Postale</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo affpatient($bdd, $id)[1]?></td>
        <td><?php echo affpatient($bdd, $id)[2]?></td>
        <td> <?php echo affpatient($bdd, $id)[3]?></td>
        <td> <?php echo affpatient($bdd, $id)[5]?></td>
        <td> <?php echo affpatient($bdd, $id)[4]?></td>
        <td> <?php echo affpatient($bdd, $id)[6]?></td>
        <td> <?php echo affpatient($bdd, $id)[7]?></td>
        <td> <?php echo affpatient($bdd, $id)[8]?></td>
        <td> <?php echo affpatient($bdd, $id)[9]?></td>
        <td> <?php echo affpatient($bdd, $id)[10]?></td>
        <td> <?php echo affpatient($bdd, $id)[11]?></td>
        <td> <?php echo affpatient($bdd, $id)[12]?></td>

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
                <td> <?php echo $Presc[$i][3]?> </td>
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
                <td> <?php echo $Presc[$i][5]?> </td>
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
                <td> <?php echo $Presc[$i][2]?> </td>
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
                <td> <?php echo $Diag[$i][2]?> </td>
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
        <td> Date </td>
    <?php
    $laListeDeToutesLesDates=PourAvoirToutesLesDatesDeLaMatrice($bdd,$id);

    for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                ?>
                <td> <?php echo $laListeDeToutesLesDates[$i][0]?></td>
                <?php
            }
            ?>
        </tr>
        <th><div class="title">Mise en sécurité </div></th>

        <tr>
            <td> Barrière de lit prescrite </td>
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

            <td> Barrière de lit de confort </td>
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

            <td> Surveillance contention </td>
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

            <td> Accueil information </td>
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

            <td> Entretien Infirmier </td>
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
            <td> Toucher/massage </td>
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

            <td> Selle </td>
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

            <td> Gaz </td>
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

            <td> Urine </td>
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

            <td> Ta </td>
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

            <td> Pls </td>
            <?php
            for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                ?>
                <td> <?php echo $Cardio[$i][2]?> </td>
                <?php
            }
            ?>
        </tr>
        <tr>

            <td> ECG </td>
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

            <td> Aide à la marche </td>
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

            <td> Aide au lever </td>
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

            <td> Aide au coucher </td>
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

            <td> Aide au fauteuil </td>
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

            <td> Toilette </td>
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

            <td> Douche </td>
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

            <td> Bain </td>
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

            <td> Refection lit </td>
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

            <td> Change </td>
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

            <td> Soin de bouche </td>
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

            <td> Prévention d'escare </td>
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

            <td> Changement de position </td>
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

            <td> Matelas a l'air </td>
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

            <td> A jeun </td>
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

            <td> Surveillance hydratation </td>
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

            <td> Surveillance alimentaire </td>
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

            <td> Régime </td>
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

            <td> Aide au repas </td>
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

            <td> Surveillance perfusion </td>
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

            <td> Pansement </td>
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

            <td> Surveillance Glycémique (en g/l)  </td>
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

            <td> Bas de contention </td>
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

            <td>Cathéter veineux périphérique </td>
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

            <td>Sondage urinaire </td>
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

            <td> Autre </td>
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

            <td> Temperature </td>
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

            <td> Glasgow </td>
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

            <td> EVA </td>
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

            <td> AlgoPlus </td>
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

            <td> SaO2 </td>
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

            <td> FR </td>
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

            <td> O2 </td>
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
affichage($bdd, $id);
?>
<br><br>)
<a href="CreateScenario.php">
<button>Retour</button>
</a>