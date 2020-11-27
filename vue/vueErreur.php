<?php 
include_once('../public/template/session.php'); 
include_once('../models/panier.php');
include_once('../models/ArticleManager.php');

$article = [];
$Art_man = new articleManager();
$panier = new Panier();

?>


<html lang="fr">
    <head>
        <?php include_once('../public/template/head.php'); ?>
    </head>
    <body>
    
        <?php include_once('../public/template/header.php'); ?>

        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="jumbotron">
                        <p>Vous vous êtes perdu je pense :/</p>
                    </div>
                </div>           
            </div>
        </main>

        <?php include_once('../public/template/footer.php'); ?>

    </body>
</html>