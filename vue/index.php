<?php  
    include_once('../public/template/session.php');
    include_once('../models/ConnexionBdd.php');
    include_once('../models/CategorieManager.php');
    include_once('../models/ArticleManager.php');

    $categories = [];
    $ventes = [];
    $articlePromo = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $Cat_man = new CategorieManager();
    $Art_man = new articleManager();
    $ventes = $Art_man->getMeilleureVente();
    $tailleVente = sizeof($ventes);
    $articlePromo = $Art_man->lastPromotion();
    $tailleArticlePromo = sizeof($articlePromo);
    $categories = $Cat_man->listeCategorie();
    $tailleCategories = sizeof($categories);

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
                                <ul>
                                    <?php 
                                        for ($i=0; $i < $tailleCategories; $i++) { 
                                            echo '<li> <a href="cat_prod.php?categorie='.$categories[$i]->getId().'">'. $categories[$i]->getLibelle() . '</a></li> ';
                                        }

                                     ?>
                                </ul>
                            </div>
                        </div>
                        <div class="row shadow-sm m-1 p-3 mb-5 bg-white rounded">
                            <div class="col">
                                <a>Conseil</a>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <iframe width="320" height="185" src="https://www.youtube.com/embed/grFK-PqOKp8" frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
<!--  /////////////////////////////////////////////Promotion/////////////////////////////////////////////////// -->
                    <div class="col-6">
                        <div class="row shadow-sm m-1 p-3 mb-5 bg-white rounded">
                            <div class="col">
                                <div class="">
                                    <a>Promotion</a>
                                    <div class ="row">
                                        <?php
                                            $y = 0;
                                            for ($i=0; $i < $tailleArticlePromo; $i++) { 
                                        ?>
                                            
                                            <div class="col-6">
                                                <div class="card border border-dark  shadow-sm bg-dark  text-white rounded">
                                                    <img src=<?php echo '"'.$articlePromo[$i]->getImage().'"'?> class="card-img-top" alt="<?php echo $articlePromo[$i]->getNomImage()?>">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <h5 class="card-title"><?php echo $articlePromo[$i]->getLibelle() ?></h5>
                                                                <span class="card-link">Prix : <del><?php echo $articlePromo[$i]->getPrix() ?> ct</del>  <?php echo $articlePromo[$i]->getPrixPromo() ?> ct</span>
                                                                <span class="badge badge-success">- <?php echo $articlePromo[$i]->getPourcentage() ?>%</span>
                                                            <a href="pageProduit.php?id=<?php echo  $articlePromo[$i]->getId()?>"><button class="card-link btn btn-success" name="info" id="info">Information</button></a>
                                                                <button class="card-link btn btn-success" name="acheter" id="acheter">Acheter</button>
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
<!--  /////////////////////////////////////////////Meilleurs vente/////////////////////////////////////////////////// -->
                    <div class="col-3">
                        <div class="row shadow-sm m-1 p-3 mb-5 bg-white rounded">
                            <div class="col">
                                <a>Meilleur vente :</a>
                                <ul>
                                <?php 
                                    for ($i=0; $i < $tailleVente; $i++) { 
                                        echo '<li> '. $ventes[$i]->getLibelle() . '</li> ';
                                    }

                                ?>
                                </ul>
                            </div>
                        </div>
                    </div>   
               </div>
           </div>
        </main>

        <?php include_once('../public/template/footer.php'); ?>

    </body>
</html>
