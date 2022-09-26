<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="Accueil.css" />
</head>
<body>
<br><br><br><br>
<header>
<div class="a">
    <br>
    <h2> Institut de Formation aux Soins Infirmiers (IFSI)</h2>
    <br><br><br><br>
</div></header>
<div class="f">
    <h3>Entrez votre identifiant et votre mot de passe</h3> <br>
<form action="" method="post">
     <input type="text" name="id" id="id" placeholder="Identifiant"><br><br>
    <input type="text" name="mdp" placeholder="Mot de passe"><br><br>
    <input type="submit" value="Confirmer">
</form>
</div>
<div class="compte">
    <br><br><br>
    <a href="Login2.php">créer un compte</a><br><br>
    <a href="https://sesame.uphf.fr/identifiants.html">Mot de passe oublié</a><br><br>
    <a href="https://cas.uphf.fr/login-help/">Besoin d'aide</a><br><br>
</div>

<footer>
    <div class="sec">
    Pour des raisons de sécurité, veuillez vous déconnecter et fermer votre navigateur lorsque vous avez fini d'accéder aux services authentifiés.
    <br>
    Vos identifiants sont strictement confidentiels et ne doivent en aucun cas être transmis à une tierce personne.
    </div>
</footer>
</body>
</html>

<?php
function email($mail, $mdp){
    try {
                $pdo = new PDO(
                    'pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134', 'iutinfo134', 'NuVRPnlV');
            } catch (PDOException $e) {
                die ('Erreur : ' . $e->getMessage());
            }
            $sql = "SELECT * FROM ETUDIANT where email = '$mail'";
            try {
                $affected = $pdo->prepare($sql);
                $affected->execute();
            } catch (PDOException $e) {
                die ($e->getMessage());

            }
            while ($row = $affected->fetch(PDO::FETCH_ASSOC)){
                echo $row['email'];
                echo " ";
                if(password_verify($mdp, $row['mdp']) and $row['email']==$mail){
                    header('Location: http://localhost:63342/SAE301/PHP/TestConnexion.php?_ijt=v8g6ukbvhf6dap3401h81jkam&_ij_reload=RELOAD_ON_SAVE');
                    exit();
                }
            }
}
@email($_POST['id'], $_POST['mdp']);


?>