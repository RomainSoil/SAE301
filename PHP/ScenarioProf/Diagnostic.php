<?php
session_start();
@$_SESSION['Date']=$_POST['date'];
@$_SESSION['prescrite']=$_POST['prescrite'];
@$_SESSION['confort']=$_POST['confort'];
@$_SESSION['surveillance']=$_POST['surveillance'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ConnexionProfesseur</title>
    <link rel="stylesheet" href="Patient.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>

<?php
include ('BarreScenario.html');
include ('Entete.html')
?>
<div class="Titre">
    <h3>Date du Diagnostic</h3>
</div>
<Form action="Securite.php" method="post">
    Date :
    <input type="datetime-local" name="date" id="date" required>
    <div class="Titre">
        <h3>Intervenant</h3>
    </div>
    Nom :<input type="text" name="nom" id="nom"  placeholder="Nom de l'intervenant " required><br>
    Prénom :<input type="text" name="prenom" id="prenom" placeholder="Prenom de l'intervenant" required><br><br>
    <div class="Titre"><h3>Diagnostic:</h3></div>
    <div class="text_area">
    <textarea name="diagnostic" id="diagnostic" rows="20" cols="80" required> </textarea></div> <br>
    <div class="button_Suivant">
        <input type="submit" value="Valider">
    </div>
</Form>

<footer>
    <form action="../Accueil.php" method="post">
        <input type="submit" value="Besoin d'aide ?">
    </form>
</footer>
</body>
</html>

