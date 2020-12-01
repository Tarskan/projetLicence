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

  public function deleteCategorie($id)
  {
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('DELETE FROM categorie_produit WHERE id_cat_prod = "'.$id.'"');
    $q->execute();
  }

  public function addCategorie($libelle)
  {
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('INSERT INTO categorie_produit (libelle) VALUES ("'.$libelle.'");');
    $q->execute();
  }

  public function modifCategorie($id,$libelle)
  {
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('UPDATE categorie_produit SET libelle = "'.$libelle.'" WHERE id_cat_prod = "'.$id.'"');
    $q->execute();
  }
  
}

?>