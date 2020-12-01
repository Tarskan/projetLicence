<?php  
    include_once('../public/template/session.php');
    include_once('../models/ArticleManager.php');
    include_once('../models/ConnexionBdd.php');
    include_once('../models/panier.php');
    include_once('../models/CategorieManager.php');
    include_once('../models/conseilManager.php');
    include_once('../models/ClientManager.php');

    $panier = new Panier();
    $article = [];
    $Art_man = new articleManager();
    $DBase = new Connect();
    $db = $DBase->connexion();
    $Cat_man = new CategorieManager();
    $Art_man = new articleManager();
    $Conseil_man = new conseilManager();
    $Cli_man = new clientManager();

    if($_SESSION['libellé'] != "Administrateur"){
        header("location:/projetphp/vue/index.php");
    }

?>

<html class="m-0 p-0">
    <head>
            <?php include_once('../public/template/head.php'); ?>
    </head>
    <body>
        <?php include_once('../public/template/header.php'); ?>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-2 bg-dark">
                    <p class="titre nav-link text-white">Panel Admin</p>
                    <div class="nav flex-column nav-pills text-white" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active p-4" id="v-pills-acceuil-tab" data-toggle="pill" href="#v-pills-acceuil" role="tab" aria-controls="v-pills-acceuil" aria-selected="true">Acceuil</a>
                    <a class="nav-link p-4" id="v-pills-categorie-tab" data-toggle="pill" href="#v-pills-categorie" role="tab" aria-controls="v-pills-categorie" aria-selected="false">Categorie</a>
                    <a class="nav-link p-4" id="v-pills-produit-tab" data-toggle="pill" href="#v-pills-produit" role="tab" aria-controls="v-pills-produit" aria-selected="false">Produit</a>
                    <a class="nav-link p-4" id="v-pills-conseil-tab" data-toggle="pill" href="#v-pills-conseil" role="tab" aria-controls="v-pills-conseil" aria-selected="false">Conseil</a>
                    <a class="nav-link p-4" id="v-pills-utilisateur-tab" data-toggle="pill" href="#v-pills-utilisateur" role="tab" aria-controls="v-pills-utilisateur" aria-selected="false">Utilisateur</a>
                    <a class="nav-link p-4" id="v-pills-commande-tab" data-toggle="pill" href="#v-pills-commande" role="tab" aria-controls="v-pills-commande" aria-selected="false">Commande</a>
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-acceuil" role="tabpanel" aria-labelledby="v-pills-acceuil-tab"><?php include_once('adminAcceuil.php') ?></div>
                    <div class="tab-pane fade" id="v-pills-categorie" role="tabpanel" aria-labelledby="v-pills-categorie-tab"> <?php include_once('adminCategorie.php') ?></div>
                    <div class="tab-pane fade" id="v-pills-produit" role="tabpanel" aria-labelledby="v-pills-produit-tab"><?php include_once('adminProduit.php') ?></div>
                    <div class="tab-pane fade" id="v-pills-conseil" role="tabpanel" aria-labelledby="v-pills-conseil-tab"><?php include_once('adminConseil.php') ?></div>
                    <div class="tab-pane fade" id="v-pills-utilisateur" role="tabpanel" aria-labelledby="v-pills-utilisateur-tab"><?php include_once('adminUtilisateur.php') ?></div>
                    <div class="tab-pane fade" id="v-pills-commande" role="tabpanel" aria-labelledby="v-pills-commande-tab"><?php include_once('adminCommande.php') ?></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>