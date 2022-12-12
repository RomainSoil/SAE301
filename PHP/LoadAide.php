<?php
session_start();
/* Cette page permet au chat d'être tous le temps a jour, et d'afficher le bon chat, sur le bon groupe*/
require ('ConnectionBDD.php');
$conn= ConnectionBDD::getInstance();
$bdd=$conn::getpdo();
$tous = $bdd->query("SELECT idba FROM besoindaide");
$idchat = $_SESSION['IdChat'];
$recupMsg= $bdd->prepare("SELECT * FROM messageAide WHERE idgroupe=? and email=? order by id desc");
$recupMsg->execute(array($_SESSION['IdChat'], $_SESSION['Pseudo']));
while($message= $recupMsg->fetch()){
    ?>
    <div class="message">
        <p><?=$message['userx']?> : <?=$message['textmessage']?></p>
    </div>
    <?php
}
?>
