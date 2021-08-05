<?php require 'headercookie.php';?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/style2.css">
        <script src="js.js"></script>
        <title>Formulaire d'ajout d'article</title>
    </head>
    <body>
    <!-- ajout du header -->
    <?php include("header.php")?>

    <div class='container blackB'>
        <div class='mt-5 mb-5 text-center'><h1>Ajouter un nouvelle article</h1></div>
        <hr class="hr3">
        <div class="row justify-content-center">
        <div class="col-8">
    <!-- formulaire de creation d'article par la method post vers destination.php puis ma base de données -->
    <form action="destinations.php" method="POST">
        <div>
            <label for="depart" class="form-label"></label>
            <input type="text" class="form-control" name="nom" id="depart" placeholder="Nom de la destinations">
        </div>
        <div>
            <label for="depart" class="form-label"></label>
            <input type="text" class="form-control" name="distance_terre" id="depart" placeholder="Distance Terre-destinations en km">
        </div>
        <div>
            <label for="depart" class="form-label"></label>
            <input type="text" class="form-control" name="duree" id="depart" placeholder="Durée du voyage en jours">
        </div>
        <div>
            <label for="depart" class="form-label"></label>
            <input type="text" class="form-control" name="depart" id="depart" placeholder="Lieu de départ">
        </div>
        <div>
            <label for="depart" class="form-label"></label>
            <input type="text" class="form-control" name="navette" id="depart" placeholder="Nom de la navette">
        </div>
        <div>
            <label for="date" class="form-label"></label>
            <textarea class="form-control" id="date" name="commentaire" placeholder="Une description rapide"></textarea>
        </div>
        <div>
            <label for="depart" class="form-label"></label>
            <input type="text" class="form-control" name="prix" id="depart" placeholder="Prix du voyage">
        </div>
        <div>
            <label for="depart" class="form-label"></label>
            <input type="text" class="form-control" name="image" id="depart" placeholder="Lien(url) d'une image de la destination">
        </div>
        <div>
            <label for="date" class="form-label"></label>
            <textarea class="form-control" id="date" name="grosdes" placeholder="Description detaillées"></textarea>
        </div>
        <br>                       
        <div class="row pt-3 pb-3">
        <div class="col text-center butenvoie">
            <input type="submit" class="btn btn-secondary text-warning"></input>
        </div>
        </div>
 
    
    </form>
    </div>
    </div>
    </div>
    <!-- ajout du footer -->
    <?php include("footer.php")?>
    <!-- script JS -->
    <script src="footer.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>