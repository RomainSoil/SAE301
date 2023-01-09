<?php
session_start();
require ('ConnectionBDD.php');
$conn= ConnectionBDD::getInstance();
$bdd=$conn::getpdo();
/* fonction qui permet de récupérer les id de la table BesoinDaide*/
$tous = $bdd->query("SELECT idba FROM BesoinDaide");
/*on récupère l'id de la personne qui est connecté */
@$pseudo = $_SESSION['username'];
@$pseudo2 = $pseudo[0];
$pseudo2 .= " ";
@$pseudo2 .= $pseudo[1];
$_SESSION['PseudoChat']=$pseudo2;
/* ce if permet d'envoyer des messages*/
if (isset($_POST['message'])) {
    $message = nl2br(htmlspecialchars($_POST['message']));
    $pseudo = $_SESSION['Pseudo'];
    $insertMsg = $bdd->prepare('INSERT INTO messageaide(userx,textmessage, idgroupe, email) VALUES(?, ?, ?, ?)');
    $insertMsg->execute(array($pseudo2, $message, $_SESSION['IdChat'], $pseudo));
    header('Location: BesoinAide.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BesoinD'aide</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="chat.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<header>
    <a href="Accueil.php">
        <img src="image/logoIFSI.png" width=234 height=125 alt="" >
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br>
</header>

<div class="information">
    <h2>Besoin d'aide</h2>
    <br>
    <h3>Le sujet est : <?php echo $_SESSION['sujet'] ?></h3>
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
/**
 * @param $bdd
 * @return void
 */
function creergrp($bdd)
{
    if (isset($_POST['sujet'])){
        $creer = $bdd->prepare("INSERT INTO besoindaide(sujet, email) values (?, ?)");
        $creer->execute(array($_POST['sujet'], $_SESSION['Pseudo']));
        $newid = $bdd->query("SELECT idba from besoindaide order by idba desc ");
        $newgrp = $newid->fetch()[0];
        $_SESSION['IdChat']=$newgrp;
        header('Location: BesoinAide.php');
    }}
/*cette fonction permet d'ajouter une personne dans le groupe ou nous sommes*/


/* cette fonction permet d'afficher les différents groupes sous forme de boutons, ce qui nous permet de changer de groupes*/
/**
 * @param $bdd
 * @return void
 */
function affichergrp($bdd){
    $grps = $bdd->prepare("SELECT * from besoindaide");
    $grps->execute();
    ?>
    <!--Zone groupe-->

    <div class="Btn_Groupe">
        <button type="submit" name="creer" id="creer" onclick="afficher()">Créer groupe</button>
        <form style="visibility: hidden" id="form" method="post">
            <input type="text" placeholder="Sujet du groupe" id="nomgrp" name="sujet">
            <input name="valider" id="valider" type="submit">
        </form>

        <h3>Sujet :</h3>
        <form method="post">
            <?php
            while ($grp = $grps->fetch()){
                ?>
                <button type="submit" name="button" value="<?php echo $grp[0]."+".$grp[1]?>"><?php echo $grp[1]?></button>
                <?php
                echo '<br>';
                echo '<br>';
            }?>
        </form>
    </div>

    <section id="messages"></section>
    <script>
        setInterval('load_messages()',500);
        function load_messages(){
            $('#messages').load('loadAide.php');
        }
    </script>
    <?php
}
/*nous permet d'afficher les différents utilisateurs présents dans le groupe, et de les modifiers/supprimer si nous avons le droit*/



if (isset($_POST['button'])){
    $but = $_POST['button'];
    $t = false;
    $a="";
    $b="";
    for ($i=0; $i<strlen($but);$i++){
        if ($but[$i]=='+'){
            $t = true;
        }
        elseif (!$t){
            $a = $a.$but[$i];
        }
        elseif($t){
            $b = $b.$but[$i];
        }
    }
    $_SESSION['IdChat']=$a;
    $_SESSION['sujet']=$b;
    header('Location: BesoinAide.php');
}
/*permet de supprimer l'utilisateur du groupe lorsqu'on appuie sur le bouton*/



/*permet de passer admin l'utilisateur lorsqu'on appuie sur le bouton*/


/*permet de supprimer toute la conversation*/



creergrp($bdd);
affichergrp($bdd);

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
</body>
</html>


