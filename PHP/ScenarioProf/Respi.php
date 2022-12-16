<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Respiration</title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>
<?php
include ('BarreScenario.html');
include ('EnteteV2.html');
?>
    <h2>Respiration</h2>
<form method="post" action="Transition2.php">

    Date :
    <input type="datetime-local" name="date" id="date" required>
    <br><br>
    SaO2 : <input type="text" name="Sa02" required>
    <br><br>
    FR : <input type="text" name="FR">
    <br><br>
    O2 : <input type="text" name="O2">
    <br><br>

    <input type="submit" value="Valider" name="Valider" >



</form>
<div class="footer-CreateScenario">
    <form action="../BesoinAide.php" method="post">
        <button class="button-28" role="button" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>
