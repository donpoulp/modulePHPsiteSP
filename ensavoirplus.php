<?php require 'headercookie.php'; ?>
<!-- au dessus initialisation de la session -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style2.css">
    <title>En savoir plus</title>
</head>

<body>

    <?php
    //  ajout du header
    include("header.php");

    // on affiche les infos de l'articles choisie en fonction des infos reçu par la method $GET (si j'ai cliquer sur le boutons 1 je recois les infos $GET de larticle 1 ect...)
    echo "<div class='position-absolute' id='lune'>";
    echo "<img src=" . $_GET['imagepla'] . " alt=", $_GET['planete'], ">";
    echo "</div>";


    echo "<div class='container-fluid imageder pt-5 mt-5 blackB' id='bg_info_planet'>";
    echo "<div class='row'>";
    echo "<h1 class='col text-center'>EN SAVOIR PLUS</h2>";
    echo "</div>";

    echo "<div class='row pt-3'>";
    echo "<h2 class='col  text-center info_planet'>DIRECTION ", $_GET['planete'], "</h2>";
    echo "</div>";

    echo "<div class='row pt-3'>";
    echo "<p class='col-6 mx-auto text-center'>", $_GET['des'], "</p>";
    echo "</div>";
    echo "</div>";

    // ajout du footer
    include("footer.php");
    ?>
    <!-- script JS -->
    <script src="footer.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>