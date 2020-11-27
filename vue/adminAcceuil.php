<?php
    include_once('../models/ConnexionBdd.php');
    include_once('../models/CommandeManagerBis.php');
    include_once('../models/ArticleManager.php');

    $commandes = [];
    $ventes = [];
    $articlePromo = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $Com_man = new CommandeManager();
    $Art_man = new articleManager();
    $ventes = $Art_man->getMeilleureVente();
    $tailleVente = sizeof($ventes);
    $articlePromo = $Art_man->lastPromotion();
    $commandes = $Com_man->listeCommande();
    $tailleCommande = sizeof($commandes);

?>

<div class="row">
    <div class="col-4 shadow-sm m-1 p-3 mb-5 bg-white rounded">
    <h2 class="text-center">Derniere promotion :</h2>
        <div class="card border border-dark  shadow-sm bg-dark  text-white rounded">
            <img src=<?php echo '"'.$articlePromo[0]->getImage().'"'?> class="card-img-top" alt="<?php echo $articlePromo[0]->getNomImage()?>">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title"><?php echo $articlePromo[0]->getLibelle() ?></h5>
                            <span class="card-link">Prix : <del><?php echo $articlePromo[0]->getPrix() ?> ct</del>  <?php echo $articlePromo[0]->getPrixPromo() ?> ct</span>
                            <span class="badge badge-success">- <?php echo $articlePromo[0]->getPourcentage() ?>%</span>
                        <a href="pageProduit.php?id=<?php echo  $articlePromo[0]->getId()?>"><button class="card-link btn btn-success" name="info" id="info">Information</button></a>
                        <button class="card-link btn btn-success" name="acheter" id="acheter">Acheter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 shadow-sm m-1 p-3 mb-5 bg-white rounded">
                <h2 class="text-center">Meilleur vente :</h2>
                <ul class="text-center">
                <?php 
                    for ($i=0; $i < $tailleVente; $i++) { 
                        echo '<li> '. $ventes[$i]->getLibelle() . '</li> ';
                    }

                ?>
                </ul>
    </div>
</div>

<div class="row">
    <div class="col-12 shadow-sm m-1 p-3 mb-5 bg-white rounded">
    <h2 class="text-center">Les 5 dernieres ventes</h2>
        <div class="table-responsive-sm m-2 mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Date</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Référence</th>
                    <th scope="col">Libelle</th>
                    <th scope="col">Prix</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        for ($i=0; $i < $tailleCommande; $i++) { 
                    ?>
                    <tr>
                    <th scope="row"><?php echo $commandes[$i]->getId()?></th>
                    <td><?php echo $commandes[$i]->getQuantite()?></td>
                    <td><?php echo $commandes[$i]->getDate()?></td>
                    <td><?php echo $commandes[$i]->getNom()?></td>
                    <td><?php echo $commandes[$i]->getPrenom()?></td>
                    <td><?php echo $commandes[$i]->getEmail()?></td>
                    <td><?php echo $commandes[$i]->getReference()?></td>
                    <td><?php echo $commandes[$i]->getlibelle()?></td>
                    <td><?php echo $commandes[$i]->getprix()?> €</td>
                <?php
                        }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>