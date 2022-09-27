<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
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
    <label for="id"></label><input type="text" name="id" id="id" placeholder="Identifiant" value="<?php if(isset($_SESSION['user'])){echo $_SESSION['user'];}else{echo 'ya pas';}?>"><br><br>
    <label>
        <input type="password" name="mdp" placeholder="Mot de passe" id="mdp">
        <button type="button" onclick="changer3()">O</button>
    </label><br><br>
    <input type="submit" value="Confirmer">
</form>
</div>
<div class="compte">
    <br><br><br>
    <a href="http://localhost:63342/SAE301/PHP/Login%20Maneo.php?_ijt=7n0rkma2mjga775ofanok13lvb&_ij_reload=RELOAD_ON_SAVE">créer un compte</a><br><br>
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
function email($mail, $mdp): void
{
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
<script>
    j=true;
    function changer3(){
        if (j){
            document.getElementById('mdp').setAttribute('type', 'text')
            j=false;
        }
        else{
            document.getElementById('mdp').setAttribute('type', 'password')
            j=true;
        }
    }
</script>
