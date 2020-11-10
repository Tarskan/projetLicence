<?php   
    include_once('../models/ConnexionBdd.php');

    if(isset($_POST['recherche'])){
        if(isset($_POST['searchBar']) && !empty(isset($_POST['searchBar']))){
            $recherche = htmlspecialchars($_POST['searchBar']);
            
            $DBase = new Connect();
            $db = $DBase->connexion();
            $q = $db->prepare("SELECT id_produit FROM `produit` WHERE libelle like '%".$recherche."%' LIMIT 1");
            $q->execute();
            $produitInfo = $q->fetch(PDO::FETCH_ASSOC);
            
            header("location:/projetphp/vue/pageProduit.php?id=".$produitInfo['id_produit']);
        } 
    }

?>