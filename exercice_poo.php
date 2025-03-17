<?php 
include('class/Personne.php') ;

    if(isset($_POST['personne'])){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];

        $personne = new Personne($nom,$prenom,$age);

        echo "Info de la premiere personne <br>";
        $personne->affichage();
    }
?>


<?php require_once('includes/head.php') ; ?>

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
                               
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Exo POO</h1>
                                    </div>
                                    <form class="user" action="exercice_poo.php" method="POST" id="form_inscription">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nom" aria-describedby="emailHelp"
                                                placeholder="Entrer votre nom..." name="nom">
                                                <span id="nom_error" class=""></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="prenom" aria-describedby="prenomHelp"
                                                placeholder="Entrer votre prenom ..." name="prenom">
                                                <span id="prenom_error" class=""></span>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user"
                                                id="age" aria-describedby="ageHelp"
                                                placeholder="Entrer votre age ..." name="age">
                                                <span id="age_error" class=""></span>
                                        </div>
                                        
                                    
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="personne" value="S'Inscription">
                                       
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