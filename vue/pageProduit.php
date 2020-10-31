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
                        <h3>Vis</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <img src="../public/img/vis.jpg" class="border border-dark shadow-sm card-img-top" alt="Vis">
                    </div>
                    <div class="col-5">
                        <h5>Description :</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at dolor porta, tincidunt nibh 
                                quis, dapibus ante. Praesent leo diam, scelerisque et magna sit amet, scelerisque cursus nibh. Fusce 
                                eget mattis lectus. Sed dictum, tellus vel maximus pretium, urna quam maximus lacus, rutrum tempor lorem 
                                nisi at quam. Nulla enim tortor, ultrices viverra odio nec, molestie rhoncus augue. Ut pharetra velit libero, 
                                vitae hendrerit metus pharetra quis. Mauris ac mattis metus. Curabitur porttitor, urna ac tincidunt ullamcorper, 
                                ipsum eros ultricies dolor, vitae maximus urna lorem sit amet eros. Nulla luctus rutrum augue. Donec 
                                scelerisque vehicula nisl, non rutrum ipsum gravida eu. Quisque at elementum tellus, sed efficitur urna. 
                                Aenean lobortis semper sodales. Vivamus enim mi, mollis tempus ex id, faucibus condimentum nunc. Duis viverra 
                                bibendum ligula a rutrum. Cras ultrices mattis justo vitae consequat. Praesent massa mauris, auctor ac eleifend at, dapibus lacinia dui.</p>
                        <span class="card-link">Prix : 0.80 ct</span>
                        <button class="card-link btn btn-success" name="acheter" id="acheter">Acheter</button>
                    </div>
                </div>           
            </div>
        </main>

        <?php include_once('../public/template/footer.php'); ?>

    </body>
</html>