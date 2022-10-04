<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="MotDePasseOublie.css">
</head>
<body>
<header>
    <a href="Accueil.php">
        <img src="logoIFSI.png" width=150 height=150 alt="">
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br><br>
</header>



<div class="mess">
    Entrez votre nouveau mot de passe, <br>
        Puis retournez vous connecter.
</div>
<br>

<div class ="box">

    <form action="MotDePasseOublie.php" method="post">

        <br>
        <label>Nouveau Mot de passe :</label>
        <br><br>
        <input type="text" name='mail' placeholder="Entrez votre nouveau MDP">
        <br>
        <br>
        <label>Confirmez votre Mot de passe :</label>
        <br><br>
        <input type="text" name='mailV2' placeholder="Confirmez votre MDP">
        <br>
        <p><input type="submit" value="Valider"></p>
    </form>

</div>



<footer>
    <form action="Login%20Maneo.php" method="post">
        <input type="submit" value="Créer un compte">
    </form> <br>
    <form action="Accueil.php" method="post">
        <input type="submit" value="Connexion">
    </form> <br>
    <form action="Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>

</html>
<?php ?>
