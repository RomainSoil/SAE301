<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Scenario</title>
    <link rel="stylesheet" href="../PageProf.css">
    <script type="text/javascript" src="../LesFonctionsJS.js"></script>

</head>


<body>  <!--Le haut de la page avec l'image et le titre-->
<header>
    <a href="../Accueil.php">
        <img src="../image/logoIFSI.png" width=50 height=50 alt="leLogo" >
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br>
</header>


<?php

include('../ConnectionBDD.php');

?>
<h2>Le Scénario</h2>
<button class="button-90" onclick="window.history.back()">Retour</button>

<br><br>
<?php
$id = $_SESSION['scenario'];
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();


if (@$_COOKIE['reload']==1){
    @$_COOKIE['reload']=0;
    header('Refresh:0');
}

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

/**
 * @param $bdd
 * @param $id
 * @return void
 */
function affichage($bdd, $id)
{
    ?>

    <script>


        document.cookie = 'valid = '+""
        function recupererCookie(nom) {
            nom = nom + "=";
            var liste = document.cookie.split(';');
            for (var i = 0; i < liste.length; i++) {
                var c = liste[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nom) == 0) return c.substring(nom.length, c.length);
            }
            return null;
        }

        document.cookie = 'reload = '+0;
        function controle() {
            const test = document.form.input.value;
            document.cookie = "case = " + test;
            return test;
        }

        function change($i, $date, $do) {
            var $a = prompt("Quelle donnée voulez vous mettre?")
            var l = "";
            document.getElementsByTagName("td")[$i].innerHTML = $a;
            l=l+"!";
            l=l+$a;
            l=l+"!";
            l=l+$i;
            console.log(l);
            document.cookie = "valid = " + l;
            document.cookie = "date = "+$date;
            document.cookie = "do = "+$do;
            document.cookie = 'reload = '+1;
            location.reload();
            return l;

        }
    </script>

    <p id="idp"></p>

<?php
@$_SESSION['coo'] = $_COOKIE['valid'];
@$_SESSION['date']= $_COOKIE['date'];
@$_SESSION['do'] = $_COOKIE['do'];
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
                <td onclick="change(<?php echo $i ?>, 0, 0)"><?php echo affpatient($bdd, $id)[$i+1] ?></td>
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
                <td onclick="change(<?php echo $i+12?>, 0, 0)"> <?php echo $Presc[$i][3]?> </td>
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
                <td onclick="change(<?php echo $i+12+sizeof(PourAvoirToutesLesDatesDeLaPresc($bdd, $id)) ?>, 0, 0)"> <?php echo $Presc[$i][5]?> </td>
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
                <td onclick="change(<?php echo $i+12+(2*sizeof(PourAvoirToutesLesDatesDeLaPresc($bdd, $id))) ?>, 0, 0)"> <?php echo $Presc[$i][2]?> </td>
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
                <td onclick="change(<?php echo $i+12+(3*sizeof(PourAvoirToutesLesDatesDeLaPresc($bdd, $id))) ?>, 0, 0)"> <?php echo $Diag[$i][2]?> </td>
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
                <td onclick="change(<?php echo $i+12+(3*sizeof(PourAvoirToutesLesDatesDeLaPresc($bdd, $id)))+sizeof(PourAvoirToutesLesDatesDeLaDiag($bdd, $id))?>, 0, 0)"> <?php echo $Diag[$i][3]?> </td>
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
                <td onclick="change(<?php echo $i+12+(3*sizeof(PourAvoirToutesLesDatesDeLaPresc($bdd, $id)))+2*sizeof(PourAvoirToutesLesDatesDeLaDiag($bdd, $id))?>, 0, 0)"> <?php echo $Diag[$i][4]?> </td>
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
            <td onclick= "change(<?php echo ($i+12+(3*sizeof(PourAvoirToutesLesDatesDeLaPresc($bdd, $id)))+3*(sizeof(PourAvoirToutesLesDatesDeLaDiag($bdd, $id)))+$j+$nbType)?>, '<?php echo $donnee[$i]['date']?>', '<?php echo $donnee[$i]['type']?>')" > <?php echo $donnee[$j]['donnee']?> </td>
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


/**
 * @param $bdd
 * @param $id
 * @return void
 */
function modifdonnees($bdd, $id){
    $datespres = PourAvoirToutesLesDatesDeLaPresc($bdd,$id);
    $datesdiag = PourAvoirToutesLesDatesDeLaDiag($bdd, $id);
    $data = $_SESSION['coo'];
    if ($data != "") {
        $tout = $bdd->prepare("update donnee set donnee = :donnees where idpatient=:idp and nom=:nom and date=:date");
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
        elseif (isset($mots[2])){
            $sql = $tout;
            $sql->bindParam(':donnees', $mots[1]);
            $sql->bindParam(':idp', $id);
            $sql->bindParam(':nom', $_SESSION['do']);
            $sql->bindParam(':date', $_SESSION['date']);
            $sql->execute();
            $_SESSION['do'] = "";
            $_SESSION['date'] = "";
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
</body>
</html>