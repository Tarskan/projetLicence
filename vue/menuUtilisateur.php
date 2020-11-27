<?php  
    include_once('../public/template/session.php');
    include_once('../models/ConnexionBdd.php');
    include_once('../models/panier.php');
    include_once('../models/ArticleManager.php');

    $panier = new Panier();
    $article = [];
    $Art_man = new articleManager();

    if(empty($_SESSION['email'])){
        header("location:/projetphp/vue/index.php");
    }
?>

<html lang="fr">
    <?php include_once('../public/template/head.php'); ?>

    <body>
    
        <?php include_once('../public/template/header.php'); ?>

        <main>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-6">
                        <h3>Historique d'achat</h3>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small>3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small>Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">List group item heading</h5>
                                <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <h3>Données personnelle du clients</h3>
                        <ul class="list-group">
                            <li class="list-group-item">Adresse Mail : <?php echo $_SESSION['email']; ?></li>
                            <li class="list-group-item">Nom complet : <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></li>
                            <li class="list-group-item">Raison social : <?php echo $_SESSION['raison']; ?></li>
                            <li class="list-group-item">Adresse: <?php echo $_SESSION['adresse']; ?></li>
                            <li class="list-group-item">Ville : <?php echo $_SESSION['ville'] . " " . $_SESSION['codePostal']; ?></li>
                            <li class="list-group-item">N° de telephone: <?php echo $_SESSION['tel']; ?></li>
                        </ul>
                        <div class="text-center">
                            <button onclick=window.location.href='../vue/modifierProfil.php' type="button" class="btn btn-warning mt-4">Modifier les informations</button>
                            <button data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-danger mt-4 ml-5">Supprimer son compte</button>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <h3>Contact</h3>
                        <a>Besoin d'aide pour votre compte ?</a></br>
                        <a>Besoin d'aide pour votre commande ?</a></br>
                        <a>Une réclamation ?</a>
                    </div>
                </div>    
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="card">
                            <article class="card-body text-center">
                                <h4 class="card-title text-center mb-4 mt-1">Êtes vous sur ?</h4>
                                <hr>
                                <form method="POST">
                                    <div class="form-group">
                                        <button onclick=window.location.href='../controllers/suppProfil.php' type="button" name="destruction" id="destruction" class="btn btn-danger">Supprimer son compte</button>
                                    </div>
                                    <p class="text-center">Cette opération est irréversible !</p>
                                </form>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include_once('../public/template/footer.php'); ?>

    </body>
</html>
