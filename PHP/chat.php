<?php
session_start();
require ('ConnectionBDD.php');
$conn= new ConnectionBDD();
$bdd=$conn->connexion();
$tous = $bdd->query("SELECT idgroupe FROM groupe");
$pseudo = $_SESSION['username'];
$pseudo2 = $pseudo[0];
$pseudo2 .= " ";
$pseudo2 .= $pseudo[1];
    if (isset($_POST['message'])) {
        $message = nl2br(htmlspecialchars($_POST['message']));
        $_SESSION['PseudoChat']=$pseudo2;
        $pseudo = $_SESSION['Pseudo'];
        $insertMsg = $bdd->prepare('INSERT INTO message(userx,textmessage, idgroupe, email) VALUES(?, ?, ?, ?)');
        $insertMsg->execute(array($pseudo2, $message, $_SESSION['IdChat'], $pseudo));
}
?>
<html>
<head>
    <title>Messagerie</title>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<a>Vous êtes <?php echo $_SESSION['PseudoChat']?></a>
<br>
<a>groupe <?php echo $_SESSION['IdChat'] ?></a>
    <form method="POST" action="" align="center">
        <textarea name="message"></textarea>
        <br>
        <input type="submit" name="valider">
    </form>
    <section id="messages"></section>

    <script>
        setInterval('load_messages()',500);
        function load_messages(){
            $('#messages').load('loadChat.php');
        }
    </script>

<button type="submit" name="creer" id="creer" onclick="afficher()">Créer groupe</button>
<form style="visibility: hidden" id="form" method="post">
    <input type="text" placeholder="Nom du groupe", id="nomgrp" name="nomgrp">
    <input name="valider" id="valider" type="submit" placeholder="Entrez le nom du groupe">
</form>

<button type="submit" name="inviter" id="inviter" onclick="afficher2()">inviter</button>
<form style="visibility: hidden" id="invit" method="post">
    <input type="text" placeholder="email", id="nom" name="nom">
    <input name="valider" id="valider" type="submit">
</form>
<script>
    function afficher(){
        document.getElementById('form').setAttribute('style', 'visibility: visible')
    }

    function afficher2(){
        document.getElementById('nom').setAttribute('style', 'visibility : visible')
    }
</script>
</body>
</html>

<?php

function creergrp($bdd)
{
    if (isset($_POST['nomgrp']) && $_POST['nomgrp']){
    $creer = $bdd->prepare("INSERT INTO groupe(nomgroupe, email) values (?, ?)");
    $creer->execute(array($_POST['nomgrp'], $_SESSION['Pseudo']));
    $newid = $bdd->query("SELECT idgroupe from groupe order by idgroupe desc ");
    $newgrp = $newid->fetch()[0];
    $_SESSION['IdChat']=$newgrp;
}}
function inviter($bdd){
    if (isset($_POST['nom'])&&$_POST['nom']){
        $getnom = $bdd->prepare("SELECT nomgroupe from groupe where idgroupe=?");;
        $getnom->execute(array($_SESSION['IdChat']));
        $ajouter = $bdd->prepare("INSERT INTO groupe(idgroupe,nomgroupe, email) values (?, ?, ?)");
        $noms = $getnom->fetch()[0];
        $ajouter->execute(array($_SESSION['IdChat'], $noms, $_POST['nom']));
        echo "l'utilisateur a été ajouté";
    }
}
function idchat($id){
    $_SESSION['IdChat']=$id;
}

function affichergrp($bdd){
    $grps = $bdd->prepare("SELECT * from groupe where email=?");
    $grps->execute(array($_SESSION['Pseudo']));
    ?>
    <form method="post">
        <?php
    while ($grp = $grps->fetch()){
        ?>
    <button type="submit" name="button" value=<?php $grp[0]?>><?php echo $grp[1]?></button>

<?php
    }?>
    </form>
<?php
}
if (isset($_POST['button'])){
    echo "hellooooooo";
    $_SESSION['IdChat']=$_POST['button'];
}
inviter($bdd);
creergrp($bdd);
affichergrp($bdd);
?>