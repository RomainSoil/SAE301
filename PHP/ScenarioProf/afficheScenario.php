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
<div class="Titre">
    <h1>Le Scénario</h1>
</div>
</body>
</html>

<?php
$id = $_SESSION['scenario'];
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();

/* permet d'afficher les données du patient séléctionné*/
function affpatient($bdd, $id){
    $sql = $bdd->prepare("SELECT * from patient where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    return $array;
    ?><br><?php
}
/* permet d'afficher les données de la prescription du patient séléctionné*/
function affpresc($bdd, $id){
    $sql = $bdd->prepare("SELECT * from prescription where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    return $array;
?><br><?php
}

function affsecu($bdd, $id){
    $sql = $bdd->prepare("SELECT * FROM miseensecurite where idpatient=?");
    $sql->execute(array($id));
    $array = $sql->fetch();
    return $array;
    ?><br><?php
}

function affsoinsrel($bdd, $id){
   $sql = $bdd->prepare("SELECT * FROM soinsrelationnels where idpatient=? order by date");
   $sql->execute(array($id));
   $array = $sql->fetchAll();
    return $array;
    ?><br><?php
}


    function affelim($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM elimination where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
        ?><br><?php
    }

    function affcardio($bdd, $id){
        echo 'bbb';
        ?><br><?php
    }

    function affmobil($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM mobilite where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
        ?><br><?php
    }

    function affhyg($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM hygiene where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
        ?><br><?php
    }
    function affalim($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM alimentation where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
        ?><br><?php
    }
    function affneuro($bdd, $id)
    {
        $sql = $bdd->prepare("SELECT * FROM neuro where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
    }
        ?><br><?php

function PourAvoirToutesLesDatesDeLaMatrice($bdd, $id){
    $sql = $bdd->prepare("SELECT date FROM miseensecurite where idpatient=? order by date");
    $sql->execute(array($id));
    $array = $sql->fetchAll();
    return $array;
}
    function affrespi($bdd, $id){
        $sql = $bdd->prepare("SELECT * FROM respi where idpatient=? order by date");
        $sql->execute(array($id));
        $array = $sql->fetchAll();
        return $array;
        }
?><br><?php
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
        <tbody>
        <thead>

        <tr>
        <td> date </td>
    <?php
    $laListeDeToutesLesDates=PourAvoirToutesLesDatesDeLaMatrice($bdd,$id);

    for ($i=0; $i<count($laListeDeToutesLesDates); $i++){
                ?>
                <td> <?php echo $laListeDeToutesLesDates[$i][0]?></td>
                <?php
            }
            ?>
        </tr>

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
            @$MiseEnSecu=affsecu($bdd, $id);
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
            @$MiseEnSecu=affsecu($bdd, $id);
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
            @$MiseEnSoinsRelationnel=affsoinsrel($bdd, $id);
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
            @$MiseEnSoinsRelationnel=affsoinsrel($bdd, $id);
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




        </thead>
        </tbody>
    </table>
<?php
}
affichage($bdd, $id);
?>