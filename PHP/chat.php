<?php
session_start();
require ('ConnectionBDD.php');
$conn= ConnectionBDD::getInstance();
$bdd=$conn->connexion();
$tous = $bdd->query("SELECT idgroupe FROM groupe");
$pseudo = $_SESSION['username'];
$pseudo2 = $pseudo[0];
$pseudo2 .= " ";
$pseudo2 .= $pseudo[1];
$_SESSION['PseudoChat']=$pseudo2;

    if (isset($_POST['message'])) {
        $message = nl2br(htmlspecialchars($_POST['message']));
        $pseudo = $_SESSION['Pseudo'];
        $insertMsg = $bdd->prepare('INSERT INTO message(userx,textmessage, idgroupe, email) VALUES(?, ?, ?, ?)');
        $insertMsg->execute(array($pseudo2, $message, $_SESSION['IdChat'], $pseudo));
}
?>
<html>
<head>
    <title>Messagerie</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="chat.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<div class="fontHead">
    <header>
        <a href="Accueil.php">
            <img src="logoIFSI.png" width=50 height=50 alt="" >
        </a>
        <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
        <br>
    </header>
</div>
<body>
<div class="font">
    <br>
    <form method="post" class="btn-group">
        <button class="submit" name="verif">Accueil</button>
        <button class="button" onclick="document.location='CreateScenario.php'">Scénario</button>
        <button class="button" onclick="document.location='Correction.php'">Correction</button>
        <button class="button" onclick="document.location='Note.php'">Note</button>
        <button class="button" onclick="document.location='chat.php'">Message </button>
    </form>

    </div>
    <br>
</div>
<div class="info">
<h2>Bonjour, <?php echo $_SESSION['PseudoChat']?></h2>
<br>
<h3>Communication avec groupe <?php echo $_SESSION['IdChat'] ?></h3>
</div>
<br>
    <form method="POST" action="" align="center">
        <textarea name="message" rows="10" cols="80"></textarea>
        <br>
        <input type="submit" name="valider">
    </form>
    <section id="messages"></section>
<br>
<div class="Aide">
    <button href="https://cas.uphf.fr/login-help/">Besoin d'aide</button><br><br>
</div>
    <script>
        setInterval('load_messages()',500);
        function load_messages(){
            $('#messages').load('loadChat.php');
        }
    </script>
<div class="Aide">
<button type="submit" name="creer" id="creer" onclick="afficher()">Créer groupe</button>
<form style="visibility: hidden" id="form" method="post">
    <input type="text" placeholder="Nom du groupe" id="nomgrp" name="nomgrp">
    <input name="valider" id="valider" type="submit" placeholder="Entrez le nom du groupe">
</form>
<button type="submit" name="inviter" id="inviter" onclick="afficher2()">inviter</button>
<form style="visibility: hidden" id="invit" method="post">
    <input type="text" placeholder="email", id="nom" name="nom">
    <input name="valider" id="valider" type="submit">
</form>
</div>
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
    $creer = $bdd->prepare("INSERT INTO groupe(nomgroupe, email, admin) values (?, ?, ?)");
    $creer->execute(array($_POST['nomgrp'], $_SESSION['Pseudo'], true));
    $newid = $bdd->query("SELECT idgroupe from groupe order by idgroupe desc ");
    $newgrp = $newid->fetch()[0];
    $_SESSION['IdChat']=$newgrp;
}}
function inviter($bdd){
    if (isset($_POST['nom'])&&$_POST['nom']){
        $getnom = $bdd->prepare("SELECT nomgroupe from groupe where idgroupe=?");;
        $getnom->execute(array($_SESSION['IdChat']));
        $ajouter = $bdd->prepare("INSERT INTO groupe(idgroupe,nomgroupe, email, admin) values (?, ?, ?, ?)");
        $noms = $getnom->fetch()[0];
        $ajouter->execute(array($_SESSION['IdChat'], $noms, $_POST['nom'], 'false'));
        echo "l'utilisateur a été ajouté";
    }
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

function afficheruser($bdd){
    $users = $bdd->prepare("SELECT * FROM groupe where idgroupe=? and email!=?");
    $users->execute(array($_SESSION['IdChat'], $_SESSION['Pseudo']));
        while ($user = $users->fetch()){?>
                <form method="post">
                    <?php echo $user[2]?>
                    <button type="submit" name="supprimer" value="<?php echo $user[2]?>">X</button>
                    <?php if($user[3]==0){?>
                    <button type="submit" name="admin" value="<?php echo $user[2]?>">admin</button>
                <?php  }  ?>
                </form>
<?php

        }
}


if (isset($_POST['button'])){
    $_SESSION['IdChat']=$_POST['button'];
}

function supprimer($bdd){
    if (isset($_POST['supprimer'])){
        $supp = $bdd->prepare("DELETE FROM groupe where email=? and idgroupe=?");
        $supp->execute(array($_POST['supprimer'], $_SESSION['IdChat']));
    }
}

function admin($bdd){
    if (isset($_POST['admin'])){
        $admin = $bdd->prepare("UPDATE groupe SET admin ='true' where email=? and idgroupe=?");
        $admin->execute(array($_POST['admin'], $_SESSION['IdChat']));
    }
}



inviter($bdd);
creergrp($bdd);
affichergrp($bdd);
afficheruser($bdd);
supprimer($bdd);
admin($bdd);

if(isset($_POST['verif'])) {
    if (isset($_SESSION['fonction'])) {
        if ($_SESSION['fonction'] == 'etu') {
            header('Location:PageEtu.php');
        } elseif ($_SESSION['fonction'] == 'prof') {
            header('Location:PageProf.php');
        }
    }
}
?>