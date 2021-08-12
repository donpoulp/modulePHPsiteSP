<?php require 'headercookie.php';
require 'headerDB.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style2.css">
    <script src="js.js"></script>
    <title>Connection/S'incrire</title>
</head>

<body>
        <!-- ajout du header -->
    <?php require("header.php") ?>
    <?php

    if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
        // // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        // $username = stripslashes($_REQUEST['username']);
        // $username = mysqli_real_escape_string($bdd, $username); 
        // // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
        // $email = stripslashes($_REQUEST['email']);
        // $email = mysqli_real_escape_string($bdd, $email);
        // // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        // $password = stripslashes($_REQUEST['password']);
        // $password = mysqli_real_escape_string($bdd, $password);
        //requéte SQL + mot de passe crypté
        try {
            //   on attribu un mode d'erreure lisible
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $register = $bdd->prepare('INSERT INTO client(username, email, mdp) VALUES(?, ?, ?)');
            $register->execute(array(($_POST['username']), ($_POST['email']), $_POST['password']));
            echo "<div class='sucess'>
                  <h3>Vous êtes inscrit avec succès.</h3>
                  <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
            </div>";
        } catch (PDOException $e) {
            // si les donnees ne sont pas bonnes
            echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
        }
    }else{

    ?>

    <div class='container blackB'>
        <div class='mt-5 mb-5 text-center'>
            <h1>S'inscrire</h1>
        </div>
        <hr class="hr3">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <!-- formulaire de creation d'article par la method post vers destination.php puis ma base de données -->
                <form class="box" action="connect.php" method="post">
                    <div class='mt-2 mb-2'>
                    <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
                    </div>
                    <div class='mt-2 mb-2'>
                    <input type="text" class="box-input" name="email" placeholder="Email" required />
                    </div>
                    <div class='mt-2 mb-2'>
                    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
                    </div>
                    <div class='mt-2 mb-2'>
                    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
                    </div>
                </form>
                <div>
                    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php require("footer.php") ?>
    <script src="footer.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>