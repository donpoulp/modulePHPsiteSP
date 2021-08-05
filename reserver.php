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

    <div class="row h-100 d-flex justify-content-center w-75 mx-auto">
            
            <div class="container blackB col-xl-8 col-lg-12 h-50 align-self-center">
                <h1 class="text-center text-white h-25 my-5">RÉSERVATION</h1>
                <div class="row w-75 mx-auto h-50">
                    
                    <div class="col-12">
                        <form action="#">
                            <div>
                                <label for="depart" class="form-label"></label>
                                <input type="text" class="form-control" id="depart" placeholder="Où allez-vous ?">
                            </div>
                            <div>
                                <label for="date" class="form-label"></label>
                                <input type="text" class="form-control" id="date" placeholder="Départ le">
                            </div><br>
                            <div class="row">
                                <div class="col">
                                    <select name="nombre" id="nombre" class="form-control">
                                        <option value="">1 voyageur</option>
                                        <option value="">2 voyageurs</option>
                                    </select>
                                </div><br>
                                <div class="col text-center">
                                    <button type="button" class="btn btn-secondary text-warning">RESERVATION</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 align-self-center text-center">
                <img src="IMG/pngaaa.com-vaisseau.png" alt="" width="750">
            </div>

        </div>
        <?php include("footer.php")?>
    <script src="footer.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>