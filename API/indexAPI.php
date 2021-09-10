<?php
// require 'fonction.php';
//www.monsite.fr/article
//www.monsite.fr/index.php?demande = formation
//www.monsite.fr/article/:id()

require '../headerDB.php';
require '../fonction.php';
$reponse = $bdd->query("SELECT * FROM article");
$donnees = $reponse->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
$access = false;
try{
    if(!empty($_GET['demande'])){
        $url = explode("/", filter_var($_GET['demande'],FILTER_SANITIZE_URL));
        switch($url[0]){
            case "token" : 
            if(!empty($url[1])){
                tokenAccess($url[1]);
                }else{
                throw new Exception ("Vous n'avez pas renseigner le token.");
                }
        break;
        }
        if ($access==true){ 
            switch($url[2]){
                case "articles" :  echo json_encode($donnees, JSON_PRETTY_PRINT);
                break;

                case "article" :
                    if(!empty($url[3])){
                    getArticleById($url[3]);
                    }else{
                    throw new Exception ("Vous n'avez pas renseigner le numero d'article.");
                    }
                break;

                case "categorie" :
                    if(!empty($url[3])) {
                        GetArticleBycategorie($url[3]);
                    }
                    else{
                        throw new Exception ("Vous n'avez pas renseigner le numero de Catégorie.");
                    }
                break;

                case "commande" : 
                    if(!empty($url[3])){
                        getHistoCommById($url[3]);
                        }else{
                        throw new Exception ("Vous n'avez pas renseigner le numero de la commande.");
                        }
                break;

                case "commandes" : getHistoComm();
                break;

                default :  throw new Exception ("La demande n'est pas valide ! verifier l'url.");
            }}else{
                throw new Exception ("Problème de récuperation de TOKENNNNNNNN.");
            }
        }else{
            throw new Exception ("Problème de récuperation de données.");
        }
}catch(Exception $e){
    $erreur =[
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}



?>