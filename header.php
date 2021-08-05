<!-- header -->
<header>
    <div class="row container-fluid" id="divVert"></div>

    <?php
    //on initie la quantité d'article dans mon panier sur "totalquantite" pour l'afficher sur ma pastille "panier"
    if (isset($_SESSION["panier"])) {
        $totalquantity = count($_SESSION["panier"]);
    } else {
        $totalquantity = 0;
    }
    ?>

    <!-- la navbar -->
    <nav class="navbar navbar-expand-md  navbar-dark">
        <a class="navbar-brand" href="index.php"><img src="IMG/logo.svg" alt="Logo" id="img_logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-md-flex flex-column" id="collapsibleNavbar">
            <ul class="col navbar-nav" id="navbar_espace">
                <li class="col-4 nav-item text-center">
                    <a class="nav-link text-white" href="destinations.php">Destinations</a>
                </li>
                <li class="col-4 nav-item text-center">
                    <a class="nav-link text-white" href="concours.php">Concours</a>
                </li>
                <li class="col-4 nav-item text-right">
                    <a class="nav-link text-white" href="livredor.php">Livre d'Or</a>
                </li>
            </ul>
            <ul class="col navbar-nav m-0">
                <li class="col-8 nav-item">
                    <!-- redirection sur panier plus la pastille panier = totalquantité -->
                    <a class="nav-link text-center text-white" href="addpanier.php">Panier<span id="pastille"><?php echo $totalquantity; ?></span></a>
                </li>
                <li class="col-3 nav-item">
                    <a class="nav-link text-white" href="pilote.php">Nos pilotes</a>
                </li>
            </ul>
</header>