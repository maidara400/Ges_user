<?php

try{
    $user = "root";
    $password = "";
    $database = "tp_php";
    $host = "localhost";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    $pdo = new PDO("mysql:host=$host;dbname=$database",$user,$password,$options);

    // echo "Table 'etudiants' créée avec succès !";

}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}




