<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>
    <h2>Respiration</h2>
<form method="post">
    <!-- Ce champ caché sert a ne pas faire attendre l'utilisateur même si il upload un fichier trop gros pour php -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    Image (Facultatif) ?: <input name="userfile" type="file" />
    <input type="submit" value="Ajouter" />
    <br><br>
    SaO2 : <input type="number" name="SaO2">
    <br><br>
    FR : <input type="number" name="FR">
    <br><br>
    O2 : <input type="text" name="O2">
    <br><br>

    <input type="submit" value="Valider" name="ValidScenario" >
    <h4>Cette validation permet l'enregistrement de toutes les catégories précédentes. </h4>


</form>
<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>
</html>

<?php


/**
 * @param $bdd
 * @return void
 */
function AjoutAlaBDD($bdd){


    if (isset($_POST['ValidScenario'])) {
        $VarTrue = 1;
        $VarFalse = 0;
        $VarNull = null;

        $sql = $bdd->prepare("INSERT into miseensecurite (date, barrieredelitprescrite, barrieredelitconfort, serveillancecontention, idpatient) VALUES 
        (?,?,?,?,?)");
        $sql->bindParam(1, $_SESSION['Date']);
        if ($_SESSION['prescrite'] == "oui") {
            $sql->bindParam(2, $VarTrue);
        } else {
            $sql->bindParam(2, $VarFalse);
        }
        if ($_SESSION['confort'] == "oui") {
            $sql->bindParam(3, $VarTrue);
        } else {
            $sql->bindParam(3, $VarFalse);
        }
        if ($_SESSION['surveillance'] == "oui") {
            $sql->bindParam(4, $VarTrue);
        } else {
            $sql->bindParam(4, $VarFalse);
        }
        $sql->bindParam(5, $_SESSION['patient']);

        $sql2 = $bdd->prepare("INSERT into soinsrelationnels (date, accueil, entretieninfirmer, touchermassage, idpatient) VALUES 
        (?,?,?,?,?)");
        $sql2->bindParam(1, $_SESSION['Date']);
        if ($_SESSION['accueil'] == "oui") {
            $sql2->bindParam(2, $VarTrue);
        } else {
            $sql2->bindParam(2, $VarFalse);
        }
        if ($_SESSION['entretien'] == "oui") {
            $sql2->bindParam(3, $VarTrue);
        } else {
            $sql2->bindParam(3, $VarFalse);
        }
        if ($_SESSION['massage'] == "oui") {
            $sql2->bindParam(4, $VarTrue);
        } else {
            $sql2->bindParam(4, $VarFalse);
        }
        $sql2->bindParam(5, $_SESSION['patient']);


        $sql3 = $bdd->prepare("INSERT into elimination (date, selles, gaz, urines, idpatient) VALUES 
        (?,?,?,?,?)");
        $sql3->bindParam(1, $_SESSION['Date']);
        if ($_SESSION['selles'] == "oui") {
            $sql3->bindParam(2, $VarTrue);
        } else {
            $sql3->bindParam(2, $VarFalse);
        }
        if ($_SESSION['gaz'] == "oui") {
            $sql3->bindParam(3, $VarTrue);
        } else {
            $sql3->bindParam(3, $VarFalse);
        }
        if ($_SESSION['urine'] == "oui") {
            $sql3->bindParam(4, $VarTrue);
        } else {
            $sql3->bindParam(4, $VarFalse);
        }
        $sql3->bindParam(5, $_SESSION['patient']);


        $sql4 = $bdd->prepare("INSERT into cardio (date, ta, pls, ecg, idpatient) VALUES 
        (?,?,?,?,?)");
        $sql4->bindParam(1, $_SESSION['Date']);
        if (!($_SESSION['TA'])) {
            $sql4->bindParam(2, $VarNull);
        } else {
            $sql4->bindParam(2, $_SESSION['TA']);
        }
        if (!($_SESSION['pls'])) {
            $sql4->bindParam(3, $VarNull);
        } else {
            $sql4->bindParam(3, $_SESSION['pls']);
        }
        if (!($_SESSION['ECG'])) {
            $sql4->bindParam(4, $VarNull);
        } else {
            $sql4->bindParam(4, $_SESSION['ECG']);
        }
        $sql4->bindParam(5, $_SESSION['patient']);


        $sql5 = $bdd->prepare("INSERT into mobilite (date, aidealamarche, aideaulever, aideaucoucher,aideaufauteil, idpatient) VALUES 
        (?,?,?,?,?,?)");
        $sql5->bindParam(1, $_SESSION['Date']);
        if ($_SESSION['AideMarche'] == "oui") {
            $sql5->bindParam(2, $VarTrue);
        } else {
            $sql5->bindParam(2, $VarFalse);
        }
        if ($_SESSION['AideLever'] == "oui") {
            $sql5->bindParam(3, $VarTrue);
        } else {
            $sql5->bindParam(3, $VarFalse);
        }
        if ($_SESSION['AideCoucher'] == "oui") {
            $sql5->bindParam(4, $VarTrue);
        } else {
            $sql5->bindParam(4, $VarFalse);
        }
        if ($_SESSION['AideFauteil'] == "oui") {
            $sql5->bindParam(5, $VarTrue);
        } else {
            $sql5->bindParam(5, $VarFalse);
        }
        $sql5->bindParam(6, $_SESSION['patient']);


        $sql6 = $bdd->prepare("INSERT into hygiene (date, toilette,douche, bain, refectionlit,change,soindebouche,preventiondescare,changementdepos,matelasaair, idpatient) VALUES 
        (?,?,?,?,?,?,?,?,?,?,?)");
        $sql6->bindParam(1, $_SESSION['Date']);
        if ($_SESSION['toilette'] == "oui") {
            $sql6->bindParam(2, $VarTrue);
        } else {
            $sql6->bindParam(2, $VarFalse);
        }
        if ($_SESSION['douche'] == "oui") {
            $sql6->bindParam(3, $VarTrue);
        } else {
            $sql6->bindParam(3, $VarFalse);
        }
        if ($_SESSION['bain'] == "oui") {
            $sql6->bindParam(4, $VarTrue);
        } else {
            $sql6->bindParam(4, $VarFalse);
        }
        if ($_SESSION['refectionLit'] == "oui") {
            $sql6->bindParam(5, $VarTrue);
        } else {
            $sql6->bindParam(5, $VarFalse);
        }
        if ($_SESSION['change'] == "oui") {
            $sql6->bindParam(6, $VarTrue);
        } else {
            $sql6->bindParam(6, $VarFalse);
        }
        if ($_SESSION['soinBouche'] == "oui") {
            $sql6->bindParam(7, $VarTrue);
        } else {
            $sql6->bindParam(7, $VarFalse);
        }
        if ($_SESSION['escare'] == "oui") {
            $sql6->bindParam(8, $VarTrue);
        } else {
            $sql6->bindParam(8, $VarFalse);
        }
        if ($_SESSION['position'] == "oui") {
            $sql6->bindParam(9, $VarTrue);
        } else {
            $sql6->bindParam(9, $VarFalse);
        }
        if ($_SESSION['matelas'] == "oui") {
            $sql6->bindParam(10, $VarTrue);
        } else {
            $sql6->bindParam(10, $VarFalse);
        }
        $sql6->bindParam(11, $_SESSION['patient']);


        $sql7 = $bdd->prepare("INSERT into alimentation (date, ajeun, surveillancehydratation, surveillancealimentation,regime,aideaurepas, idpatient) VALUES 
        (?,?,?,?,?,?,?)");
        $sql7->bindParam(1, $_SESSION['Date']);
        if ($_SESSION['jeun'] == "oui") {
            $sql7->bindParam(2, $VarTrue);
        } else {
            $sql7->bindParam(2, $VarFalse);
        }
        if ($_SESSION['hydratation'] == "oui") {
            $sql7->bindParam(3, $VarTrue);
        } else {
            $sql7->bindParam(3, $VarFalse);
        }
        if ($_SESSION['alimentaire'] == "oui") {
            $sql7->bindParam(4, $VarTrue);
        } else {
            $sql7->bindParam(4, $VarFalse);
        }
        if ($_SESSION['regime'] == "oui") {
            $sql7->bindParam(5, $VarTrue);
        } else {
            $sql7->bindParam(5, $VarFalse);
        }
        if ($_SESSION['aideRepas'] == "oui") {
            $sql7->bindParam(6, $VarTrue);
        } else {
            $sql7->bindParam(6, $VarFalse);
        }
        $sql7->bindParam(7, $_SESSION['patient']);

        $sql8 = $bdd->prepare("INSERT into soins (date,surveillanceperf ,pansement ,surveillanceglycemique ,basdecontention ,catheter,sondageurinaire,autre, idpatient) VALUES
        (?,?,?,?,?,?,?,?,?)");
        $sql8->bindParam(1, $_SESSION['Date']);
        if ($_SESSION['surveillancePerf'] == "oui") {
            $sql8->bindParam(2, $VarTrue);
        } else {
            $sql8->bindParam(2, $VarFalse);
        }
        if ($_SESSION['pansements'] == "oui") {
            $sql8->bindParam(3, $VarTrue);
        } else {
            $sql8->bindParam(3, $VarFalse);
        }
        if (!($_SESSION['glycémique'])) {
            $sql8->bindParam(4, $VarNull);
        } else {
            $sql8->bindParam(4, $_SESSION['glycémique']);
        }
        if ($_SESSION['contentions'] == "oui") {
            $sql8->bindParam(5, $VarTrue);
        } else {
            $sql8->bindParam(5, $VarFalse);
        }
        if (!($_SESSION['Cathéter'])) {
            $sql8->bindParam(6, $VarNull);
        } else {
            $sql8->bindParam(6, $_SESSION['Cathéter']);
        }
        if (!($_SESSION['sondageurinaire'])) {
            $sql8->bindParam(7, $VarNull);
        } else {
            $sql8->bindParam(7, $_SESSION['sondageurinaire']);
        }
        if (!($_SESSION['autre'])) {
            $sql8->bindParam(8, $VarNull);
        } else {
            $sql8->bindParam(8, $_SESSION['autre']);
        }
        $sql8->bindParam(9, $_SESSION['patient']);

        $sql9 = $bdd->prepare("INSERT into neuro (date, t°c, glasgow, eva,algoplus, idpatient) VALUES
        (?,?,?,?,?,?)");
        $sql9->bindParam(1, $_SESSION['Date']);
        if (!($_SESSION['temperature'])) {
            $sql9->bindParam(2, $VarNull);
        } else {
            $sql9->bindParam(2, $_SESSION['temperature']);
        }
        if (!($_SESSION['glasgow'])) {
            $sql9->bindParam(3, $VarNull);
        } else {
            $sql9->bindParam(3, $_SESSION['glasgow']);
        }
        if (!($_SESSION['EVA'])) {
            $sql9->bindParam(4, $VarNull);
        } else {
            $sql9->bindParam(4, $_SESSION['EVA']);
        }
        if (!($_SESSION['AlgoPlus'])) {
            $sql9->bindParam(5, $VarNull);
        } else {
            $sql9->bindParam(5, $_SESSION['AlgoPlus']);
        }
        $sql9->bindParam(6, $_SESSION['patient']);


        $sql10 = $bdd->prepare("INSERT into respi (date, sao2, fr, o2, idpatient) VALUES 
        (?,?,?,?,?)");
        $sql10->bindParam(1, $_SESSION['Date']);
        if (!($_POST['SaO2'])) {
            $sql10->bindParam(2, $VarNull);
        } else {
            $sql10->bindParam(2, $_POST['SaO2']);
        }
        if (!($_POST['FR'])) {
            $sql10->bindParam(3, $VarNull);
        } else {
            $sql10->bindParam(3, $_POST['FR']);
        }
        if (!($_POST['O2'])) {
            $sql10->bindParam(4, $VarNull);
        } else {
            $sql10->bindParam(4, $_POST['O2']);
        }
        $sql10->bindParam(5, $_SESSION['patient']);


        $sql->execute();
        $sql2->execute();
        $sql3->execute();
        $sql4->execute();
        $sql5->execute();
        $sql6->execute();
        $sql7->execute();
        $sql8->execute();
        $sql9->execute();
        $sql10->execute();


    }
}
include ('../ConnectionBDD.php');
AjoutAlaBDD($bdd=ConnectionBDD::getInstance()::getpdo());

?>




