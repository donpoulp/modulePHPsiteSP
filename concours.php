<?php require 'headercookie.php';?>
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
    <?php include("header.php")?>

    <div class="container  blackB h-40 pb-5 my-5">
                    <div class="row pt-3">
                        <h1 class="col text-center h1r">Concours</h1>
                    </div>
                    <hr class="hr1">
                    
                        <div class="row pt-3">
                            <p class="col text-center">Du 30/06 a 16h00 au 30/06 a 16h01.<br><br>
                            Repondez à 5 questions sur l'espace et tenter de gagner une chance de partir en voyage sur Mars ! GRATUITEMENT !!</p><br><br><br>
                        </div>

                        <div class="row pt-3">
                        <div class="col text-center">
                        <input class="btn2 btn btn-secondary text-warning"  type='button' value='Commencer' onclick="window.location.href='Quiz/quiz.php'"/>
                        </div>
                        </div>
    </div>

    <?php include("footer.php")?>
    <script src="footer.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>