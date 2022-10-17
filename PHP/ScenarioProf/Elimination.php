<?php
session_start();
@$_SESSION['massage']=$_POST['massage'];
@$_SESSION['entretien']=$_POST['entretien'];
@$_SESSION['accueil']=$_POST['accueil'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="Scenario.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>

<div class="fontHead">
    <header>
        <a href="../Accueil.php">
            <img src="../logoIFSI.png" width=150 height=150 alt="" >
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
        <button class="button" onclick="document.location='Securite.php'">Sécurité</button>
        <button class="button" onclick="document.location='Diagnostic.php'">Diagnostic</button>
        <button class="button" onclick="document.location='Soins.php'">Soins Relationnel</button>
        <button class="button_select" onclick="document.location='Elimination.php'">Elimination </button>
        <button class="button" onclick="document.location='Cardio.php'">Cardio </button>
        <button class="button" onclick="document.location='Radio.php'">Radio </button>
        <button class="button" onclick="document.location='Mobilite.php'">Mobilité </button>
        <button class="button" onclick="document.location='Hygiene.php'">Hygiène </button>
        <button class="button" onclick="document.location='Alimentation.php'">Alimentation </button>
        <button class="button" onclick="document.location='Neuro.php'">Neuro </button>
    </div>
</div>


</div>
<body>
<form action="Cardio.php">
    Le patient a t-il eu des selles ?:
    <input type="radio" name="selles" value="oui">oui
    <input type="radio" name="selles" value="non">non
    <br>
    Le patient a t-il eu des gaz ?:
    <input type="radio" name="gaz" value="oui">oui
    <input type="radio" name="gaz" value="non">non
    <br>
    Le patient a t-il uriner :
    <input type="radio" name="urine" value="oui">oui
    <input type="radio" name="urine" value="non">non
    <br>
    <br>
</form>
</body>
</html>

<?php
?>
