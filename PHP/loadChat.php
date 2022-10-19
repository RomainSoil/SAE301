<?php
session_start();
require ('ConnectionBDD.php');
$conn= ConnectionBDD::getInstance();
$bdd=$conn->connexion();
$tous = $bdd->query("SELECT idgroupe FROM groupe");
$idchat = $_SESSION['IdChat'];
if (1==$_SESSION['IdChat']){
    $recupMsg= $bdd->query("SELECT * FROM message WHERE idgroupe=1 order by id desc");
    while($message= $recupMsg->fetch()){
        ?>
        <div class="message">
            <p><?=$message['userx']?> : <?=$message['textmessage']?></p>
        </div>
    <?php
}
} else{
    $recupMsg= $bdd->prepare("SELECT * FROM message WHERE idgroupe=? and email=? order by id desc");
    $recupMsg->execute(array($_SESSION['IdChat'], $_SESSION['Pseudo']));
    while($message= $recupMsg->fetch()){
        ?>
        <div class="message">
            <p><?=$message['userx']?> : <?=$message['textmessage']?></p>
        </div>
        <?php
        }
    }
?>
