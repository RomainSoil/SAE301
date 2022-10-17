<?php
session_start()
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="Patient.css">
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
            <a href="../Accueil.php"> <img src="../retour.png" class="icone" width=50 height=50 alt="" > </a></div>
        <div class="btn-group">
            <button class="button" onclick="document.location='PageProf.php'">Accueil</button>
            <button class="button" onclick="document.location='CreateScenario.php'">Scénario</button>
            <button class="button" onclick="document.location='Correction.php'">Correction</button>
            <button class="button" onclick="document.location='Note.php'">Note</button>
            <button class="button" onclick="document.location='../chat.php'">Message </button>

        </div>
        <br>
    </div>
    </div>
    <div class="fontHead">
        <br>
        <div class="btn-scenario">
            <button class="button_select" onclick="document.location='Patient.php'">Patient</button>
            <button class="button" onclick="document.location='Diagnostic.php'">Diagnostic</button>
            <button class="button" onclick="document.location='Securite.php'">Sécurité</button>
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
    <div class="Titre">
        <h1> Information sur la patient </h1>
    </div>
    <form method="post" action="Diagnostic.php">
        Nom :<input type="text" name="nom" id="nom" placeholder="Entrez le Nom du patient " required><br>
        Prénom :<input type="text" name="prenom" id="prenom" placeholder="Entrez le Prenom du patient" required><br><br>
        Age :<input type="number" name="age" id="age" placeholder="Entrez l' âge du patient" required><br>
        Date de naissance :<input type="date" name="DDN" id="DDN" placeholder="Entrez la date de naissance du patient" required><br><br>
        Poids :<input type="number" name="poids" id="poids" placeholder="Entrez le poids du patient" required><br>
        Taille<input type="number" name="taille" id="Taille" placeholder="Entrez la taille du patient" required><br><br>
        <br>
        IEP :<input type="number" name="IEP" id="IEP" placeholder="Entrez le IEP du patient" required><br>
        IPP :<input type="number" name="IPP" id="IPP" placeholder="Entrez le IPP du patient" required><br><br>
        Sexe :<select name="sexe" id="sexe">
            <option value="">--Veuillez choisir le sexe--</option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
        </select><br><br>
        <br>
        Adresse:<input type="text" name="adresse" id="adresse" placeholder="Entrez l'adresse du patient" ><br>
        Ville :<input type="text" name="ville" id="ville" placeholder="Entrez la ville du patient" ><br>
        Code postal :<input type="int" name="CP" id="CP" placeholder="Entrez le code postal" ><br>
        <br>
        <div class="button_Suivant">
            <input type="submit" value="Valider">
        </div>
    </form>
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

