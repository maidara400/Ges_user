<?php
session_start();
require 'db.php';
if (isset($_POST['connexion'])) {
    $pdo = getConnection();
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $sql = "SELECT * FROM utilisateurs WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        setcookie("utilisateur", $user['username'], time() + 3600, "/");
        header("Location: dashboard.php");
    exit;
 } else {
        echo "Identifiants incorrects.";
    }
}
?>


<?php require_once('includes/head.php') ; ?>
<?php require_once('includes/fonction_user.php') ; ?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image bg-danger"></div>
                            <div class="col-lg-6">
                                <?php  ; ?>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Connexion</h1>
                                    </div>
                                    <form class="user" action="login.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nom" aria-describedby="emailHelp"
                                                placeholder="Entrer votre nom..." name="username">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small ">
                                                <input type="checkbox" class="custom-control-input " id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se Souvenir
                                                    </label>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="connexion" value="Connexion">
    
                                        <hr>
                                        <a href="index.php" class="disabled btn btn-google btn-user btn-block btn-danger" >
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.php" class="disabled btn btn-facebook btn-user btn-block btn-danger">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small text-decoration-none" href="forgot-password.html">Mot passe oublier ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-decoration-none" href="register.html">S'inscrire !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php require_once('includes/script.php') ; ?>
  

</body>

</html>


?>
