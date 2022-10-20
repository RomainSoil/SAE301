<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="LOGIN.css">
    <script type="text/javascript" src="LesFonctionsJS.js"></script>

</head>

<body>
<!--Le haut de la page avec l'image et le titre-->

<header>
    <a href="Accueil.php">
        <img src="image/logoIFSI.png" width=150 height=150 alt="" >
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>

<!--La fleche pour revenir sur la page accueil-->

<div class="bouton_retour">
    <a href="Accueil.php"> <img src="fleche.png"  class="icone" alt="" > </a>

</div>
<!--La box de l'inscription-->

<div class="I">
    <h2>INSCRIPTION IFSI</h2>
</div>
<div class="connexion">
        <form method="post">
            <label>Nom :</label>
            <br>
            <label>
                <input type="text" name="nom" id="nom" value="<?php echo @$_POST['nom']?>" placeholder="Entrez votre Nom" required>
            </label>
            <br>
            <label>Prénom :</label>
            <br>
            <label>
                <input type="text" name="prenom" id="prenom" value="<?php echo @$_POST['prenom']?>" placeholder="Entrez votre Prenom" required>
            </label>
            <br>
            <label>Email :</label>
            <br>
            <label>
                <input type="email" name="mail" id="mail" placeholder="Entrez votre mail" value="<?php echo @$_POST['mail']?>" required>
            </label>
            <br>
            <label>Code Confidentiel :</label>
            <br>
            <!--le code peut être commun-->
            <label>
                <input type="text" name="code" id="code" value="<?php echo @$_POST['code']?>" placeholder="Entrez votre Code" required>
            </label>
            <br>
                <div>
                    <p><a href="#" class="info">Mot de passe :<span>&ensp;- min une majuscule &ensp;<br> &ensp;- min 8 caractères &ensp;<br>&ensp; - min un chiffre &ensp;</span></a>
                </div>
            <label>
                <input type="password" name="mdp" id="mdp"  placeholder="Entrez votre mot de passe" required>
            </label>
            <button type="button" id="pass1" onclick="changer('mdp')">O</button>
            <br>
            <div>
                <p><a href="#" class="info">Mot de passe :<span>&ensp;- min une majuscule &ensp;<br> &ensp;- min 8 caractères &ensp;<br>&ensp; - min un chiffre &ensp;</span></a>
            </div>
            <label>
                <input type="password" name="mdp2" id="mdp2" placeholder="Confirmez mot de passe" required>
            </label>
            <button type="button" id="pass2" onclick="changer('mdp2')">O</button>
            <br>
            <input type="submit" value="Valider" > </p>
        </form>
</div>

<!--Le bas de page avec le boutton si on a besoin d'aide-->

<footer>
    <form action="Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>

</body>
</html>



<?php
require ('Premier.php');
require('MotDePasse.php');
require('email.php');
require('ConnectionBDD.php');
function bdd($mail, $mdp, $mdp2){
    $sess = new Premier();
    $sess->premier('premier');
    $ClassMail = new email();
    $ClassMDP =new MotDePasse();
    $condition= false;
    @$nom = $_POST['nom'];
    @$prenom = $_POST['prenom'];
    @$code = $_POST['code'];
    if ($_SESSION['premier']==2) {
        {
            if ($ClassMail->email($mail) and $ClassMDP->password($mdp, $mdp2)) {
                try {
                    $conn = ConnectionBDD::getInstance();

                    $pdo = $conn->connexion();
                } catch (PDOException $e) {
                    die ('Erreur : ' . $e->getMessage());
                }

                $hash = password_hash($mdp, PASSWORD_DEFAULT);
                if ($_POST['code'] == "P5165156516516@") {
                    $sql = "INSERT INTO prof (email,mdp,nom,prenom)
                    VALUES (:mail,:hash,:nom,:prenom)";
                    $condition = true;
                    $req=$pdo->prepare($sql);
                    $req->bindParam('mail',$mail, PDO::PARAM_STR);
                    $req->bindParam('hash',$hash, PDO::PARAM_STR);
                    $req->bindParam('nom',$nom, PDO::PARAM_STR);
                    $req->bindParam('prenom',$prenom, PDO::PARAM_STR);

                    header('Location: Accueil.php');
                    $_SESSION['page'] = true;
                }
                elseif ($_POST['code'][0] == "E") {
                    $sql = "INSERT INTO etudiant (email,mdp,code,nom,prenom)
                            VALUES (:mail,:hash,:code,:nom,:prenom)";
                    $condition = true;
                    $req=$pdo->prepare($sql);
                    $req->bindParam('mail',$mail, PDO::PARAM_STR);
                    $req->bindParam('hash',$hash, PDO::PARAM_STR);
                    $req->bindParam('nom',$nom, PDO::PARAM_STR);
                    $req->bindParam('prenom',$prenom, PDO::PARAM_STR);
                    $req->bindParam('code',$code, PDO::PARAM_STR);
                    header('Location: Accueil.php');
                    $_SESSION['page'] = true;
                                }
                else {
                    echo '<script>alert("Le code n\'est pas valide")</script>';
                                }
                if ($condition) {
                    try {
                        $req->execute();
                        $req->setFetchMode(PDO::FETCH_ASSOC);

                        $add = $pdo->prepare("INSERT INTO email values (?)");
                        $add->execute(array($mail));
                    }
                    catch (PDOException $e) {
                                        die ($e->getMessage());
                    }
                }


    }

}}}
@bdd($_POST['mail'],$_POST['mdp'],$_POST['mdp2']);

?>