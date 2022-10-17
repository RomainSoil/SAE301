<?php
session_start();
@$_SESSION['nomIntervenant']=$_POST['nomIntervenant'];
@$_SESSION['prenomIntervenant']=$_POST['prenomIntervenant'];
@$_SESSION['diagnostic']=$_POST['diagnostic'];

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
        <button class="button" onclick="document.location='../chat.php'">Message </button>

    </div>
    <br>
</div>


<div class="fontHead">
    <br>
    <div class="btn-scenario">
        <button class="button" onclick="document.location='Patient.php'">Patient</button>
        <button class="button" onclick="document.location='Diagnostic.php'">Diagnostic</button>
        <button class="button" onclick="document.location='Securite.php'">Sécurité</button>
        <button class="button_select" onclick="document.location='Soins.php'">Soins Relationnel</button>
        <button class="button" onclick="document.location='Elimination.php'">Elimination </button>
        <button class="button" onclick="document.location='Cardio.php'">Cardio </button>
        <button class="button" onclick="document.location='Radio.php'">Radio </button>
        <button class="button" onclick="document.location='Mobilite.php'">Mobilité </button>
        <button class="button" onclick="document.location='Hygiene.php'">Hygiène </button>
        <button class="button" onclick="document.location='Alimentation.php'">Alimentation </button>
        <button class="button" onclick="document.location='Neuro.php'">Neuro </button>
    </div>
</div>
<body>
<div class="Titre">
    <h1>Soins Relationnel du patient</h1>
</div>
<form action="Elimination.php" method="post">
    Le patient est-il passé par l'accueil:
    <input type="radio" name="accueil" value="oui"readonly>oui
    <input type="radio" name="accueil" value="non"required>non
    <br><br>
    Le patient a t-il eu un entretien avec un infirmier?:
    <input type="radio" name="entretien" value="oui"required>oui
    <input type="radio" name="entretien" value="non"required>non
    <br><br>
    Le patient a t-il eu un toucher ou un massage :
    <input type="radio" name="massage" value="oui">oui
    <input type="radio" name="massage" value="non">non
    <br>
    <br>
    <div class="button_Suivant">
        <input type="submit" value="Valider">
    </div>
</form>
<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>
</html>

<?php
?>
