<?php require 'headercookie.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style2.css">
    <script src="js.js"></script>
    <title>Pages d'accueil</title>
</head>

<body>
    <!-- ajout du header -->
    <?php include("header.php") ?>


    <!-- block hmtl du index -->
    <div class="position-relative">
        <div class="position-absolute" id="vaisseau_accueil">
            <img src="IMG/vaisseau_accueil.png" alt="Vaisseau" width="500">
        </div>

        <div class="container-fluid py-5 my-5 position-relative blackB" id="bg_croisiere">

            <div class="container">


                <div class="row">
                    <h1 class="col text-center">CROISIERE STELLAIRE</h1>
                </div>


                <div class="row pt-3">
                    <p class="col text-center mw-25">Naviguer . Cliquez . Voyager<br><br>

                        Notre entreprise vous proposera une expérience unique et inoubliable<br><br>

                        Venez realiser vos rêves à bord de nos différentes navettes touristiques qui vous ménerons aux plus belles destinations de la voie lactée.<br><br>

                        Nos équipes vous attendent pour le décollage.
                    </p>
                </div>
            </div>
        </div>
        <!-- ajout du footer -->
        <?php include("footer.php") ?>


        <!-- script JS -->
        <script src="footer.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>