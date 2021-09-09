<?php
//www.monsite.fr/article
//www.monsite.fr/index.php?demande = formation


//www.monsite.fr/article/:id()

try{
    if(!empty($_GET['demande'])){
        $url = explode("/", filter_var($_GET['demande'],FILTER_SANITIZE_URL));
        switch($url[0]){
            case "articles" : echo "articles";
            switch($url[1]){
                case "categorie" : echo "1";
                break;
            break;
            case "article" : echo "article";
            break;
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