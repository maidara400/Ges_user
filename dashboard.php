<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location:logout.php");
    exit;
}

?>

<h3>Bienvenue <?= $_SESSION['username'] ; ?></h3>
