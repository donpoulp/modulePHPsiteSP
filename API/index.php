<?php
// require 'fonction.php';
//www.monsite.fr/article
//www.monsite.fr/index.php?demande = formation


//www.monsite.fr/article/:id()
require '../headerDB.php';
$reponse = $bdd->query("SELECT * FROM article");
$donnees = $reponse->fetchAll();
header('Content-Type: application/json');
try{
    if(!empty($_GET['demande'])){
        $url = explode("/", filter_var($_GET['demande'],FILTER_SANITIZE_URL));
        switch($url[0]){
            case "articles" :  echo json_encode($donnees, JSON_PRETTY_PRINT);
            break;
            // case "article" : 
            //     if(!empty($url[1])){
            //     GetArticleById($url[1]);
            // }else{
            //     throw new Exception ("Vous n'avez pas renseigner le numero d'article.");
            // }
            // break;
            default :  throw new Exception ("La demande n'est pas valide ! verifier l'url.");
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