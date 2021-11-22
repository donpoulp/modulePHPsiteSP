<?php
// fonction pour afficher mes articles
function affichePanier($idArticle)
{
    // initialisation de la bdd
    require 'headerDB.php';
    // importation de toute la bdd article
    $panier_affichP = $bdd->query("SELECT * FROM article WHERE idarticle = '$idArticle'");
    // boucles pour chaque ligne de ma bdd
    while ($donnees = $panier_affichP->fetch()) {
        //  on verifie si l'id recu en parametre est le meme que l'id d'un article de notre base de donnees 
        // if ($idArticle == $donnees['idarticle']) {

            //on affiche l'article en reprenans les element de notre bdd  
            echo "<div class='row d-flex justify-content-around align-items-center'>";
            echo '<div class="mt-1">';
            echo "<h1 class='text-white titre2'>" . $donnees['nom'] . "</h1>";
            echo "</div>";
            echo "<div class='col-3 mt-4'>";
            //  echo $_SESSION['id'];
            echo '<img class="img-fluid img-responsive rounded product-image" src="' . $donnees['image'] . '">';
            echo "</div>";
            // echo"</div>";

            echo "<div class=' align-items-center align-content-center mt-2'>";
            // number_format permet de transformer 10000 en 10,000
            echo "<h4 class='mr-1 text-white'>Prix/personne = ", number_format($donnees['prix']), " $ </h4><br>";
            // bouton qui permet de supprimer l'article du panier en envoyant act3 par $get a addpanier.php + l'id de l'article
            echo "<input class='btn btnred d-flex flex-row align-items-center align-baseline mt-2' type='button' value='Supprimer' onclick=\"window.location.href='addpanier.php?act3=1&id=" . $idArticle . "'\">";
            echo "</div>";
            echo "</div>";
        }
    // }
}
// fonction qui calcule le prix de larticle en fonction de ça quantité dans le panier
function totalArticle($id, $quantite, $price)
{
    // on initialise la bdd
    require 'headerDB.php';
    // on recupere tout les element de notre bdd
    $panier_affichP = $bdd->query("SELECT * FROM article WHERE idarticle = '$id'");
    // boucle pour chaque ligne de ma bdd
    $donnees = $panier_affichP->fetch();
        //  on verifie si l'id recu en parametre est le meme que l'id d'un article de notre base de donnees  
        // if ($id == $donnees['idarticle']) {
            // on calcule le total avec les variables recu en parametre
            $total_article = $quantite * $price;
            echo "<div class='row d-flex justify-content-around align-items-center'>";
            echo "<div class='mt-3 mb-4 mr-3 ml-3'>";
            // formulaire pour changer la quantite qui renvoie la quantite par $post a addpanier.php + l'id et le prix de larticle a modifier
            echo "<form action='addpanier.php?id=" . $id . "&prix=", $donnees['prix'], "&act2=1' method='POST'>";
            // echo "<div>";
            echo "<label for='depart' class='form-label'></label>";
            echo "<h4 class='mr-1 text-white'>Pour  <input type='number' min='1' max='15' name='quantite' value='$quantite' id='depart' placeholder='1'> personnes </h4>";
            echo "</form>";
            echo "</div>";

            echo "<div class='mt-3 mr-3 ml-3'>";
            // number_format permet de transformer 10000 en 10,000
            echo "<h4 class='mr-1 text-white'>Total = ", number_format($total_article), " $ </h4>";
            echo "</div>";
            echo "</div>";
        }
//     }
// }

// fonction modif quantite qui verifie si l'article existe deja avant de le modifier sois il cree un nouvelle article sois si l'article est deja ajouter au panier il ajoute 1 en quantite
function modifQuantite($id, $quantite, $prix, $ajout){
    $existe = false;
    // si la session n'existe pas on cree une session panier
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'][] = ['id' => $id, 'quantite' => $quantite, 'price' => $prix];
    } else {
        // on initie une varibles egale au nombre d'article dans notre panier
        $count = count($_SESSION['panier']);
        // boucle avec $i qui va faire autant de tour que d'article dans le panier
        for ($i = 0; $i < $count; $i++) {
            // on compare l'id recu avec les different id des articles du panier pour identifier le bon
            if ($id == $_SESSION['panier'][$i]['id']) {
                // si on apuie sur le bouton modifier quantite alors la valeurs donner en parametre est true donc on modifie la quantité
                if ($ajout == true) $_SESSION['panier'][$i]['quantite'] = $quantite;
                // si on apuie sur le bouton ajouter au panier alors la valeurs donner en parametre est false donc on ajoute 1 de valeurs a larticle trouver
                if ($ajout == false) $_SESSION['panier'][$i]['quantite'] += $quantite;
                //on renvoie la valeurs false
                $existe = true;
            }
            // si l'article n'est pas trouver dans les verification au dessus alors on en cree un nouveau 
        }
        if (!$existe) {
            $_SESSION['panier'][] = ['id' => $id, 'quantite' => $quantite, 'price' => $prix];
        }
    }
}
// fonction qui suprime un article
function suprimeArticle($id)
{
    // boucle pour chaque ligne dans ma session panier qui en + atribue a $k une valeurs
    foreach ($_SESSION['panier'] as $k => $v) {
        //on verifie si l'id recu en parametre est egal a l'id d'un de nos articles present dans le panier
        if ($id == $_SESSION['panier'][$k]['id']) {
            // unset permet de supprimer et $k localise l'id de larticle a supprimer
            unset($_SESSION['panier'][$k]);
            // PROBLEME apres la suppression d'une ligne d'un tableau 1 2 3 devien 1 3 donc on rearange le tableau apres la suppresion avec array_values
            $_SESSION['panier'] = array_values($_SESSION['panier']);
            // on actualise la page pour appliquer les changement et on lui vide son url des $get
            header('location:addpanier.php');
        }
    }
}
// function pour supprimer tout les article du panier
function suprimePanier()
{
    //on verifie si la Session Panier existe bien
    if (isset($_SESSION['panier'])) {
        // /unset() pour supprimer le panier complet
        unset($_SESSION['panier']);
        // on rafraichie la page pour eviter quelque probleme de variables non definie
        header('location:addpanier.php');
    }
}
// function total de tout le panier
function totalPanier()
{
    // on initialise le total a 0
    $total = 0;
    // on verifie si la session panier existe
    if (isset($_SESSION['panier'])) {
        // boucle pour faire chaque liigne de ma session panier
        foreach ($_SESSION['panier'] as $k => $v) {
            // on calcule le total du panier en parcourant tout notre tableau grace a $k et la boucle foreach. total c'est quantite * prix pour chauque ligne de la session
            $totalpanier = $_SESSION['panier'][$k]['quantite'] * $_SESSION['panier'][$k]['price'];
            // on stack le resultat dans une autre variables pour plus de facilite
            $total = $totalpanier + $total;
        }
        echo "<h4 class='mr-1 text-white text-center mt-3 mb-2 mr-3 ml-3'>Total panier = ", number_format($total), " $ </h4><br>";
    }
}

function connection($username,$password)
{
        require 'headerDB.php';
        $r_client = $bdd->query("SELECT mdp FROM client WHERE username = '$username'");
        $donnees = $r_client->fetch();
        //  if ($donnees['username'] == $username ){
            if ($donnees['mdp'] == $password){
                $_SESSION['username'] = $username;
            // echo "<p>bravo tu est conneter</p>";
            header("Location: index.php?act=5");
    //         }
    //     }
    }else{
    echo "<span class='erreur'>Le nom d'utilisateur ou le mot de passe est incorrect.</span>";
    }
}

function inscription($username,$email,$password)
{
        require 'headerDB.php';
        $inscription = $bdd->query("SELECT username, email FROM client WHERE username = '$username' OR email ='$email'");
        if( $inscription->fetch() == true){
            echo "<div class='container-fluid text-center'>";
            echo "<div class='sucess'>";
            echo "<h3 class='erreur'>Le nom d'utilisateur ou l'adresse mail est déja utilisée ou incorect.</h3>";
            echo "<p>Cliquez ici pour vous <a href='register.php'>réessayer</a></p>";
            echo "</div>";
            echo "</div>";
            $inscription->closeCursor();
        }else{
        $register = $bdd->prepare('INSERT INTO client(id, username, email, mdp) VALUES(?, ?, ?, ?)');
        $register->execute(array(NULL,$username, $email, $password));

        echo "<div class='container d-flex text-center'>";
        echo "<div class='row align-items-center h-100'>";
        echo "<div class='col-12'>";
        echo "<div class='h-100 justify-content-center'>";
        echo "<h3>Vous êtes inscrit avec succès.</h3>";
        echo "<p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}

function getArticleById($id)
{
    require 'headerDB.php';
    $reponse = $bdd->query("SELECT * FROM article WHERE idarticle=$id");
    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($donnees, JSON_PRETTY_PRINT);
}

function getHistoComm(){
    require 'headerDB.php';
    // Gestion des erreurs : PDO::ATTR_ERRMODE : rapport d'erreurs => PDO::ERRMODE_EXCEPTION : qui émet une exception

    $reponse = $bdd->query("SELECT commande.idCommande, dateCommande, idClient, GROUP_CONCAT(nom) as article, SUM(article.prix) as PrixTtcArticles, SUM(article.prix)/1.20 as PrixHtArticles, SUM(commandeaddarticle.quantite) as nombreArticlesTest
    FROM commande INNER JOIN commandeaddarticle ON commande.idCommande=commandeaddarticle.idCommande
    INNER JOIN article ON commandeaddarticle.idArticle=article.idarticle 
    GROUP BY idCommande");

    // on créé la réponse = ou l'on va chercher la BDD et le langage SQL que l'on veut

    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC => affiche uniquement les données sous forme de prixarticles = 105 et non 0(index) = 105
    header('Content-Type: application/json'); // On renvoie du json 
    echo json_encode($donnees, JSON_PRETTY_PRINT); // fonction PHP pour mettre en tab
}

function getHistoCommById($id){
    require 'headerDB.php';
    // Gestion des erreurs : PDO::ATTR_ERRMODE : rapport d'erreurs => PDO::ERRMODE_EXCEPTION : qui émet une exception

    $reponse = $bdd->query("SELECT commande.idCommande, dateCommande, idClient, GROUP_CONCAT(nom) as article, SUM(article.prix) as PrixTtcArticles, SUM(article.prix)/1.20 as PrixHtArticles, SUM(commandeaddarticle.quantite) as nombreArticlesTest
    FROM commande INNER JOIN commandeaddarticle ON commande.idCommande=commandeaddarticle.idCommande
    INNER JOIN article ON commandeaddarticle.idArticle=article.idarticle 
    WHERE commande.idCommande=$id");

    // on créé la réponse = ou l'on va chercher la BDD et le langage SQL que l'on veut

    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC => affiche uniquement les données sous forme de prixarticles = 105 et non 0(index) = 105
    header('Content-Type: application/json'); // On renvoie du json 
    echo json_encode($donnees, JSON_PRETTY_PRINT); // fonction PHP pour mettre en tab
}

function tokenAccess($url){
    require 'headerDB.php';
    $reponse = $bdd->query("SELECT token FROM token WHERE token=$url");
    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($donnees)){
        return true;
    }
}

function getArticleByCategorie($categorie)
{
    require 'headerDB.php';
    $reponse = $bdd->query("SELECT * FROM article WHERE categorie=$categorie");
    $donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($donnees, JSON_PRETTY_PRINT);
}