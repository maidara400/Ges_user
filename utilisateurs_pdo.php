<?php
    require_once('pdo_connect.php') ;
    require_once('includes/head.php') ;
    $afficher = 'SELECT * FROM etudiant';
    $stmt  = $pdo->prepare($afficher);
    $stmt ->execute();
// Récupération de tous les résultats dans un tableau
$etudiants = $stmt->fetchAll(PDO::FETCH_OBJ);  // ou PDO::FETCH_ASSOC si tu veux un tableau associatif
?>

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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-center">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Prenom</th>
                                            <th>Email</th>
                                            <th>Date Inscription</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($etudiants as $etudiant): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($etudiant->id_etudiant) ; ?></td>
                                            <td><?= htmlspecialchars($etudiant->nom) ; ?></td>
                                            <td><?= htmlspecialchars($etudiant->prenom ); ?></td>
                                            <td><?= htmlspecialchars($etudiant->email) ; ?></td>
                                            <td><?= htmlspecialchars($etudiant->date_inscription) ; ?></td>
                                            <td>
                                                <form action="" method="POST" >
                                                    <a href="pdo_modif.php?id=<?= htmlspecialchars(urldecode($etudiant->id_etudiant)); ?>" class="btn btn-primary btn-sm">Modifier</a>
                                                    <input type="hidden" name="id_etudiant" value="<?= htmlspecialchars($etudiant->id_etudiant); ?>" >
                                                    <input type="submit" value="Supprimer" name="supprimer" class="btn btn-primary btn-sm">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>