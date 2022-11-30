<?php
session_start();
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
<h2>Création de Scénario</h2>


    <!--Le bas de page avec le boutton si on a besoin d'aide et de création d'un nouveau patient-->
    <div class="footer-CreateScenario">
        <form action="Patient.php" method="post">
            <input type="submit" value="Créer un patient" name="Créer">
        </form>
        <br>
        <form action="../Accueil.php" method="post">
            <input type="submit" value="Besoin d'aide ?">
        </form>
    </div>




<!--selection du patient avec ses options de navigation-->

    <?php
    include ('../ConnectionBDD.php');
    $pdo = ConnectionBDD::getInstance();
    $bdd = $pdo::getpdo();

    function effacer($bdd){
        $patient = $bdd->prepare("Delete FROM patient where idpatient=?");
        $patient->bindParam(1,$_SESSION['patient']);
        $patient->execute();
        header('CreateScenario.php');


    }
    /* permet de pouvoir appuyer sur le bouton 'ajouter contraintes' si et seulement si un patient est sélectionné*/
    /**
     * @return void
     */
    function contrainte()
    {
        if (isset($_POST['patient']) && $_POST['patient'] != 2) {
            if (isset($_POST['Contrainte'])) {
                $_SESSION['patient'] = $_POST['patient'];
                header('Location: Radio.php');
            }
        }
    }

    /* permet d'appuyer sur le bouton afficher scénario si et seulement si un patient est séléctionné*/
    /**
     * @return void
     */
    function affichersce()
    {
        if (isset($_POST['patient']) && $_POST['patient'] != 2) {
            if (isset($_POST['affiche'])) {
                $_SESSION['scenario'] = $_POST['patient'];
                header('Location: afficheScenario.php');
            }
        }
    }

    affichersce();
    contrainte();



    /* permet de créer une liste déroulante avec tous les patients*/
        $patients = $bdd->prepare("SELECT * FROM patient where emailprof=?");
        $patients->bindParam(1,$_SESSION['email']);
        $patients->execute();

        ?>
    <form method="post">
    <select name="patient">
        <option value="2">Sélectionnez un patient</option>
            <?php
            $_SESSION['patient']=$_POST['patient'];
            while ($patient = $patients->fetch()){
                $pat = $patient[1];
                $pat.=" ";
                $pat.=$patient[2];
                $pat.=" ";
                $pat.=$patient[4];
                ?>
            <option value=<?php echo $patient[0]?>><?php echo $pat?></option>
    <?php
            }
            ?>
    </select>
        <input type="submit" value="Ajouter une contrainte" name="Contrainte">
        <input type="submit" value="Afficher le scénario" name="affiche">
        <input type="button" value="Supprimer le patient" name = "Supprimer" onclick="afficher()">
    </form>
<br>

<form method="post"  style="visibility: hidden" id="form">
    <div class="supprimer">
    Êtes-vous sur de supprimer ce patient ?
    <input type="submit" name="oui" value="Oui" onclick=<?php effacer($bdd)?>>
    <input type="button" name="Non" value="Non" onclick="afficher()">
    </div>
</form>
</body>

</html>

<script>
    /* permet d'afficher ou non la création de médicaments*/
    e=true;
    function afficher(){
        if (e) {
            document.getElementById('form').setAttribute('style', 'visibility:visible')
            e=false;
        }else {
            document.getElementById('form').setAttribute('style', 'visibility:hidden')
            e=true;
        }
    }
</script>


