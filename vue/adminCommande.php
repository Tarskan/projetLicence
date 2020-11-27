<?php
    include_once('../models/ConnexionBdd.php');
    include_once('../models/CommandeManagerBis.php');

    $commandes = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $Com_man = new CommandeManager();

    $commandes = $Com_man->listeCommande();
    $tailleCommande = sizeof($commandes);

?>

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