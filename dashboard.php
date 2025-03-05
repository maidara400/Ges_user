<?php
session_start();

if(!isset($_SESSION['username']) || !isset($_COOKIE['utilisateur']) ){
    header("Location:logout.php");
    exit();
}else{
    $nom_session_username = $_SESSION['username'] ;
    $nom_session_username = isset($_COOKIE['utilisateur']) ? $_COOKIE['utilisateur'] : $nom_session_username ;
}

?>

    <?php require_once('includes/head.php') ; ?>
    
    <body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">
    
        <!-- Sidebar -->
        <?php require_once('includes/sidbar.php') ; ?>
        <!-- End of Sidebar -->
    
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
    
            <!-- Main Content -->
            <div id="content">
    
                <!-- Topbar -->
                <?php require_once('includes/topbar.php') ; ?>
                <!-- End of Topbar -->
    
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h3 class="text-center ">Bienvenue <?= $nom_session_username ; ?></h3>
                  
                <!-- /.container-fluid -->
    
                </div>
            <!-- End of Main Content -->
    
            <!-- Footer -->
            <?php require_once('includes/footer.php') ; ?>
            <!-- End of Footer -->
    
        </div>
        <!-- End of Content Wrapper -->
    
    </div>
    <!-- End of Page Wrapper -->
    
    <!-- Scroll to Top Button-->
    <?php require_once('includes/top.php') ; ?>
    
    <!-- Logout Modal-->
    <?php require_once('includes/logout.php') ; ?>
    
    <!-- Bootstrap core JavaScript-->
    <?php require_once('includes/script.php') ; ?>
    
    </body>
    
    </html>
    
