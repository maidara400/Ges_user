<?php
    session_start();
    setcookie("utilisateur","",time() - 3600,"/");
    setcookie("password_utilisateur","",time() - 3600,"/");
    session_destroy();
    header("Location:login.php");
    exit();
?>
