<?php
$bdd= new PDO('pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134', 'iutinfo134', 'NuVRPnlV');
$recupMsg= $bdd->query('SELECT * FROM messages');
while($message= $recupMsg->fetch()){
    ?>
    <div class="message">
        <p><?=$message['userx']?> : <?=$message['message']?></p>
    </div>
    <?php
}
?>