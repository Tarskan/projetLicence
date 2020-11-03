<?php  
    include_once('../public/template/session.php');
    include_once('../models/ConnexionBdd.php');
    include_once('../models/ArticleManager.php');


    $article = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $Art_man = new articleManager();

    if(!isset($_GET['id'])){
        header ("Location: cat_prod.php" );
    }
    $article = $Art_man->getInfo($_GET['id']);

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
                        <button class="btn btn-success">Retour</button>
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
                        <span class="card-link">Prix : <?php echo $article[0]->getPrix() ?> ct</span>
                        <button class="card-link btn btn-success" name="acheter" id="acheter">Acheter</button>
                    </div>
                </div>           
            </div>
        </main>

        <?php include_once('../public/template/footer.php'); ?>

    </body>
</html>