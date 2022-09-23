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
    <input type="submit" value="Retour">
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
            <p><input type="submit" value="Valider" onclick="valider()" </p>
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

<?php
function password($mdp, $mdp2)
{
    if ($mdp == null or $mdp2 == null) {
        echo "<span style='color: red' >entrez un mot de passe</span>";
        $_POST['mail'] = "dsf";
    } elseif ($mdp != $mdp2) {
        echo "<span style='color: red' >mots de passes differents</span>";
    }
    elseif ($mdp != null) {
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
        if ($maj == false) {
            echo "Il faut une majuscule";
        } elseif ($num == false) {
            echo "il faut un numero";
        }
        else{
            return true;
        }
    }
    echo "<br>";
}
function email($mail)
{
    $aro = false;
    $esp = false;
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
    if ($aro == false) {
        echo "Il n'y a pas de @";
    } elseif ($esp == true) {
        echo "il y a un espace";
    }
    else{
        return true;
    }
}
if(@strlen($_POST['mdp']>1) or @strlen($_POST['mdp']>1) or @strlen($_POST['mail']>1)){
    @password($_POST['mdp'], $_POST['mdp2']);
    @email($_POST['mail']);
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

