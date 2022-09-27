<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="MotDePasseOublie.css" />
</head>
<header>
    <img src="logoIFSI.png" width=10% height=10%/>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>

<body>

<div class="bouton_retour">
    <form action="Accueil.php" method="post">
    <input type="submit" value="Retour">
    </form>
</div>


<div class="mess">
<text> Entrez votre Email, vous allez recevoir un mail pour vérifier votre identitée </text>
</div>

<div class ="box">

        <form action="" method="post">

            <br>
            <label for="">Email :</label>
            <br>
            <input type="text" name="mail" placeholder="Entrez votre Email"/>
            <br>
            <br>
            <input type="text" name="mailV2" placeholder="Confirmez votre Email"/>
            <br>
            <p><input type="submit" value="Valider"></p>
        </form>

</div>


</body>
<footer>
        <div class="sec">
            Pour des raisons de sécurité, veuillez vous déconnecter et fermer votre navigateur lorsque vous avez fini d'accéder aux services authentifiés.
            <br>
            Vos identifiants sont strictement confidentiels et ne doivent en aucun cas être transmis à une tierce personne.
        </div>
</footer>

</html>
