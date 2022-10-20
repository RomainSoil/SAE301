<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../PageProf.css">
    <script type="text/javascript" src="../LesFonctionsJS.js"></script>

</head>



<body>
<?php
include("BarreScenario.html");
?>
<div class="Titre">
    <h1>Création de Scénario</h1>
</div>
<div class="contrainte">
    <form action="Radio.php" method="post">
        <input type="submit" value="Ajouter une contrainte" name="Contrainte">
    </form>
    <br>
<form action="afficheScenario.php" method="post">
    <input type="submit" value="Afficher le scénario" name="afficheScena">
</form>
</div>
    <br><br>



    <!--Le bas de page avec le boutton si on a besoin d'aide-->
    <footer>
        <form action="Patient.php" method="post">
            <input type="submit" value="Créer un patient" name="Créer">
        </form>
        <br>
        <form action="../Accueil.php" method="post">
            <input type="submit" value="Besoin d'aide ?">
        </form>
    </footer>

</body>
</html>

    <?php ?>



