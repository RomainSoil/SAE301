<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>

<div class="fontHead">
<header>
    <a href="../Accueil.php">
        <img src="../logoIFSI.png" width=50 height=50 alt="" >
    </a>
    <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
    <br>
</header>
</div>
<div class="font">
    <div class="deco">
        <a href="../Accueil.php"> <img src="../retour.png" class="icone" width=50 height=50 alt="" > </a>
    </div>
</div>

<div class="font">
<div class="btn-group">
    <button class="button" onclick="document.location='PageProf.php'">Accueil</button>
    <button class="button" onclick="document.location='CreateScenario.php'">Scénario</button>
    <button class="button" onclick="document.location='Correction.php'">Correction</button>
    <button class="button" onclick="document.location='Note.php'">Note</button>
    <button class="button" onclick="document.location='../chat.php'">Message </button>

</div>
    <br>
</div>
<div class="texte">
    Bienvenue, sur le site de l'IFSI consacré à la création de scénario <br>
    Vous avez accès à la partie de création de scénario, <br>
    mais aussi une partie correction et note. <br>
    Vous pouvez également consulter votre messagerie.


</div>
</body>
</html>

<?php
?>
