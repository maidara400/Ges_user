<?php
require_once("mysqli_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["ajouter"])) {
        $nom = trim(htmlspecialchars($_POST["nom"]));
        $prenom = trim(htmlspecialchars($_POST["prenom"]));
        $email = trim(htmlspecialchars($_POST["email"]));

        if (empty($nom) || empty($prenom) || empty($email)) {
            ?>
            <div class="alert alert-danger text-center">
                <p>Les champs nom, prenom et email sont obligatoires !</p>
            </div>
            <?php
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            ?>
            <div class="alert alert-danger text-center">
                <p>Le champ email est incorrect !</p>
            </div>
            <?php
        } else {
            // Préparation de la requête d'insertion
            $insert = 'INSERT INTO etudiant(nom, prenom, email) VALUES(?, ?, ?)';
            $stmt = mysqli_prepare($connect, $insert);

            // Lier les paramètres
            mysqli_stmt_bind_param($stmt, 'sss', $nom, $prenom, $email);

            // Exécuter la requête préparée
            if (mysqli_stmt_execute($stmt)) {
                // Redirection après l'insertion
                header("Location: utilisateurs_pdo.php");
                exit;
            } else {
                ?>
                <div class="alert alert-danger text-center">
                    <p>Une erreur est survenue lors de l'ajout de l'étudiant.</p>
                </div>
                <?php
            }

            // Fermer la requête préparée
           // mysqli_stmt_close($stmt);
            mysqli_close($connect);
        }
    }
}

?>

<?php require_once('includes/head.php'); ?>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php require_once('includes/sidbar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php require_once('includes/topbar.php'); ?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="container mt-5">
                    <h2 class="text-center mb-5">Ajouter un étudiant</h2>
                    <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <label for="nom">NOM</label>
                            <input type="text" class="form-control" id="nom" placeholder="aidara" name="nom">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="prenom">PRENOM</label>
                            <input type="text" class="form-control" id="prenom" placeholder="mouhamed" name="prenom">
                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Email address</label>
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        </div>
                        <input type="submit" name="ajouter" value="Ajouter" class="btn btn-primary">
                    </form>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php require_once('includes/footer.php'); ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<?php require_once('includes/top.php'); ?>

<!-- Logout Modal-->
<?php require_once('includes/logout.php'); ?>

<!-- Bootstrap core JavaScript-->
<?php require_once('includes/script.php'); ?>

</body>

</html>
