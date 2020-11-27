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
  
}

?>