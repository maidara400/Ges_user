
<?php
$id_etudiant = $_GET["id"];
require_once('mysqli_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['modifier'])) {
        $nom = trim(htmlspecialchars($_POST['nom']));
        $prenom = trim(htmlspecialchars($_POST['prenom']));
        $email = trim(htmlspecialchars($_POST['email']));
        if (empty($nom) || empty($prenom) || empty($email)) {
            echo '<div class="alert alert-danger text-center">
                    <p>Les champs nom, prenom et email sont obligatoires !</p>
                  </div>';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<div class="alert alert-danger text-center">
                    <p>Le champ email est incorrect !</p>
                  </div>';
        } else {
            $modifier = 'UPDATE etudiant SET nom = ?, prenom = ?, email = ? WHERE id_etudiant = ?';
            $stmt = mysqli_prepare($connect, $modifier);
            mysqli_stmt_bind_param($stmt, 'sssi', $nom, $prenom, $email, $id_etudiant);
            if (mysqli_stmt_execute($stmt)) {
                // Redirection après modification
                header("Location: utilisateurs_mysqli.php");
                exit;
            } else {
                echo '<div class="alert alert-danger text-center">
                        <p>Une erreur est survenue lors de la mise à jour de l\'étudiant.</p>
                      </div>';
            }

            //mysqli_stmt_close($stmt);
            mysqli_close($connect);
        }
    }
}


$modif = 'SELECT * FROM etudiant WHERE id_etudiant = ?';
$stmt = mysqli_prepare($connect, $modif);

mysqli_stmt_bind_param($stmt, 'i', $id_etudiant);


mysqli_stmt_execute($stmt);

$resultat_modif = mysqli_stmt_get_result($stmt);


if ($row = mysqli_fetch_object($resultat_modif)) {
    $nom = $row->nom;
    $prenom = $row->prenom;
    $email = $row->email;
} else {
    echo '<div class="alert alert-danger text-center">
            <p>Étudiant introuvable !</p>
          </div>';
    exit;
}
//mysqli_stmt_close($stmt);
mysqli_close($connect);

//
//   var_dump($row);
require_once('includes/head.php');
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


                <div class="container mt-5">
                    <h2 class="text-center mb-5">Modifier un etudiant</h2>
                    <form action="<?php  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="form-floating mb-3">
                            <label for="nom">NOM</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?= $row->nom ?>">

                        </div>
                        <div class="form-floating mb-3">
                            <label for="prenom">PRENOM</label>
                            <input type="text" class="form-control" id="prenom"  name="prenom" value="<?= $row->prenom ?>">

                        </div>
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Email address</label>
                            <input type="email" class="form-control" id="floatingInput"  value="<?= $row->email ?>" name="email">

                        </div>
                        <input type="hidden" name="id_etudiant" value="<?= $row->id_etudiant ?>">
                        <input type="submit" name="modifier" value="Modifier" class="btn btn-primary">
                    </form>
                </div>


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

</html><?php
