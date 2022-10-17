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
    <div class="btn-group">
        <button class="button" onclick="document.location='ScenarioProf/PageProf.php'">Accueil</button>
        <button class="button" onclick="document.location='ScenarioProf/CreateScenario.php'">Scénario</button>
        <button class="button" onclick="document.location='ScenarioProf/Correction.php'">Correction</button>
        <button class="button" onclick="document.location='ScenarioProf/Note.php'">Note</button>
        <button class="button" onclick="document.location='chat.php'">Message </button>

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