<?php
session_start();
@$_SESSION['temperature'] = $_POST['temperature'];
@$_SESSION['glasgow'] = $_POST['glasgow'];
@$_SESSION['EVA'] = $_POST['EVA'];
@$_SESSION['AlgoPlus'] = $_POST['AlgoPlus'];
header('Location:Respi.php');
?>

