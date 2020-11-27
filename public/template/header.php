<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="titre nav-link text-white" href="/projetphp/vue/index.php">P.M.U</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
              
    <div class="collapse navbar-collapse pl-5" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/projetphp/vue/index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cat_prod.php">Produit</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/projetphp/vue/lesConseils.php">Conseils</a>
        </li>
      </ul>
<!--  /////////////////////////////////////////////Barre de Recherche/////////////////////////////////////////////////// -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <div class="pt-2 pb-2 bg-dark text-white">
            <form action="../controllers/rechercheProduit.php" method="POST" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-3" id="searchBar" name="searchBar" size="30" type="search" placeholder="Que cherchez vous ?" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="recherche" id="recherche">Recherche</button>
            </form>
        </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link">Panier <span><i class="fas fa-cart-arrow-down"></i> 0</span></a>
        </li>
        <li class="nav-item">
        <?php
        if(isset($_SESSION['email'])){
          echo('<a class="nav-link">');
          echo $_SESSION['email'];
          echo('</a>');
          
        } else {
          echo('<a class="nav-link" data-toggle="modal" data-target="#exampleModal">Connexion</a>');
        }
        ?>
        </li>
        <?php
        if(isset($_SESSION['email'])){
          echo('<li class="nav-item">');
          echo('<a class="nav-link" id="deconnexion" name="deconnexion" href="../public/template/deconnexion.php"><span class="fa fa-power-off fa-2x"></span></a>');
          echo('</li>');
        }
        ?>
      </ul>   
      
      <!-- connexion -->
      <?php
      if(isset($_SESSION['email'])){
      } else {
         include_once('../public/template/connexion.php');
      }
      ?>
    </div>
  </nav>
</header>