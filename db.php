<?php
function getConnection() {
    try {
        $pdo = new
        PDO("mysql:host=localhost;dbname=gestion_utilisateur;charset=utf8", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}


//var_dump(getConnection());
?>


