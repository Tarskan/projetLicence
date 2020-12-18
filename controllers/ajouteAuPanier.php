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

    if(isset($_GET['id'])){
        $article = $Art_man->getInfo($_GET['id']);
        $articlePromo = $Art_man->getPromotionArticle($_GET['id']);
    }

    if($article[0]->getPromotion() == NULL){
        $panier->ajouterArticle($article[0]->getId(), 1, $article[0]->getPrix());
    }
    else{
        $panier->ajouterArticle($article[0]->getId(), 1, $articlePromo[0]->getPrixPromo());
    }

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
            <td><a class='card-link btn btn-danger supprimerPanier' href='/projetphp/controllers/suppAchatPanier.php?id= " . $_SESSION['panier']['id_prod'][$i]
            . "' name='suppPanier' id='suppPanier'>-</a></td>
            <td><a class='card-link btn btn-success ajouterPanier' href='/projetphp/controllers/ajouteAuPanier.php?id= " . 
            $_SESSION['panier']['id_prod'][$i] . "' name='acheterPanier' id='acheterPanier'>+</a></td>
            <td><a class='card-link btn btn-warning suppPanier' href='/projetphp/controllers/suppProduitAchat.php?id= " . 
            $_SESSION['panier']['id_prod'][$i] . "' name='suppPanier' id='suppPanier'>Enlever</a></td></tr>";
        }
    }

    $json['donneProd'] = $objetProduit;

    echo json_encode($json);

?>