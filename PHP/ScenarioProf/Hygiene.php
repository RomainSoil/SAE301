<?php
session_start();
@$_SESSION['AideMarche']=$_POST['AideMarche'];
@$_SESSION['AideLever']=$_POST['AideLever'];
@$_SESSION['AideCoucher']=$_POST['AideCoucher'];
@$_SESSION['AideFauteil']=$_POST['AideFauteil'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="Patient.css" >
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
        <button class="button" onclick="document.location=">Message </button>

    </div>
    <br>
</div>


<div class="fontHead">
    <br>
    <div class="btn-scenario">
        <button class="button" onclick="document.location='Patient.php'">Patient</button>
        <button class="button" onclick="document.location='Diagnostic.php'">Diagnostic</button>
        <button class="button" onclick="document.location='Securite.php'">Sécurité</button>
        <button class="button" onclick="document.location='Soins.php'">Soins Relationnel</button>
        <button class="button" onclick="document.location='Elimination.php'">Elimination </button>
        <button class="button" onclick="document.location='Cardio.php'">Cardio </button>
        <button class="button" onclick="document.location='Radio.php'">Radio </button>
        <button class="button" onclick="document.location='Mobilite.php'">Mobilité </button>
        <button class="button_select" onclick="document.location='Hygiene.php'">Hygiène </button>
        <button class="button" onclick="document.location='Alimentation.php'">Alimentation </button>
        <button class="button" onclick="document.location='Neuro.php'">Neuro </button>
    </div>
</div>


<body>
<form action="Alimentation.php" method="post">
    Le patient a t-il eu une toilette ?:
    <input type="radio" name="toilette" value="oui" required>oui
    <input type="radio" name="toilette" value="non" required>non
    <br>
    Le patient a t-il eu douche ?:
    <input type="radio" name="douche" value="oui" required >oui
    <input type="radio" name="douche" value="non" required>non
    <br>
    Le patient a t-il eu un bain :
    <input type="radio" name="bain" value="oui" required>oui
    <input type="radio" name="bain" value="non" required>non
    <br>
    Le patient a t-il eu une refection de lit :
    <input type="radio" name="refectionLit" value="oui" required>oui
    <input type="radio" name="refectionLit" value="non" required>non
    <br>
    Le patient a t-il eu une change:
    <input type="radio" name="change" value="oui" required>oui
    <input type="radio" name="change" value="non" required>non
    <br>
    Le patient a t-il eu un soin de bouche :
    <input type="radio" name="soinBouche" value="oui" required>oui
    <input type="radio" name="soinBouche" value="non" required>non
    <br>
    Le patient a t-il eu une prévention d'escare :
    <input type="radio" name="escare" value="oui" required>oui
    <input type="radio" name="escare" value="non" required>non
    <br>
    Le patient a t-il changer de position :
    <input type="radio" name="position" value="oui" required>oui
    <input type="radio" name="position" value="non" required>non
    <br>
    Le patient a t-il eu un matelas à l'air :
    <input type="radio" name="matelas" value="oui" required>oui
    <input type="radio" name="matelas" value="non" required>non
    <br>
</form>
</body>
</html>

<?php
?>
