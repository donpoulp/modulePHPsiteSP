<?php require 'headercookie.php'; ?>
<?php require 'headerDB.php'; ?>
<!-- initialisation des header base de donnees et session -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style2.css">
    <script src="js.js"></script>
    <title>Destinations</title>
</head>

<body>


    <?php
    // on verifie si les donnees envoyer par le formulaire de creation d'articles sont bien remplie pour faire la suite
    if (isset($_POST['nom']) && isset($_POST['distance_terre']) && isset($_POST['duree']) && isset($_POST['depart']) && isset($_POST['navette']) && isset($_POST['commentaire']) && isset($_POST['prix']) && isset($_POST['grosdes'])) {


        try {
            //   on attribu un mode d'erreure lisible
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // on fait une commande SQL pour inserer les valeurs recue(du formulaire $_POST) dans notre tableau articles de notre base de donnees    
            $article = $bdd->prepare('INSERT INTO article(nom, image, distance_terre, duree, depart, navette, commentaire, prix, grosdes) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $article->execute(array(($_POST['nom']), ($_POST['image']), $_POST['distance_terre'], $_POST['duree'], $_POST['depart'], $_POST['navette'], $_POST['commentaire'], $_POST['prix'], $_POST['grosdes']));
        } catch (PDOException $e) {
            // si les donnees ne sont pas bonnes
            echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
        }
    }
    //on recupère tout de notre tableau article dans la bdd(base de donnes) 
    $article_affich = $bdd->query('SELECT * FROM article');
    ?>
    <!-- ajout du header -->
    <?php include("header.php") ?>

    <!-- bouton au top de la page -->
    <div class='container'>
        <div class="row d-flex justify-content-between">
            <div class="col-3">
                <!-- bouton ajout d'article -->
                <input class="btn btnred" onclick="window.location.href='formu.php'" type="button" value="Ajouter un arcticle">
            </div>
        </div>
    </div>

    <?php
    // boucle pour faire chaque ligne de ma base de donnes
    while ($donnees = $article_affich->fetch()) {
        // on affiche une carde par boucle avec a chaque fois les infos de la base de donnes  
        echo "<div class='container mt-5 mb-5 blackB'>";
        echo "<div class='d-flex justify-content-center row'>";
        echo "<div class='col-md-10'>";
        echo "<div class='row p-2 rounded'>";
        echo '<div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="' . $donnees['image'] . '"></div>';
        echo "<div class='col-md-7 mt-1'>";
        echo "<h3 class='text-white titre2'>" . $donnees['nom'] . "</h3><br>";
        echo "<div class='d-flex flex-row'>";
        echo "<div class='mt-1 mb-1 spec-1 colorbib'><div class='text-white'>Durée du voyage : " . $donnees['duree'] . " jours </div></div>";
        echo "</div>";
        echo "<div class='mt-1 mb-1 spec-1 colorbib'><div class='text-white'>Distance Terre - " . $donnees['nom'] . " : ", $donnees['distance_terre'], " million de Km </div></div>";
        echo "<div class='mt-1 mb-1 spec-1 colorbib'><div class='text-white'>Départ de : " . $donnees['depart'] . "</div></div>";
        echo "<div class='mt-1 mb-1 spec-1'><div class='text-white'>Navette : " . $donnees['navette'] . "</div></div><br>";
        echo "<div class='text-justify mb-0 text-white'>" . $donnees['commentaire'] . "<br><br></div>";
        echo "</div>";
        echo "<div class='align-items-center align-content-center col-md-2 border-left mt-1'>";
        echo "<div class='d-flex flex-row align-items-center'>";
        echo "<h4 class='mr-1 text-white'>", number_format($donnees['prix']), " $ </h4>";
        echo "</div>";
        // on cree une varible pour lui atribuer plusieur valeur et la faire transiter par l'url($_GET)
        $query = http_build_query(array(
            'imagepla' => $donnees['image'],
            'planete' => $donnees['nom'],
            'des' => $donnees['grosdes'],
        ));
        // sur cette ligne j'utilise du html php et js on peut voir l'utilisation des \ et " pour switcher de languague
        echo "<div class='d-flex flex-column mt-4'><input class='btn btn-primary btn-sm' type='button' value='A propos' onclick=\"window.location.href='ensavoirplus.php?{$query}'\"<input/><input value='Ajouter au panier' class='add btn btn-outline-primary btn-sm mt-2' type='button' onclick=\"window.location.href='addpanier.php?id=" . $donnees['idarticle'] . "&prix=", $donnees['prix'], "&act=1'\"></input></div>";
        echo "</div>";
        echo "</div>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    ?>
    <!-- ajout du footer -->
    <?php include("footer.php") ?>

    <!-- script JS -->
    <script src="footer.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>