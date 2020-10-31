<?php

include_once('Categorie.php');

class CategorieManager
{

  //recupere la liste des categories XX
    public function listeCategorie()
  {
    $DBase = new Connect();
    $db = $DBase->connexion();
    $categories = [];
    
    $q = $db->prepare('SELECT id_cat_prod,libelle from categorie_produit');
    $q->execute();
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $categories[] = new Categorie($donnees);
    }

    return $categories;
  }
  
}

?>