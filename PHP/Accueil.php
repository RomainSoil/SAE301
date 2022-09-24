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
<form action="TestConnexion.php" method="post">
     <input type="text" name="id" placeholder="Identifiant"><br><br>
    <input type="text" name="mdp" placeholder="Mot de passe"><br><br>
    <input type="submit" value="Confirmer">
</form>
</div>
<div class="compte">
    <br><br><br>
    <a href="LOGIN.php">créer un compte</a><br><br>
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
function verifConn(string $ID, string $mdp){
    $listID= array();
    try {
        $pdo = new PDO(
            'pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo70', 'iutinfo70', 'mh8cvgzj');
    } catch (PDOException $e) {
        die ('Erreur : ' . $e->getMessage());
    }

    $req= "SELECT email FROM etudiant";

    try{
        foreach ($pdo->query($req) as $row){
            array_push($listID,$row['email']);
        }
    } catch (PDOException $e) {
        die ($e->getMessage());
    }

}

?>