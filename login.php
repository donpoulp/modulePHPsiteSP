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
    <title>connection/S'incrire</title>
</head>

<body>
    <!-- ajout du header -->
    <?php require("header.php") ?>
    <div class='container blackB'>
        <div class='mt-5 mb-5 text-center'>
            <h1>Connection</h1>
        </div>
        <hr class="hr3">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
            <?php require 'fonction.php';
    if (isset($_POST['username'])) {
        connection();
    }
    ?>
                <form class="box" action="login.php" method="post">
                    <div class='mt-2 mb-2'>
                        <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
                    </div>
                    <div class='mt-2 mb-2'>
                        <input type="password" class="box-input" name="password" placeholder="Mot de passe">
                    </div>
                    <div class='mt-2 mb-2'>
                        <input type="submit" value="Connexion " name="submit" class="box-button">
                    </div>
                    <div class='mt-2 mb-2'>
                        <p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
                    </div>
            </div>
        </div>
    </div>


    <?php require("footer.php") ?>
    <script src="footer.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>