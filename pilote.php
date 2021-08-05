<?php require 'headercookie.php'; ?>
<!-- on initie la sessions -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style2.css">
    <title>Nos pilotes stellaires</title>
</head>

<body>
    <!-- ajout du header -->
    <?php include("header.php") ?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 pt-5">
                <h1 class="text-center" id="pilotetourne"> PILOTES ASTRONAUTES</h1>
            </div>


            <div class="col-12 pt-5">
                <hr class="hr1">
            </div>


            <div class="col-12 pt-5">
                <h1 class="text-center">EN CHARGE DU PILOTAGE<br> DE NOS VAISSAUX SPATIAUX</h1>
            </div>

        </div>
        <div class='container-fluid' id='test'>
            <div class='row text-center'>

                <?php
                // tableau qui contient different parametre auquel on attribue des valeurs cela marche comme une base de donnees
                $info2 = [
                    ['image' => 'IMG/astro_raph.svg', 'nom' => 'Raph', 'liencv' => 'cv/Raph/index.html', 'id1' => 'raphP', 'id2' => 'rapha'],
                    ['image' => 'IMG/astro_dan.svg', 'nom' => 'Dan', 'liencv' => 'cv/Dan/index.html', 'id1' => 'danP', 'id2' => 'dana'],
                    ['image' => 'IMG/astro_nico.svg', 'nom' => 'Nico', 'liencv' => 'cv/Nico/index.html', 'id1' => 'nicoP', 'id2' => 'nicoa'],
                ];
                // on fait pour chaque ligne du tableau
                foreach ($info2 as $i2) {
                    // on affiche grace au infos du tableau (si 5 ligne dans le tableau alors 5black seront cree)
                    echo "<div class='col'>";
                    echo "<div class='text-center pt-5' id='raphP'>";
                    echo "<a href=" . $i2['liencv'] . ">";
                    echo '<img src="' . $i2['image'] . '" alt=photodeprofil>';
                    echo "</a>";
                    echo "</div>";
                    echo "<div class=rcol ml-4r id='rapha'>";
                    echo "<h2>" . $i2['nom'] . "</h2>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
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