<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="LOGIN.css" />
</head>

<body>
<header>
    <a href="Accueil.php">
        <img src="logoIFSI.png" width=150 height=150 alt="" />
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
                <input type="text" name="mail" id="mail" placeholder="Entrez votre mail" value="<?php echo @$_POST['mail']?>"/>
            </label>
            <br>
            <label>Code Confidentiel :</label>
            <br>
            <label>
                <input type="text" name="code" id="code" placeholder="Entrez votre Code">
            </label>
            <br>
            <label>Mot de passe : </label>
            <br>
            <label>
                <input type="password" name="mdp" id="mdp" value="<?php echo @$_POST['mdp']?>" placeholder="Entrez votre mot de passe" />
            </label>
            <button type="button" id="pass1" onclick="changer1()">O</button>
            <br>
            <label>Mot de passe : </label>
            <br>
            <label>
                <input type="password" name="mdp2" id="mdp2" value="<?php echo @$_POST['mdp2']?>" placeholder="Confirmez mot de passe" />
            </label>
            <button type="button" id="pass2" onclick="changer2()">O</button>
            <br>
            <p><input type="submit" value="Valider" />  </p>
        </form>
    </div>
</div>
<footer>
    <div class="texte_footer">
        <button id="pass" onclick="changer()">Besoin d'aide ?</button>
    </div>
</footer>

</body>
</html>

<?php
function password($mdp, $mdp2)
{
    $complete= false;
    if ($mdp == null or $mdp2 == null) {
        echo "<span style='color: red' >entrez un mot de passe</span>";
        $_POST['mail'] = "dsf";
    } elseif ($mdp != $mdp2) {
        echo "<span style='color: red ' >mots de passes differents</span>";
    }
    elseif ($mdp != null) {
        $maj = false;
        $num = false;
        if (strlen($mdp) < 8) {
            echo "Mot de passe trop court";
        }
        for ($i = 0; $i < strlen($mdp); $i++) {
            if (ord($mdp[$i]) < 91 and ord($mdp[$i]) > 64) /// Vérifie qu 'il y a au moins une majuscule dans le code
            {
                $maj = true;
            }
            if (ord($mdp[$i]) < 58 and ord($mdp[$i]) > 47) /// Vérifie qu 'il y a au moins un nombre dans le code
            {
                $num = true;
            }
        }
        if ($maj == false) {
            echo "Il faut une majuscule";
        } elseif ($num == false) {
            echo "il faut un numero";
        }
        else{
            $complete= true;
        }
    }
    echo "<br>";
    return $complete;
}
function email($mail)
{
    $valide= false;
    $aro = false;
    $esp = false;
    if (strlen($mail)>0){
        for ($i = 0; $i < strlen($mail); $i++) /// Vérifie qu 'il y a un @ dans l'email
        {
            if ($mail[$i] == "@")
                if ($aro==true)     /// vérifie qu'il n' y a pas plusieur @ dans le mail
                {
                    $aro = false;
                    break;
                }
            {
                $aro = true;

            }
            if ($mail[$i] == " ") ///vérifie qu'il n' y a pas d'espace dans l'adresse mail
            {
                $esp = true;
            }
        }
    }
     if ($aro == false) {
            echo "Ceci n'est pas une adresse mail valide";
        } elseif ($esp == true) {
            echo "il y a un espace";
    }
     else{
         $valide= true;
     }
     return $valide;
}
?>

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
function bdd($mail, $mdp, $mdp2)
{
    if(@strlen($_POST['mdp']>1) or @strlen($_POST['mdp']>1) or @strlen($_POST['mail']>1)) {
        if (@email($mail) and @password($mdp, $mdp2)) {
            try {
                $pdo = new PDO(
                    'pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134', 'iutinfo134', 'NuVRPnlV');
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