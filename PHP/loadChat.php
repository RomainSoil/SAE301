<?php
session_start();
require ('ConnectionBDD.php');
$conn= new ConnectionBDD();
$bdd=$conn->connexion();
$tous = $bdd->query("SELECT idgroupe FROM groupe");
if (1==$_SESSION['IdChat']){
    $idchat = $_SESSION['IdChat'];
    $recupMsg= $bdd->query("SELECT * FROM message WHERE idgroupe=1 order by id desc");
    while($message= $recupMsg->fetch()){
        ?>
        <div class="message">
            <p><?=$message['userx']?> : <?=$message['textmessage']?></p>
        </div>
    <?php
}
} else{
$idchat = $_SESSION['IdChat'];
$recupMsg= $bdd->prepare("SELECT * FROM message WHERE idgroupe=? and email=? order by id desc");
$recupMsg->execute(array($idchat, $_SESSION['Pseudo']));
while($message= $recupMsg->fetch()){
    ?>
    <div class="message">
        <p><?=$message['userx']?> : <?=$message['textmessage']?></p>
    </div>
    <?php
}
}
?>
