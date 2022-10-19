<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>

<body>

La page du Etudiant

<a href="chat.php">Chat</a>
</body>
</html>

<?php
echo $_SESSION['IdChat'];
?>
