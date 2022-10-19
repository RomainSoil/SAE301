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
<?php
include("BarreScenario.html");
include("Entete.html");
?>
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
?>



