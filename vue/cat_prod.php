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
                                    <li>vis</li>
                                </ul>
                            </div>
                        </div>
                    </div>
<!--  /////////////////////////////////////////////Les Cartes produits/////////////////////////////////////////////////// -->
<!--  /////////////////////////////////////////////Chaque ligne peut contenir 3 cartes produits/////////////////////////////////////////////////// -->
                    <div class="col-9">
                        <div class="row m-1 p-3 mb-5 bg-white rounded">
                            <div class="col">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="card border border-dark  shadow-sm bg-dark  text-white rounded">
                                            <img src="../public/img/vis.jpg" class="card-img-top" alt="Vis">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="card-title">Vis</h5>
                                                        <span class="card-link">Prix : 0.80 ct</span>
                                                        <button class="card-link btn btn-success" name="info" id="info">Information</button>
                                                        <button class="card-link btn btn-success" name="acheter" id="acheter">Acheter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="card border border-dark  shadow-sm bg-dark  text-white rounded">
                                            <img src="../public/img/vis.jpg" class="card-img-top" alt="Vis">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="card-title">Vis</h5>
                                                        <span class="card-link">Prix : 0.80 ct</span>
                                                        <button class="card-link btn btn-success" name="info" id="info">Information</button>
                                                        <button class="card-link btn btn-success" name="acheter" id="acheter">Acheter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
           </div>
        </main>

        <?php include_once('../public/template/footer.php'); ?>

    </body>
</html>