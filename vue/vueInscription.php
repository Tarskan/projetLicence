<?php  
    include_once('../public/template/session.php');
    include_once('../models/ConnexionBdd.php');
    include_once('../models/panier.php');
    include_once('../models/ArticleManager.php');
    
    $panier = new Panier();
    $article = [];
    $Art_man = new articleManager();
    
?>
<html lang="fr">
    <?php include_once('../public/template/head.php'); ?>

    <body>
    
        <?php include_once('../public/template/header.php'); ?>

        <main>
        <div class="container-fluid mt-3">
                <div class="row">
                    <div class="col-2">
                        <button onclick=window.location.href='../vue/menuUtilisateur.php' class="btn btn-success">Retour</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <h3 class="text-center">Inscription</h3>
                        <form action="../controllers/inscription.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <?php
                                    if (isset($mailErr)) { 
                                        echo('<div class="text-center alert alert-danger">');  
                                        echo $mailErr ;
                                        echo('</div>');
                                    } 
                                    ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" class="form-control" id="mdp" name="mdp" required>
                                    <?php
                                    if (isset($mdpErr)) { 
                                        echo('<div class="text-center alert alert-danger">');  
                                        echo $mdpErr ;
                                        echo('</div>');
                                    } 
                                    ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" required>
                                    <?php
                                    if (isset($nomErr)) { 
                                        echo('<div class="text-center alert alert-danger">');  
                                        echo $nomErr ;
                                        echo('</div>');
                                    } 
                                    ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                                    <?php
                                    if (isset($prenomErr)) { 
                                        echo('<div class="text-center alert alert-danger">');  
                                        echo $prenomErr ;
                                        echo('</div>');
                                    } 
                                    ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="raisonSocial">Raison social</label>
                                    <input type="text" class="form-control" id="raisonSocial" name="raisonSocial">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse" required>
                                    <?php
                                    if (isset($loginErr)) { 
                                        echo('<div class="text-center alert alert-danger">');  
                                        echo $loginErr ;
                                        echo('</div>');
                                    } 
                                    ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-8">
                                    <label for="ville">Ville</label>
                                    <input type="text" class="form-control" id="ville" name="ville" required>
                                    <?php
                                    if (isset($loginErr)) { 
                                        echo('<div class="text-center alert alert-danger">');  
                                        echo $loginErr ;
                                        echo('</div>');
                                    } 
                                    ?>
                                </div>
                                <div class="form-group col-4">
                                    <label for="codePostal">Code postal</label>
                                    <input type="number" class="form-control" id="codePostal" name="codePostal" required>
                                    <?php
                                    if (isset($loginErr)) { 
                                        echo('<div class="text-center alert alert-danger">');  
                                        echo $loginErr ;
                                        echo('</div>');
                                    } 
                                    ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="ntel">N° de téléphone</label>
                                    <input type="number" class="form-control" id="ntel" name="ntel">
                                </div>
                            </div>
                            <div class="text-center"><button type="submit" name="inscription" id="inscription" class="btn btn-success mt-4">Inscription</button></div>
                        </form>                    
                    </div>
                </div>           
            </div>  
        </main>

        <?php include_once('../public/template/footer.php'); ?>

    </body>
</html>