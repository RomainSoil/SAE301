<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="LOGIN.css" />
</head>
<header>
    <img src="logoIFSI.png" width=10% height=10%/>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>

<body>
<div class="bouton_retour">
    <a href="Accueil.php"> <img src="fleche.png"  class="icone"> </a>

</div>
<div class="I">
    <h2>INSCRIPTION IFSI</h2>
</div>
<div class ="box">
    <div class="connexion">
        <form action="" method="post">
            <label for="">Nom :</label>
            <br>
            <label>
                <input type="text" name="mail" id="mail" placeholder="Entrez votre Nom">
            </label>
            <br>
            <label for="">Prénom :</label>
            <br>
            <label>
                <input type="text" name="mail" id="mail" placeholder="Entrez votre Prenom">
            </label>
            <br>
            <label for="">Email :</label>
            <br>
            <label>
                <input type="text" name="mail" id="mail" placeholder="Entrez votre mail" value="<?php echo @$_POST['mail']?>"/>
            </label>
            <br>
            <label for="">Code Confidentiel :</label>
            <br>
            <label>
                <input type="text" name="mail" id="mail" placeholder="Entrez votre Code">
            </label>
            <br>
            <label for="">Mot de passe : </label>
            <br>
            <label>
                <input type="password" name="mdp" id="mdp" value="<?php echo @$_POST['mdp']?>" placeholder="Entre votre mot de passe"id="mdp"/>
                <button type="button" id="pass1" onclick="changer1()">O</button>
            </label>
            <br>
            <label for="">Mot de passe : </label>
            <br>
            <label>
                <input type="password" name="mdp2" id="mdp2" value="<?php echo @$_POST['mdp2']?>" placeholder="Confirmez mot de passe" id="mdp2"/>
            </label>
            <button type="button" id="pass2" onclick="changer2()">O</button>
            <br>
            <p><input type="submit" value="Valider"   </p>
        </form>
    </div>
</div>


</body>
<footer>
    <div class="texte_footer">
        <button id="pass" onclick="changer()">Besoin d'aide ?</button>
    </div>
</footer>
</html>

<script>
    e=true;
    f=true;
    function changer1(){
        if(e){
            document.getElementById("mdp").setAttribute("type","text");
            e=false;
        }
        else{
            document.getElementById("mdp").setAttribute("type","password");
            e=true;
        }
    }
    function changer2(){
        if (f){
            document.getElementById("mdp2").setAttribute("type","text")
            f=false;
        }
        else{
            document.getElementById("mdp2").setAttribute("type","password");
            f=true;
        }
    }
</script>

<?php

require('email.php');
require('MotDePasse.php');
require('ConnectionBDD.php');
function bdd($mail, $mdp, $mdp2)
{
    if(@strlen($_POST['mdp']>1) or @strlen($_POST['mdp']>1) or @strlen($_POST['mail']>1)) {
        if (@email($mail) and @password($mdp, $mdp2)) {
            try {
                $conn = new ConnectionBDD();
                $pdo = $conn->connexion();

            } catch (PDOException $e) {
                die ('Erreur : ' . $e->getMessage());
            }

            $hash = password_hash($mdp, PASSWORD_DEFAULT);
            $sql = "INSERT INTO etudiant (email,mdp)
                   VALUES ('$mail','$hash')";

            try {
                $affected = $pdo->exec($sql);
            } catch (PDOException $e) {
                die ($e->getMessage());

            }
        }
    }
}

bdd(@$_POST['mail'],@$_POST['mdp'],@$_POST['mdp2']);
?>