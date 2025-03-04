<!-- <?php
    // require_once 'db.php';
    // if(isset($_POST['inscrire'])){
    //     $pdo = getConnection();
    //     $nom = $_POST['nom'];
    //     $mail = $_POST['mail'];
    //     $password = $_POST['password'];
    //     $password = password_hash($password,PASSWORD_DEFAULT);
    //     $req = "INSERT INTO utilisateurs(username,email,password) VALUES (?,?,?)" ;
    //     $stmt = $pdo->prepare($req);
    //     $resultat = $stmt->execute([$nom,$mail,$password]);
    //     if($resultat){
    //         echo "Inscription reussie avec succes !" ;
    //     }else{
    //         echo "Erreur !";
    //     }


    // }
?> -->
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
               <div class="">
                   <form action="inscription.php" method="POST">
                       <div class="form-floating mb-3">
                           <input type="text" class="form-control" id="floatingInput" placeholder="Entrer votre nom" name="nom">
                           <label for="floatingInput">User</label>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="mail">
                           <label for="floatingInput">Email address</label>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                           <label for="floatingPassword">Password</label>
                       </div>
                       <input type="submit" class="btn btn-primary" name="inscrire" value="S'inscire">
                   </div>
                </form>
            </div>
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
