<?php
    include_once('../models/ConnexionBdd.php');

    if(isset($_POST['query']) == ""){
        $libelle = "";
    } else {
        $libelle = htmlspecialchars($_POST['query']);
    }
    
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare("SELECT libelle FROM `produit` WHERE libelle like '%".$libelle."%'");
    $q->execute();
    $listeNomProduit = array();
    
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
        array_push($listeNomProduit, $donnees['libelle']);
    }
    $listeNomProduit = json_encode($listeNomProduit);
    print_r($listeNomProduit);
    return $listeNomProduit;
?>