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
                                <!-- <script> inscription() </script> -->
                                <!-- fonction pour l insertion dans la base de donne -->
                                <?php inscription() ; ?>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenue !</h1>
                                    </div>
                                    <form class="user" action="inscription.php" method="POST" id="form_inscription">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nom" aria-describedby="emailHelp"
                                                placeholder="Entrer votre nom..." name="nom">
                                                <span id="nom_error" class=""></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="mail" aria-describedby="emailHelp"
                                                placeholder="Entrer votre Email Address..." name="mail">
                                                <span id="mail_error" class=""></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" placeholder="Password" name="password">
                                                <span id="password_error" class=""></span>
                                        </div>
                                    
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="inscrire" value="S'Inscription">
                                       
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
                                        <a class="small text-decoration-none" href="#">Mot passe oublier ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small text-decoration-none" href="login.php">Se Connecter !</a>
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