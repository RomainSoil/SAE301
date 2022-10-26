<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="C:\Users\coren\PhpstormProjects\SAE301\PHP\PageProf.css">
    <script type="text/javascript" src="../LesFonctionsJS.js"></script>

</head>



<body>
<?php
include("BarreScenario.html");
?>
<div class="Titre">
    <h1>Le Scénario</h1>
</div>
<form method="post" name="scenario">
    <input type="number" name="idscen">
    <input type="submit">
</form>
</body>
</html>

<?php
include 'C:\Users\coren\PhpstormProjects\SAE301\PHP\ConnectionBDD.php';
$conn = ConnectionBDD::getInstance();
$pdo = $conn::getpdo();

if(isset($_POST['idscen'])){
    $sql= $pdo->prepare('SELECT nom, prenom, date, compterendu, idpatient FROM iutinfo134.public.diagnostic WHERE iddiag=?');
    $sql->execute(array($_POST['idscen']));
    while($data= $sql->fetch()){
?>
        <p>
            Diagnostic du patient <strong><?php echo $data['nom'];?> <?php echo $data['prenom'] ?></strong>
            fait le <strong><?php echo $data['date'] ?></strong><br><br>
            Compte rendu : <?php echo $data['compterendu'];?>
        </p>
<?php
    }

}




?>


