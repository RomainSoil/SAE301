<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="PageProf.css">
    <script type="text/javascript" src="../LesFonctionsJS.js"></script>

</head>

<body>
<!--Le haut de la page avec l'image et le titre-->
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
        <button class="button" onclick="document.location=">Message </button>

    </div>
    <br>
</div>
</div>
<br><br><br>

<div class="typeScenario">
    <div class="btn-group">
        <button class="button" onclick="document.location='Patient.php'">Patient</button>
        <button class="button" onclick="document.location='CreateScenario.php'">Sécurité</button>
        <button class="button" onclick="document.location='Correction.php'">Diagnostic</button>
        <button class="button" onclick="document.location='Note.php'">Soins</button>
        <button class="button" onclick="document.location=">Elimination </button>
        <button class="button" onclick="document.location=">Cardio </button>
        <button class="button" onclick="document.location=">Radio </button>
        <button class="button" onclick="document.location=">Mobilité </button>
        <button class="button" onclick="document.location=">Hygiène </button>
        <button class="button" onclick="document.location=">Alimentation </button>
        <button class="button" onclick="document.location=">Neuro </button>

    </div>
    <br>
</div>
</body>
</html>

    <!--Le bas de page avec le boutton si on a besoin d'aide-->
    <footer>
        <form action="../Accueil.php" method="post">
            <input type="submit" value="Besoin d'aide ?">
        </form>
    </footer>

</body>
</html>

    <?php



