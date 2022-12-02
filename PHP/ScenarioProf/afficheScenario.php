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
    </thead>


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
affichage($bdd, $id);
?>
<br><br>
<a href="CreateScenario.php">
<button>Retour</button>
</a>