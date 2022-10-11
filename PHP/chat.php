<?php
$bdd= new PDO('pgsql:host=iutinfo-sgbd.uphf.fr;dbname=iutinfo134', 'iutinfo134', 'NuVRPnlV');
if(isset($_POST['valider'])){
    $pseudo= htmlspecialchars($_POST['pseudo']);
    $message= nl2br(htmlspecialchars($_POST['message']));

    $insertMsg= $bdd->prepare('INSERT INTO messages(userx,message) VALUES(?, ?)');
    $insertMsg->execute(array($pseudo, $message));
}
?>
<html>
<head>
    <title>Messagerie</title>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <form method="POST" action="" align="center">
        <input type="text" name="pseudo">
        <br><br>
        <textarea name="message"></textarea>
        <br>
        <input type="submit" name="valider">
    </form>
    <section id="messages"></section>

    <script>
        setInterval('load_messages()',500);
        function load_messages(){
            $('#messages').load('loadChat.php');
        }
    </script>
</body>
</html>
<?php
use ConnectionBDD;
PDO::$a= ConnectionBDD::connexion(new ConnectionBDD());
?>