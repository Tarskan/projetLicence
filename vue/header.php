<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a id="titre">P.M.U</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cat_prod.php?categorie=1">Produit</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Conseil</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"> 
                <!-- Activateur du modal bootstrap pour connexion -->
                    <a class="nav-link"  data-toggle="modal" data-target="#connexion">Compte</a>
                    
                        <!-- Modal ou fenetre d'affichage-->
                    <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="popconnexion" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title " id="exampleModalLongTitle">Connexion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="index.php" method="post">
                                        <input type="text" name="username" placeholder="Identifiant"></br>
                                        <input type="password" name="password" placeholder="Mot de passe"></br>
                                        <?php
                                            if (isset($loginErr)) { ?>
                                                <div class="loginErr"><?php echo $loginErr; ?></div>
                                            <?php }
                                        ?>
                                        <input class="submit" type="submit" name="login" value="connexion">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <p class="text-center"><i class="far fa-copyright"></i> 2020 ******, Inc. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li> 
                <li class="nav-item"> 
                    <a class="nav-link" href="#">Panier</a>
                </li>
                <li>
                    <i class="panier fas fa-cart-arrow-down"></i>
                    <span class="panier">0</span>
                </li>
            </ul>
        </div>
    </nav>
</header>