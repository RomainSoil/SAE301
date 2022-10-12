<?php
$bdd= new PDO('pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134', 'iutinfo134', 'NuVRPnlV');
$recupMsg= $bdd->query('SELECT * FROM message order by id desc ');
while($message= $recupMsg->fetch()){
    ?>
    <div class="message">
        <p><?=$message['userx']?> : <?=$message['textmessage']?></p>
    </div>
    <?php
}
?>