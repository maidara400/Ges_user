<?php
    require_once 'db.php';

    // alert
    function alert($couleur,$message){
        ?>
            <div class="mt-2  text-center text-dark alert alert-<?= $couleur ; ?>"> <?= $message ; ?> </div>
        <?php
    }

    // fonction pour s inscrire
    function inscription(){
        if(isset($_POST['inscrire'])){
            $pdo = getConnection();
            $nom = trim(htmlspecialchars($_POST['nom']));
            $mail = trim(htmlspecialchars($_POST['mail']));
            $password = trim(htmlspecialchars($_POST['password']));
            $password = password_hash($password,PASSWORD_DEFAULT);
            // verif de l existence du username
            $sql = "SELECT * FROM utilisateurs WHERE username = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom]);
            $user = $stmt->fetch();
            if($user){
                    alert('warning','L utilisateur existe deja') ;
            }else{
                     // insertion du nouveau inscrit
                $req = "INSERT INTO utilisateurs(username,email,password) VALUES (?,?,?)" ;
                $stmt = $pdo->prepare($req);
                $resultat = $stmt->execute([$nom,$mail,$password]);
                if($resultat){
                    // header("Location:login.php");
                    header("Refresh:1;login.php");
                    
                }else{
                    echo "Quelque chose a du mal se passer avec l insertion !";
                }
        
            }

       
    
        }
    }
   
?>