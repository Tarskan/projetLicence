<?php 
include_once('../public/template/session.php');
include_once('../models/ConnexionBdd.php');
include_once('../models/conseil.php');
include_once('../models/conseilManager.php');

$conseil = [];
$DBase = new Connect();
$db = $DBase->connexion();

$Con_Man = new conseilManager();
$conseils = $Con_Man->listeConseils();
$tailleConseils = sizeof($conseils);
?>

<html lang="fr">
    <?php include_once('../public/template/head.php'); ?>

    <body>
    
        <?php include_once('../public/template/header.php'); ?>

        <main>
            <div class="container">
            <?php
                for ($i=0; $i < $tailleConseils; $i++) { 
            ?>
            <div class="row mt-3">
                    <div class="col">
                        <div class="media">
                        <iframe width="560" height="315" src="<?php echo $conseils[$i]->getVideo()?>" frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="align-self-start mr-3"></iframe>
                            <div class="media-body">
                                <h5 class="mt-0"><?php echo $conseils[$i]->getTitre() ?></h5>
                                <p><?php echo $conseils[$i]->getLibelle() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            </div>
        </main>

        <?php include_once('../public/template/footer.php'); ?>

    </body>
</html>
