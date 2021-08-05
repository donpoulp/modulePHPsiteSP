<?php require 'headercookie.php';
require 'headerDB.php'; ?>
<!-- initialisation des header base de donnees et session -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style2.css">
    <script src="js.js"></script>
    <title>Panier</title>
</head>

<body>

    <?php
    // on recupere toutes les infos de notre base de donnes article
    $panier_affich = $bdd->query('SELECT * FROM article');
    //  on initialise la variables donnes = a chaque lignes de notre base de donnees
    $donnees = $panier_affich->fetch();
    // total = 0 pose pas de question
    $total = 0;
    ?>
    <!-- ajout du header -->
    <?php include("header.php") ?>
    <!-- on ajoute notre page fonction avec toute nos fonctions -->
    <?php include("fonction.php");

    // on verifie que le bouton supprimer un article (qui envoie act3 par $_get) a bien ete recu
    if (isset($_GET['act3'])) {
        // on lance la fonction supprime article avec id
        suprimeArticle($_GET['id']);
    }
    // on verifie que l'input quantite (qui envoie quantite par $post) a bien ete recu.
    if (isset($_POST['quantite'])) {
        // si elle a ete envoyer alors la variable $quantitep devien la valeurs recu 
        $quantiteP = $_POST['quantite'];
    } else {
        // sinon la quantite = 1 de bases
        $quantiteP = 1;
    }
    // on verifie que le bouton ajouter au panier (qui envoie act par $_get) a bien ete recu
    if (isset($_GET['act'])) {
        // si oui on lance la fonction quantite avec les bon parametre et false
        modifQuantite($_GET['id'], $quantiteP, $_GET['prix'], false);
        // on refreche la page pour eviter d'avoir les $GET dans l'url sinon un refrech de page ajoute un autre article
        header('location:addpanier.php');
    }

    // on verifie que le bouton supprimer tout le panier (qui envoie act4 par $_get) a bien ete recu
    if (isset($_GET['act4'])) {
        // on lance la fonction supprime TOUT le panier
        suprimePanier();
    }
    // on verifie que l'input qui modifie la quantite(qui envoie act2 par $_get) a bien ete recu
    if (isset($_GET['act2'])) {
        // si oui on lance la fonction quantite avec les bon parametre et true
        modifQuantite($_GET['id'], $quantiteP, 0, true);
    }
    // on verifie que la SESSION panier existe
    if (isset($_SESSION['panier'])) {
        // pour chaque ligne de notre sessions panier
        foreach ($_SESSION['panier'] as $articles_list) {
            // on echo les 2 fonction dans un meme container
            echo "<div class='container mt-5 mb-5 blackB'>";
            //on affiche les articles en fonction de leurs id
            affichePanier($articles_list['id']);
            echo "<hr class='hr4'>";
            //on affiche la fonction total article qui permettra de modifier la quantite de larticle en question
            totalArticle($articles_list['id'], $articles_list['quantite'], $articles_list['price']);
            echo "</div>";
        }
        if (!empty($_SESSION['panier'])) {
        echo "<hr>";
        // en block en bas de ma page qui permet d'afficher le total du panier et de posseder le bouton pour lancer act4 sois supprimer le panier
        echo "<div class='container blackB'>";
        echo '<div class="row d-flex justify-content-between align-items-center">';
        echo "<div>";
        echo "<input class='btn btnred mt-3 mb-2 mr-3 ml-3' type='button' value='Supprimer le panier' onclick=\"window.location.href='addpanier.php?act4=1'\">";
        echo "</div>";
        echo "<div>";
        echo totalPanier();
        echo "</div>";
        echo "<div>";
        echo "<input class='btn btnpanier mt-3 mb-2 mr-3 ml-3' type='button' value='Valider le panier'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        }
    }
    // si notre SESSION panier est cree mais vide
    if (empty($_SESSION['panier'])) {
        echo "<div class='mt-5 mb-5'>";
        echo "<h1 class=text-center panier>Votre panier est actuellement vide.</h1>";
        echo "</div>";
    }
    ?>