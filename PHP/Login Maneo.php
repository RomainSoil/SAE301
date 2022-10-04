<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="LOGIN.css">
</head>

<body>
<header>
    <a href="Accueil.php">
        <img src="logoIFSI.png" width=150 height=150 alt="" >
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>


<div class="bouton_retour">
    <a href="Accueil.php"> <img src="fleche.png"  class="icone" alt="" > </a>

</div>
<div class="I">
    <h2>INSCRIPTION IFSI</h2>
</div>
<div class ="box">
    <div class="connexion">
        <form method="post">
            <label>Nom :</label>
            <br>
            <label>
                <input type="text" name="nom" id="nom" placeholder="Entrez votre Nom">
            </label>
            <br>
            <label>Prénom :</label>
            <br>
            <label>
                <input type="text" name="prenom" id="prenom" placeholder="Entrez votre Prenom">
            </label>
            <br>
            <label>Email :</label>
            <br>
            <label>
                <input type="text" name="mail" id="mail" placeholder="Entrez votre mail" value="<?php echo @$_POST['mail']?>">
            </label>
            <br>
            <label>Code Confidentiel :</label>
            <br>
            <label>
                <input type="text" name="code" id="code" placeholder="Entrez votre Code">
            </label>
            <br>
                <div>
                    <p><a href="#" class="info">Mot de passe :<span>&ensp;- min une majuscule &ensp;<br> &ensp;- min 8 caractères &ensp;<br>&ensp; - min un chiffre &ensp;</span></a>
                </div>
            <label>
                <input type="password" name="mdp" id="mdp" value="<?php echo @$_POST['mdp']?>" placeholder="Entrez votre mot de passe" >
            </label>
            <button type="button" id="pass1" onclick="changer1()">O</button>
            <br>
            <div>
                <p><a href="#" class="info">Mot de passe :<span>&ensp;- min une majuscule &ensp;<br> &ensp;- min 8 caractères &ensp;<br>&ensp; - min un chiffre &ensp;</span></a>
            </div>
            <label>
                <input type="password" name="mdp2" id="mdp2" value="<?php echo @$_POST['mdp2']?>" placeholder="Confirmez mot de passe">
            </label>
            <button type="button" id="pass2" onclick="changer2()">O</button>
            <br>
            <p><input type="submit" value="Valider" >  </p>
        </form>
    </div>
</div>

<footer>
    <form action="Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>

</body>
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

require('MotDePasse.php');
require('email.php');
require('ConnectionBDD.php');
function bdd($mail, $mdp, $mdp2)
{
    $ClassMail = new email();
    $ClassMDP =new MotDePasse();
    $condition= false;
    if (isset($mail) and isset($mdp) and isset($mdp2)){
        if ($ClassMail->email($mail) and $ClassMDP->password($mdp, $mdp2)) {
            try {
                $conn = new ConnectionBDD();

                $pdo = $conn->connexion();
            } catch (PDOException $e) {
                die ('Erreur : ' . $e->getMessage());
            }

            $hash = password_hash($mdp, PASSWORD_DEFAULT);
            @$code = $_POST['code'];
            @$nom = $_POST['nom'];
            @$prenom =$_POST['prenom'];
            if ($_POST['code']=="P5165156516516@"){
            $sql = "INSERT INTO prof (email,mdp,nom,prenom)
                   VALUES ('$mail','$hash','$nom','$prenom')" ;
            $condition = true;
            }


            elseif ($_POST['code'][0]=="E"){
                $sql = "INSERT INTO etudiant (email,mdp,code,nom,prenom)
                   VALUES ('$mail','$hash','$code','$nom','$prenom')";
                $condition = true;

            }
            if ($condition){
            try {
                $affected = $pdo->exec($sql);
            } catch (PDOException $e) {
                die ($e->getMessage());
            }
            }
        }
    }
}

bdd(@$_POST['mail'],@$_POST['mdp'],@$_POST['mdp2']);
?>