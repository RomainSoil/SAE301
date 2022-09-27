<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="LOGIN.css" />
</head>
<header>
    <div id ="texte">
        <h1>Institut de Formation aux Soins Infirmiers</h1>
    </div>
</header>

<body>
<div class="bouton_retour">
    <button type="button" onclick="window.location.href = 'http://localhost:63342/SAE301/PHP/Accueil.php?_ijt=hc9rcqul6ohaipakc2nt3pu3k7&_ij_reload=RELOAD_ON_SAVE'">Retour</button>
</div>
<div class ="box">
    <div class="connexion">
        <form action="" method="post">
            <label for="">Email :</label>
            <br>
            <label>
                <input type="text" name="mail" id="mail" placeholder="Entrez votre mail" value="<?php echo @$_POST['mail']?>"/>
            </label>
            <br>
            <label for="">Mot de passe : </label>
            <br>
            <label>
                <input type="password" name="mdp" id="mdp" value="<?php echo @$_POST['mdp']?>" placeholder="Entre votre mot de passe"/>
                <button type="button" id="pass1" onclick="changer1()">O</button>
            </label>
            <br>
            <label for="">Mot de passe : </label>
            <br>
            <label>
                <input type="password" name="mdp2" id="mdp2" value="<?php echo @$_POST['mdp2']?>" placeholder="Confirmez mot de passe"/>
            </label>
            <button type="button" id="pass2" onclick="changer2()">O</button>
            <br>
            <p><input type="submit" value="Valider" onclick="" </p>
        </form>
    </div>
</div>


</body>
<footer>
    <div class="texte_footer">
        <button id="pass">Besoin d'aide ?</button>
    </div>
</footer>
</html>

<?php
session_start();
function password($mdp, $mdp2): bool
{
    $complete= false;
    if ($mdp == null or $mdp2 == null) {
        echo "<span style='color: red' >entrez un mot de passe</span>";
        $_POST['mail'] = "dsf";
    } elseif ($mdp != $mdp2) {
        echo "<span style='color: red' >mots de passes differents</span>";
    }
    else {
        $maj = false;
        $num = false;
        if (strlen($mdp) < 8) {
            echo "Mot de passe trop court";
        }
        for ($i = 0; $i < strlen($mdp); $i++) {
            if (ord($mdp[$i]) < 91 and ord($mdp[$i]) > 64) {
                $maj = true;
            }
            if (ord($mdp[$i]) < 58 and ord($mdp[$i]) > 47) {
                $num = true;
            }
        }
        if (!$maj) {
            echo "Il faut une majuscule";
        } elseif (!$num) {
            echo "il faut un numero";
        }
        else{
            $complete= true;
        }
    }
    echo "<br>";
    return $complete;
}
function email($mail): bool
{
    $aro = false;
    $esp = false;
    $ok = false;
    if (strlen($mail)>0){
        for ($i = 0; $i < strlen($mail); $i++) {
            if ($mail[$i] == "@") {
                $aro = true;
            }
            if ($mail[$i] == " ") {
                $esp = true;
            }
        }
    }
     if (!$aro) {
            echo "Il n'y a pas de @";
        } elseif ($esp) {
            echo "il y a un espace";

    }
     else{
         $ok=true;
     }
     return ($ok);
}
?>

<script>
    e=true;
    f=true;
    function changer1(){
        if (e) {
            document.getElementById("mdp").setAttribute("type", "text");
            e = false;
        } else {
            document.getElementById("mdp").setAttribute("type", "password");
            e = true;
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
    if(isset($mail) and isset($mdp2) and isset($mdp)) {
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
            @$_SESSION['user']=$_POST['mail'];
            echo $_SESSION['user'];
            header('Location: http://localhost:63342/SAE301/PHP/Accueil.php?_ijt=ecfct5prke6lggs6rfp0mp0lov&_ij_reload=RELOAD_ON_SAVE');
        }
    }
}
bdd(@$_POST['mail'],@$_POST['mdp'],@$_POST['mdp2']);
?>