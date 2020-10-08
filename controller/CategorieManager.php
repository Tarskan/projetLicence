<?php

class CategorieManager
{

  //recupere la liste des categories
    public function listeCategorie()
  {
    $DBase = new Connect();
    $db = $DBase->connexion();
    $categories = [];
    
    $q = $db->prepare('SELECT id,nom from categorie');
    $q->execute();
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $categories[] = new Categorie($donnees);
    }

    return $categories;
  }
  
}






?>