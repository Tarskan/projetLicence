<?php

include_once('conseil.php');

class conseilManager
{

  //recupere la liste des conseils XX
    public function listeConseils() {
    $DBase = new Connect();
    $db = $DBase->connexion();
    $listConseils = [];
    
    $q = $db->prepare('SELECT * from conseils');
    $q->execute();
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $listConseils[] = new Conseil($donnees);
    }

    return $listConseils;
  }

  public function addConseil($titre,$libelle,$video){
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('INSERT INTO conseils(titre, libelle, video) VALUES ("'.$titre.'","'.$libelle.'","'.$video.'")');
    $q->execute();
  }

  public function deleteConseil($id){
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('DELETE FROM conseils WHERE id_cons = "'.$id.'"');
    $q->execute();
  }

  public function modifConseil($id,$titre,$libelle,$video){
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('UPDATE conseils SET titre="'.$titre.'",libelle="'.$libelle.'",video ="'.$video.'" WHERE id_cons = "'.$id.'"');
    $q->execute();
  }
  
}

?>