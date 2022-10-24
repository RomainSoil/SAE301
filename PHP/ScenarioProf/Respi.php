<?php
session_start();
@$_SESSION['temperature']=$_POST['temperature'];
@$_SESSION['glasgow']=$_POST['glasgow'];
@$_SESSION['EVA']=$_POST['EVA'];
@$_SESSION['AlgoPlus']=$_POST['AlgoPlus'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="Patient.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>
<div class="Titre">
    <h1>Respiration</h1>
</div>
<form method="post">

    SaO2 : <input type="number" name="SaO2">
    <br><br>
    FR : <input type="number" name="FR">
    <br><br>
    O2 : <input type="text" name="O2">
    <br><br>

    <input type="submit" value="Valider" name="ValidScenario" onclick="<?php AjoutAlaBDD($bdd=ConnectionBDD::getInstance()::getpdo());?>">



</form>
<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>
</html>

<?php


function AjoutAlaBDD($bdd){

    $sql =$bdd->prepare("INSERT into miseensecurite (date, barrieredelitprescrite, barrieredelitconfort, serveillancecontention, idpatient) VALUES 
        (?,?,?,?,?)");
    $sql->bindParam(1, $_SESSION['date']);
    if ($_SESSION['prescrite']=="oui") {$sql->bindParam(2, true);}
    else {$sql->bindParam(2, false);}
    if ($_SESSION['confort']=="oui") {$sql->bindParam(3, true);}
    else {$sql->bindParam(3, false);}
    if ($_SESSION['surveillance']=="oui") {$sql->bindParam(4, true);}
    else {$sql->bindParam(4, false);}

    $sql2 =$bdd->prepare("INSERT into soinsrelationnels (date, accueil, entretieninfirmer, touchermassage, idpatient) VALUES 
        (?,?,?,?,?)");
    $sql2->bindParam(1, $_SESSION['date']);
    if ($_SESSION['accueil']=="oui") {$sql2->bindParam(2, true);}
    else {$sql2->bindParam(2, false);}
    if ($_SESSION['entretient']=="oui") {$sql2->bindParam(3, true);}
    else {$sql2->bindParam(3, false);}
    if ($_SESSION['massage']=="oui") {$sql2->bindParam(4, true);}
    else {$sql2->bindParam(4, false);}
    $sql2->bindParam(5,$_SESSION['patient']);


    $sql3 =$bdd->prepare("INSERT into elimination (date, selles, gaz, urines, idpatient) VALUES 
        (?,?,?,?,?)");
    $sql3->bindParam(1, $_SESSION['date']);
    if ($_SESSION['selles']=="oui") {$sql->bindParam(2, true);}
    else {$sql3->bindParam(2, false);}
    if ($_SESSION['gaz']=="oui") {$sql->bindParam(3, true);}
    else {$sql3->bindParam(3, false);}
    if ($_SESSION['urine']=="oui") {$sql->bindParam(4, true);}
    else {$sql3->bindParam(4, false);}
    $sql3->bindParam(5,$_SESSION['patient']);


    $sql4 =$bdd->prepare("INSERT into cardio (date, ta, pls, ecg, idpatient) VALUES 
        (?,?,?,?,?)");
    $sql4->bindParam(1, $_SESSION['date']);
    $sql4->bindParam(2, $_SESSION['TA']);
    $sql4->bindParam(3, $_SESSION['pls']);
    $sql4->bindParam(4, $_SESSION['ECG']);
    $sql4->bindParam(5,$_SESSION['patient']);


    $sql5 =$bdd->prepare("INSERT into mobilite (date, aidealamarche, aideaulever, aideaucoucher,aideaufauteil, idpatient) VALUES 
        (?,?,?,?,?,?)");
    $sql5->bindParam(1, $_SESSION['date']);
    if ($_SESSION['AideMarche']=="oui") {$sql5->bindParam(2, true);}
    else {$sql5->bindParam(2, false);}
    if ($_SESSION['AideLever']=="oui") {$sql5->bindParam(3, true);}
    else {$sql5->bindParam(3, false);}
    if ($_SESSION['AideCoucher']=="oui") {$sql5->bindParam(4, true);}
    else {$sql5->bindParam(4, false);}
    if ($_SESSION['AideFauteil']=="oui") {$sql5->bindParam(4, true);}
    else {$sql5->bindParam(5, false);}
    $sql5->bindParam(6,$_SESSION['patient']);


    $sql6 =$bdd->prepare("INSERT into hygiene (date, toilette,douche, bain, refectionlit,change,soindebouche,preventiondescare,changementdepos,matelasaair, idpatient) VALUES 
        (?,?,?,?,?,?,?,?,?)");
    $sql6->bindParam(1, $_SESSION['date']);
    if ($_SESSION['toilette']=="oui") {$sql6->bindParam(2, true);}
    else {$sql6->bindParam(2, false);}
    if ($_SESSION['douche']=="oui") {$sql6->bindParam(3, true);}
    else {$sql6->bindParam(3, false);}
    if ($_SESSION['bain']=="oui") {$sql6->bindParam(4, true);}
    else {$sql6->bindParam(4, false);}
    if ($_SESSION['refectionLit']=="oui") {$sql6->bindParam(5, true);}
    else {$sql6->bindParam(5, false);}
    if ($_SESSION['change']=="oui") {$sql6->bindParam(6, true);}
    else {$sql6->bindParam(6, false);}
    if ($_SESSION['soinBouche']=="oui") {$sql6->bindParam(7, true);}
    else {$sql6->bindParam(7, false);}
    if ($_SESSION['escare']=="oui") {$sql6->bindParam(8, true);}
    else {$sql6->bindParam(8, false);}
    if ($_SESSION['position']=="oui") {$sql6->bindParam(9, true);}
    else {$sql6->bindParam(9, false);}
    if ($_SESSION['matelas']=="oui") {$sql6->bindParam(10, true);}
    else {$sql6->bindParam(10, false);}
    $sql6->bindParam(11,$_SESSION['patient']);


    $sql7 =$bdd->prepare("INSERT into alimentation (date, ajeun, surveillancehydratation, surveillancealimentation,regime,aideaurepas, idpatient) VALUES 
        (?,?,?,?,?,?,?)");
    $sql7->bindParam(1, $_SESSION['date']);
    if ($_SESSION['jeun']=="oui") {$sql7->bindParam(2, true);}
    else {$sql7->bindParam(2, false);}
    if ($_SESSION['hydratation']=="oui") {$sql7->bindParam(3, true);}
    else {$sql7->bindParam(3, false);}
    if ($_SESSION['alimentaire']=="oui") {$sql7->bindParam(4, true);}
    else {$sql7->bindParam(4, false);}
    if ($_SESSION['regime']=="oui") {$sql7->bindParam(4, true);}
    else {$sql7->bindParam(5, false);}
    if ($_SESSION['aideRepas']=="oui") {$sql7->bindParam(4, true);}
    else {$sql7->bindParam(6, false);}
    $sql7->bindParam(7,$_SESSION['patient']);

    $sql8 =$bdd->prepare("INSERT into neuro (date, t°c, glasgow, eva,algoplus, idpatient) VALUES 
        (?,?,?,?,?,?)");
    $sql8->bindParam(1, $_SESSION['date']);
    $sql8->bindParam(2, $_SESSION['temperature']);
    $sql8->bindParam(3, $_SESSION['glasgow']);
    $sql8->bindParam(4, $_SESSION['EVA']);
    $sql8->bindParam(5,$_SESSION['AlgoPlus']);
    $sql8->bindParam(6,$_SESSION['patient']);



    $sql9 =$bdd->prepare("INSERT into respi (date, sao2, fr, o2, idpatient) VALUES 
        (?,?,?,?,?)");
    $sql9->bindParam(1, $_POST['date']);
    $sql9->bindParam(2, $_POST['SaO2']);
    $sql9->bindParam(3, $_POST['FR']);
    $sql9->bindParam(4, $_POST['O2']);
    $sql9->bindParam(5,$_POST['patient']);

    $sql->execute();
    $sql2->execute();
    $sql3->execute();
    $sql4->execute();
    $sql5->execute();
    $sql6->execute();
    $sql7->execute();
    $sql8->execute();
    $sql9->execute();




}

?>




