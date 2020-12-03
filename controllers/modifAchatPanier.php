<?php
    include_once('../public/template/session.php');
    include_once('../models/ConnexionBdd.php');
    include_once('../models/ArticleManager.php');
    include_once('../models/panier.php');

    $panier = new Panier();
    $article = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $Art_man = new articleManager();

    $article = $Art_man->getInfo($_GET['id']);

    $quantiteModifier = $_GET['qt']-1;
    $panier->modifierQTeArticle($article[0]->getId(), $quantiteModifier);

    $json['error'] = false;
    $json['message'] = 'ça marche';
    $json['total'] = $panier->montantTotal();
    $json['quantite'] = $panier->nbArticles();

    $articleDisplay = [];
    $objetProduit = [];

    for ($i = 0; $i < count($_SESSION['panier']['id_prod']); $i ++) {
        $articleDisplay[$i] = $Art_man->getInfo($_SESSION['panier']['id_prod'][$i]);
    }
    if (isset($_SESSION['panier'])) {
        for ($i = 0; $i < count($_SESSION['panier']['id_prod']); $i ++) {
            $articleDisplay[$i] = $Art_man->getInfo($_SESSION['panier']['id_prod'][$i]);
            $objetProduit[$i] = "<tr><th scope='row'></th>
            <td>" . $articleDisplay[$i][0]->getLibelle() . "</td>
            <td>" . $_SESSION['panier']['quantite'][$i] . "</td>
            <td>" . $_SESSION['panier']['quantite'][$i]*$_SESSION['panier']['prix'][$i] . " €</td>
            <td><a class='card-link btn btn-danger supprimerPanier' href='/projetphp/controllers/modifAchatPanier.php?id= " . $_SESSION['panier']['id_prod'][$i]
            . "&qt=" . $_SESSION['panier']['quantite'][$i] . "' name='suppPanier' id='suppPanier'>-</a></td>
            <td><a class='card-link btn btn-success ajouterPanier' href='/projetphp/controllers/ajouteAuPanier.php?id= " . 
            $_SESSION['panier']['id_prod'][$i] . "' name='acheterPanier' id='acheterPanier'>+</a></td>
            <td><a class='card-link btn btn-warning suppPanier' href='/projetphp/controllers/suppProduitAchat.php?id= " . 
            $_SESSION['panier']['id_prod'][$i] . "' name='suppPanier' id='suppPanier'>Enlever</a></td></tr>";
        }
    }

    $json['donneProd'] = $objetProduit;

    echo json_encode($json);

?>