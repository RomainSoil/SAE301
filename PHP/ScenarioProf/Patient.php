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
    <?php
    include ('BarreScenario.html');
    include ('EnteteV2.html');
    ?>
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

