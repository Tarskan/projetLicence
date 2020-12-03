<?php  
    include_once('../public/template/session.php');
    include_once('../models/ConnexionBdd.php');
    include_once('../models/CategorieManager.php');
    include_once('../models/Categorie.php');
    include_once('../models/ArticleManager.php');
    include_once('../models/panier.php');

    $categories = [];
    $article = [];
    $articlePromo = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $Cat_man = new CategorieManager();
    $Art_man = new articleManager();

    $panier = new Panier();
    $panier->creationPanier();

    if(isset($_GET['categorie'])){
        $article = $Art_man->getList($_GET['categorie']);
        $articlePromo=$Art_man->getPromotionCategorie($_GET['categorie']);
    }
    else{
        $article = $Art_man->getList('%');
        $articlePromo=$Art_man->getPromotionCategorie('%');
    }
    $categories = $Cat_man->listeCategorie();
    $tailleCategories = sizeof($categories);
    $tailleArticle = sizeof($article);
    $tailleArticlePromo = sizeof($articlePromo);

    // var_dump($_SESSION);
?>



<html lang="fr">
    <?php include_once('../public/template/head.php'); ?>
    <body>
    
        <?php include_once('../public/template/header.php'); ?>

        <main>
<!--  /////////////////////////////////////////////Catégorié et conseil/////////////////////////////////////////////////// -->
           <div class="container-fluid">
               <div class="row ml-1 p-2">
                    <div class="col-3">
                        <div class="row shadow-sm m-1 p-3 mb-5 bg-white rounded">
                            <div class="col">
                                <a>Catégorie :</a>
                                <div class="list-group">
                                    <?php 
                                        for ($i=0; $i < $tailleCategories; $i++) { 
                                            echo '<a class="list-group-item list-group-item-action" href="cat_prod.php?categorie='.$categories[$i]->getId().'">'. $categories[$i]->getLibelle() . '</a> ';
                                        }

                                     ?>
                                </div>
                            </div>
                        </div>
                    </div>
<!--  /////////////////////////////////////////////Les Cartes produits/////////////////////////////////////////////////// -->
<!--  /////////////////////////////////////////////Chaque ligne peut contenir 3 cartes produits/////////////////////////////////////////////////// -->
                    <div class="col-9">
                        <div class="row m-1 p-3 mb-5 bg-white rounded">
                            <div class="col">
                                <div class="row">
<?php
    $y = 0;
    for ($i=0; $i < $tailleArticle; $i++) { 
?>
    
                                    <div class="col-4">
                                        <div class="card border border-dark  shadow-sm bg-dark  text-white rounded">
                                            <img src=<?php echo '"'.$article[$i]->getImage().'"'?> class="card-img-top" alt="<?php echo $article[$i]->getNomImage()?>">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="card-title"><?php echo $article[$i]->getLibelle() ?></h5>
                                                        <?php 
                                                        if($article[$i]->getPromotion() != NULL){
                                                        if($article[$i]->getId() == $articlePromo[$y]->getId()){ 
                                                        ?>
                                                            <span class="card-link">Prix : <del><?php echo $articlePromo[$y]->getPrix() ?> €</del>  <?php echo $articlePromo[$y]->getPrixPromo() ?> €</span>
                                                            <span class="badge badge-success">- <?php echo $articlePromo[$y]->getPourcentage() ?>%</span>
                                                        <?php 
                                                            $y++;
                                                            }
                                                            else{
                                                        ?>
                                                            <span class="card-link">Prix : <?php echo $article[$i]->getPrix() ?> €</span>
                                                        <?php
                                                            }}
                                                            else{
                                                        ?>
                                                            <span class="card-link">Prix : <?php echo $article[$i]->getPrix() ?> €</span>
                                                        <?php
                                                            }
                                                        ?>
                                                        <a href="pageProduit.php?id=<?php echo  $article[$i]->getId()?>"><button class="card-link btn btn-success" name="info" id="info">Information</button></a>
                                                        <a class="card-link btn btn-success ajouterPanier" href="/projetphp/controllers/ajouteAuPanier.php?id=<?php echo  $article[$i]->getId()?>" name="acheter" id="acheter">Acheter</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php
    }
?>
                            </div>
                        </div>
                    </div>
               </div>
           </div>
        </main>

        <?php include_once('../public/template/footer.php'); ?>

    </body>
</html>