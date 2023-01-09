<?php
session_start();
require ("../ConnectionBDD.php");
$pdo = ConnectionBDD::getInstance();
$bdd = $pdo::getpdo();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>autre</title>
    <link rel="stylesheet" href="../PageProf.css" >
    <script src="../LesFonctionsJS.js"></script>

</head>
<body>


<?php
include("BarreScenario.html");
include("EnteteV2.html");
/* on récupère les noms des catégories*/
$categorie=$bdd->prepare("Select nom from categorie");
$categorie->execute();

?>
<h2>Création d'une nouvelle catégorie</h2>

<form method="post" action="PageAjoutCategorie.php">

    <input type="text" placeholder="Nom de la nouvelle catégorie" name="cat" required>
    <input type="submit" name="valider">

</form>
<h4>
    Nouvelle donnée
</h4>

<form method="post" action="Transition3.php">
    <select name="categorie">
        <option value="2">Sélectionnez une catégorie</option>
        <?php
        while ($categories = $categorie->fetch()){
            $pat = $categories[0];
            $pat.=" ";
            ?>
            <option value=<?php echo $categories[0]?>><?php echo $pat?></option>
            <?php
        }
        ?>

    <input name="type" type="text" placeholder="Nom de la donnée" required>
        <input name="donnee" type="text" placeholder="donnée" required>

        <input name="date" type="datetime-local" required>
    <input type="submit" value="valider">
</form>
<div class="footer-CreateScenario">
    <form action="../BesoinAide.php" method="post">
        <button class="button-28" role="button" type="submit">Besoin d'aide</button>
    </form>
</div>
</body>
</html>



















