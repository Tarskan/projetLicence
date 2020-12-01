<?php  
    include_once('../public/template/session.php');
    include_once('../models/ConnexionBdd.php');
    include_once('../models/ArticleManager.php');
    include_once('../models/panier.php');

    $panier = new Panier();
    $DBase = new Connect();
    $db = $DBase->connexion();
    $article = [];
    $articleDisplay = [];
    $articlePromo = [];
    $Art_man = new articleManager();

    if(!isset($_GET['id'])){
        header ("Location: cat_prod.php" );
    }
    $article = $Art_man->getInfo($_GET['id']);
    $articlePromo = $Art_man->getPromotionArticle($_GET['id']);

    // var_dump($_SESSION);
?>

<?php include_once('../public/template/session.php'); ?>

<html lang="fr">
    <head>
        <?php include_once('../public/template/head.php'); ?>
    </head>
    <body>
    
        <?php include_once('../public/template/header.php'); ?>

        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2">
                        <a href="javascript:history.back()" class="btn btn-success">Retour</a>
                    </div>
                    <div class="col-8 text-center">
                        <h3><?php echo $article[0]->getLibelle() ?></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <img src="<?php echo $article[0]->getImage() ?>" class="border border-dark shadow-sm card-img-top" alt=" <?php echo $article[0]->getNomImage() ?>">
                    </div>
                    <div class="col-5">
                        <h5>Description :</h5>
                        <p> <?php echo $article[0]->getDescription() ?> </p>
                        <?php if($article[0]->getPromotion() == NULL){ ?>
                            <span class="card-link">Prix : <?php echo $article[0]->getPrix() ?> ct</span>
                        <?php }
                            else{
                        ?>
                            <span class="card-link">Prix : <del><?php echo $articlePromo[0]->getPrix() ?> ct</del>  <?php echo $articlePromo[0]->getPrixPromo() ?> ct</span>
                            <span class="badge badge-success">- <?php echo $articlePromo[0]->getPourcentage() ?>%</span>
                            <?php } ?>
                        <a class="card-link btn btn-success ajouterPanier" href="/projetphp/controllers/ajouteAuPanier.php?id=<?php echo  $article[0]->getId()?>" name="acheter" id="acheter">Acheter</a>
                    </div>
                </div>           
            </div>
        </main>

        <?php include_once('../public/template/footer.php'); ?>

    </body>
</html>