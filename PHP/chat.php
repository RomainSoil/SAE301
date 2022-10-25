<?php
session_start();
require ('ConnectionBDD.php');
$conn= ConnectionBDD::getInstance();
$bdd=$conn::getpdo();
$tous = $bdd->query("SELECT idgroupe FROM groupe");
$pseudo = $_SESSION['username'];
$pseudo2 = $pseudo[0];
$pseudo2 .= " ";
$pseudo2 .= $pseudo[1];
$_SESSION['PseudoChat']=$pseudo2;
/* ce if sert a permettre d'envoyer des messages*/
    if (isset($_POST['message'])) {
        $message = nl2br(htmlspecialchars($_POST['message']));
        $pseudo = $_SESSION['Pseudo'];
        $insertMsg = $bdd->prepare('INSERT INTO message(userx,textmessage, idgroupe, email) VALUES(?, ?, ?, ?)');
        $insertMsg->execute(array($pseudo2, $message, $_SESSION['IdChat'], $pseudo));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Messagerie</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="chat.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="fontHead">
    <header>
        <a href="Accueil.php">
            <img src="image/logoIFSI.png" width=50 height=50 alt="" >
        </a>
        <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
        <br>
    </header>
</div>

<div class="font">

    <br>
    <div class="btn-group">
    <form method="post" class="btn-group">
        <button class="button" type="submit" name="verif">Accueil</button>

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
    <div class="message">
    <form method="POST" >
        <textarea name="message" rows="10" cols="80"></textarea>
        <br>
        <input type="submit" name="valider">
        <button type="submit" name="suppmess">Supprimer</button>
    </form>
</div>
<br>

<form method="post">

</form>
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
    <input name="valider" id="valider" type="submit">
</form>
<button type="submit" name="inviter" id="inviter" onclick="afficher2()">inviter</button>
<form style="visibility: hidden" id="invit" method="post">
    <input type="text" placeholder="email" id="nom" name="nom">
</form>
</div>
<script>
    e=true;
    f=true;

    /*permet d'afficher/faire disparaitre les champs de textes d'inviter et de création de groupe*/
    function afficher(){

        if(e){
            document.getElementById('form').setAttribute('style', 'visibility: visible')
            e=false;
        }
        else {
            document.getElementById('form').setAttribute('style', 'visibility: hidden')
            e=true;
        }

    }

    function afficher2(){
        if(f){
            document.getElementById('nom').setAttribute('style', 'visibility: visible')
            f=false;
        }
        else {
            document.getElementById('nom').setAttribute('style', 'visibility: hidden')
            f=true;
        }

    }
</script>


<?php
/*cette fonction permet de créer dans la base de donnée un nouveau groupe et de mettre le créateur admin*/
function creergrp($bdd)
{
    if (isset($_POST['nomgrp']) && $_POST['nomgrp']){
    $creer = $bdd->prepare("INSERT INTO groupe(nomgroupe, email, admin) values (?, ?, ?)");
    $creer->execute(array($_POST['nomgrp'], $_SESSION['Pseudo'], true));
    $newid = $bdd->query("SELECT idgroupe from groupe order by idgroupe desc ");
    $newgrp = $newid->fetch()[0];
    $_SESSION['IdChat']=$newgrp;
}}
/*cette fonction permet d'ajouter une personne dans le groupe ou nous sommes*/
function inviter($bdd){
    if (isset($_POST['nom'])&&$_POST['nom']){
        $getnom = $bdd->prepare("SELECT nomgroupe from groupe where idgroupe=?");
        $getnom->execute(array($_SESSION['IdChat']));
        $ajouter = $bdd->prepare("INSERT INTO groupe(idgroupe,nomgroupe, email, admin) values (?, ?, ?, ?)");
        $noms = $getnom->fetch()[0];
        $ajouter->execute(array($_SESSION['IdChat'], $noms, $_POST['nom'], 'false'));
        echo "l'utilisateur a été ajouté";
    }
}

/* cette fonction permet d'afficher les différents groupes sous forme de boutons, ce qui nous permet de changer de groupes*/
function affichergrp($bdd){
    $grps = $bdd->prepare("SELECT * from groupe where email=?");
    $grps->execute(array($_SESSION['Pseudo']));
    ?>

        <div class="Btn_Groupe">
            <h3>Groupe :</h3>
    <form method="post">
        <?php
    while ($grp = $grps->fetch()){
        ?>
    <button type="submit" name="button" value="<?php echo $grp[0]?>"><?php echo $grp[1]?></button>
<?php
    echo '<br>';
    echo '<br>';
    }?>
    </form>
        </div>

<?php
}
/*nous permet d'afficher les différents utilisateurs présents dans le groupe, et de les modifiers/supprimer si nous avons le droit*/
function afficheruser($bdd){
    $users = $bdd->prepare("SELECT * FROM groupe where idgroupe=? and email!=?");
    $users->execute(array($_SESSION['IdChat'], $_SESSION['Pseudo']));
    $admin = $bdd->prepare("SELECT admin FROM groupe where email=?");
    $admin = $admin->execute(array($_SESSION['Pseudo']));
        while ($user = $users->fetch()){?>
                <form method="post">
                    <?php echo $user[2] ;
                    if ($admin==1)?>
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
/*permet de supprimer l'utilisateur du groupe lorsqu'on appuie sur le bouton*/

function supprimer($bdd){
    if (isset($_POST['supprimer'])) {
        $admin = $bdd->prepare("SELECT admin FROM groupe where email=?");
        $admin = $admin->execute(array($_SESSION['Pseudo']));
        if ($admin== 1) {
            $supp = $bdd->prepare("DELETE FROM groupe where email=? and idgroupe=?");
            $supp->execute(array($_POST['supprimer'], $_SESSION['IdChat']));
        }
    }
}

/*permet de passer admin l'utilisateur lorsqu'on appuie sur le bouton*/
function admin($bdd){
    if (isset($_POST['admin'])){
        $admin = $bdd->prepare("SELECT admin FROM groupe where email=?");
        $admin = $admin->execute(array($_SESSION['Pseudo']));
        if ($admin == 1) {
            $admin = $bdd->prepare("UPDATE groupe SET admin ='true' where email=? and idgroupe=?");
            $admin->execute(array($_POST['admin'], $_SESSION['IdChat']));
        }
    }
}

/*permet de supprimer toute la conversation*/

function suppmess($bdd){
    if (isset($_POST['suppmess'])){
        $admin = $bdd->prepare("SELECT admin FROM groupe where email=?");
        $admin = $admin->execute(array($_SESSION['Pseudo']));
        if ($admin == 1) {
            $supp =$bdd->prepare("DELETE FROM message where idgroupe=?");
            $supp->execute(array($_SESSION['IdChat']));
        }
    }
}


inviter($bdd);
creergrp($bdd);
affichergrp($bdd);
afficheruser($bdd);
supprimer($bdd);
admin($bdd);
suppmess($bdd);

/*permet de rediriger sur la bonne page, si la personne qui clique est un étudiant ou un professeur*/
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
<footer>
    <form action="Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>
</html>


