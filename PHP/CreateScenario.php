<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="PageProf.css">
    <script type="text/javascript" src="LesFonctionsJS.js"></script>

</head>

<body>
<!--Le haut de la page avec l'image et le titre-->
<div class="fontHead">
    <header>
        <a href="Accueil.php">
            <img src="logoIFSI.png" width=150 height=150 alt="" >
        </a>
        <h1> Institut de Formation aux Soins Infirmiers (IFSI)</h1>
        <br>
    </header>
</div>
<div class="font">
    <div class="deco">
        <a href="Accueil.php"> <img src="retour.png"  class="icone" width=50 height=50 alt="" > </a>
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
        <button class="button" onclick="document.location='Elimination.php'">Elimination </button>
        <button class="button" onclick="document.location='Cardio.php'">Cardio </button>
        <button class="button" onclick="document.location='Radio.php'">Radio </button>
        <button class="button" onclick="document.location='Mobilite.php'">Mobilité </button>
        <button class="button" onclick="document.location='Hygiene.php'">Hygiène </button>
        <button class="button" onclick="document.location='Alimentation.php'">Alimentation </button>
        <button class="button" onclick="document.location='Neuro.php'">Neuro </button>
    </div>
</div>

</div>
<h1> Information sur la patient </h1>
<form method="post">
    <label>Nom :</label>
    <label>
        <input type="text" name="nom" id="nom" value="<?php echo @$_POST['nom']?>" placeholder="Entrez le Nom du patient " required>
    </label>
    <label>Prénom :</label>
    <label>
        <input type="text" name="prenom" id="prenom" value="<?php echo @$_POST['prenom']?>" placeholder="Entrez le Prenom du patient" required>
    </label>
    <label>Age :</label>
    <label>
        <input type="int" name="age" id="age" value="<?php echo @$_POST['age']?>" placeholder="Entrez l' âge du patient" required>
    </label>
    <br>
    <label>Date de naissance :</label>
    <label>
        <input type="date" name="DDN" id="DDN" value="<?php echo @$_POST['DDN']?>" placeholder="Entrez la date de naissance du patient" required>
    </label>
    <label> Poids :</label>
    <label>
        <input type="int" name="poids" id="poids" value="<?php echo @$_POST['poids']?>" placeholder="Entrez le poids du patient" required>
    </label>
    <label> Taille :</label>
    <label>
        <input type="int" name="taille" id="Taille" value="<?php echo @$_POST['taille']?>" placeholder="Entrez la taille du patient" required>
    </label>
    <br>
    <label> IEP :</label>
    <label>
        <input type="int" name="IEP" id="IEP" value="<?php echo @$_POST['IEP']?>" placeholder="Entrez le IEP du patient" required>
    </label>
    <label> IPP :</label>
    <label>
        <input type="int" name="IPP" id="IPP" value="<?php echo @$_POST['IPP']?>" placeholder="Entrez le IPP du patient" required>
    </label>

    <label> Sexe :</label>
    <select name="sexe" id="sexe">
        <option value="">--Veuillez choisir le sexe--</option>
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
    </select>

    <br>
    <label> Adresse :</label>
    <label>
        <input type="text" name="adresse" id="adresse" value="<?php echo @$_POST['adresse']?>" placeholder="Entrez la taille du patient" required>
    </label>
    <label> Code postal :</label>
    <label>
        <input type="int" name="CP" id="CP" value="<?php echo @$_POST['CP']?>" placeholder="Entrez la taille du patient" required>
    </label>
    <br>
</form>
</body>
</html>

    <!--Le bas de page avec le boutton si on a besoin d'aide-->

    <footer>
        <form action="Accueil.php" method="post">
            <input type="submit" value="Besoin d'aide ?">
        </form>
    </footer>

</body>
</html>

    <?php



