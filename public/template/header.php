<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="titre" href="/projetphp/vue/index.php">P.M.U</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
              
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/projetphp/vue/index.php">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/projetphp/vue/cat_prod.php">Produit</a>
        </li>
      </ul>
<!--  /////////////////////////////////////////////Barre de Recherche/////////////////////////////////////////////////// -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <div class="p-3 bg-dark text-white">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-3" size="30" type="search" placeholder="Que cherchez vous ?" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="submit">Recherche</button>
            </form>
        </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Panier <span><i class="fas fa-cart-arrow-down"></i> 0</span></a>
        </li>
      </ul>   
      
      <!-- connexion -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="card">
              <article class="card-body">
                <h4 class="card-title text-center mb-4 mt-1">Connexion</h4>
                <hr>
                <form>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i></span>
                      </div>
                      <input name="mail" id="mail" class="form-control" placeholder="Email" type="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                      </div>
                      <input class="form-control" name="mdp" id="mdp" placeholder="******" type="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" id="connexion" class="btn btn-primary btn-block">Connexion</button>
                  </div>
                  <p class="text-center"><a href="#" class="btn">Vous avez perdu votre mot de passe ?</a></p>
                  <p class="text-center"><a href="#" class="btn">Inscription</a></p>
                </form>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>