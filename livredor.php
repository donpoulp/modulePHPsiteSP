<?php require 'headercookie.php'; ?>
<!-- au dessus on initie la session -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style2.css">
    <title>Livre d'or</title>
</head>

<body>
    <?php
    // on ce connect a la base de données 
    $bdd = new PDO('mysql:host=localhost:3307;dbname=livredor', 'raphael', 'petrozzi');

    // on verifie que les infos du formulaire on bien été remplie avant de faire quoi que ce sois
    if (isset($_POST['nom']) && isset($_POST['commentaire'])) {
        // on attribut les infos reçu par le formulaire($Post) a de nouvelle variables
        $name = $_POST['nom'];
        $com = $_POST['commentaire'];

        try {
            // on attribut un mode d'erreure lisible pour pouvoir regler les problemes plus facilement
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // on verifie que les infos du formulaire ne sont pas vide pas d'espaces quoi
            if (!empty($name) && !empty($com)) {
                // si toute les verification sont valider alors on ajoute dans notre base de donnees(livredor) les infos recu par le formulaire($post)
                $question = $bdd->prepare('INSERT INTO livredor(nom, commentaire) VALUES(?, ?)');
                $question->execute(array(($name), ($com)));
            }
        }
        // si ça beug lors de l'ajout des donnees a la base de donnes ou print
        catch (PDOException $e) {
            echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
        }
    }

    // j'importe toute les infos de ma bdd pour les utiliser sur cette page
    $reponse = $bdd->query('SELECT * FROM livredor');
    ?>
    <!-- ajout du header -->
    <?php include("header.php") ?>

    <div class="row d-flex justify-content-center w-75 mx-auto">

        <div class=" h-40 mt-5 container-fluid pt-4 blackB">
            <div class="row">
                <h1 class="col text-center h1r">Livre d'<strong>or</strong></h1>
            </div>
            <hr class='hr1'>
            <!-- pour chaque ligne de ma bdd livredor j'afiche le message de lutilisateur (si il y a 10 messagestocker dans la bdd ça affiche les 10message grace a la boucle) -->
            <?php while ($donnees = $reponse->fetch()) {
                echo "<div class='row pt-3'>";
                echo "<h3 class='col text-center'>" . $donnees['nom'] . " : </h3>";
                echo "</div>";

                echo "<div class='row pt-3'>";
                echo "<p class='col text-center'>" . $donnees['commentaire'] . "</p>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <div class="row my-5 d-flex justify-content-center w-75 mx-auto">

        <div class="container blackB col-xl-8 col-lg-12 h-50 align-self-center">
            <h1 class="text-center text-white h-25 my-5">Vos commentaires</h1>
            <hr class="hr3">
            <div class="row w-75 mx-auto h-50">

                <div class="col-12">
                    <!-- formulaire qui recupere le nom et le message de lutilisateur(par $post) pour les envoyer a la bdd et les afficher sur la page -->
                    <form action="livredor.php" method="POST">
                        <div>
                            <label for="depart" class="form-label"></label>
                            <input type="text" class="form-control" name="nom" id="depart" placeholder="Nom">
                        </div>
                        <div>
                            <label for="date" class="form-label"></label>
                            <textarea class="form-control" id="date" name="commentaire" placeholder="Commentaires"></textarea>
                        </div><br>

                        <div class="row pt-3 pb-3">
                            <div class="col text-center butenvoie">
                                <input type="submit" class="btn btn-secondary text-warning"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ajout du footer -->
    <?php include("footer.php") ?>

    <!-- scipt JS -->
    <script src="footer.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>