<?php
$connect = mysqli_connect("localhost","root","","tp_php");

if(!$connect){
    die("Erreur de connexion : ").mysqli_connect_error();
}