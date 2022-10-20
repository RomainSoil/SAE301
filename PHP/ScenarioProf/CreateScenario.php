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




    <?php
    include ('../ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo->connexion();
        $patients = $bdd->query("SELECT * FROM patient");

        ?>
    <form method="post">
    <select name="patient">
        <option value="2">Selectionnez un patient</option>
            <?php
            while ($patient = $patients->fetch()){
                $pat = $patient[1];
                $pat.=" ";
                $pat.=$patient[2];
                $pat.=" ";
                $pat.=$patient[4];
                ?>
            <option value="1"><?php echo $pat?></option>
    <?php
            }
            ?>
                </select>
        <input type="submit" value="Ajouter une contrainte" name="Contrainte">
    </form>
<br>
<div class="contrainte">
    <form action="afficheScenario.php" method="post">
    <input type="submit" value="Afficher le scénario" name="affiche">
    </form>
</div>
</body>

</html>

<?php
function contrainte(){
    if (isset($_POST['patient']) && $_POST['patient']==1){
        if (isset($_POST['Contrainte'])) {
            header('Location: Radio.php');
            }
        }
}

contrainte();

    ?>



