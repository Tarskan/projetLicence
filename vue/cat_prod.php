<html lang="fr">
    <head>
        <title>P.M.U</title>
        <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../public/css/indexcss.css">
        <script src="https://kit.fontawesome.com/28132c3659.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php include_once('header.php'); ?>
        <main>
           <div>
               <div class="row ml-1 p-2">
                    <div class="col-3">
                        <div class="row shadow-sm p-3 m-1 mb-5 bg-white rounded">
                            <div class="row p-3 mb-2 bg-dark text-white shadow-sm p-3 mb-5 rounded">
                                <a>Recherche produit</a>
                                <button type="button" class="btn btn-primary">Ok</button>
                            </div>
                        </div>
                        <div class="row shadow-sm m-1 p-3 mb-5 bg-white rounded">
                            <a>Catégorie</a>
                            <ul>
                                <li>vis</li>
                            </ul>
                        </div>
                    </div>
<!--  /////////////////////////////////////////////Card des produit/////////////////////////////////////////////////// -->
                    <div class="col-8 shadow-sm m-1 p-2 mb-5 bg-white rounded">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <div class="card border border-dark  shadow-sm bg-dark  text-white rounded">
                                    <img src="../public/img/vis.jpg" class="card-img-top" alt="Vis">
                                    <div class="card-body">
                                        <div class="row">
                                         <div class="col-8">
                                               <h5 class="card-title">VIS</h5>
                                              <p class="card-text">1€</p>
                                         </div>
                                            <div class="col-4">
                                                <br>
                                                <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
<!--  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                </div>
           </div>
        </main>
        <?php include_once('footer.php'); ?>

        <script src="../public/js/jquery.js"></script>
        <script src="../public/js/bootstrap.js"></script>
    </body>
</html>