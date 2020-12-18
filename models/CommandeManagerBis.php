<?php

include_once('Commande.php');

class CommandeManager
{

  //recupere la liste des categories XX
    public function listeCommande()
  {
    $DBase = new Connect();
    $db = $DBase->connexion();
    $commandes = [];
    
    $q = $db->prepare('SELECT id_commande,commande.quantité,date,utilisateur.Nom,utilisateur.Prenom,utilisateur.email,produit.reference,produit.libelle, 
    (produit.prix_unitaire * commande.quantité) AS prix FROM commande 
    JOIN utilisateur ON commande.id_utilisateur = utilisateur.id 
    JOIN produit on commande.id_produit = produit.id_produit ');
    $q->execute();
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $commandes[] = new Commande($donnees);
    }

    return $commandes;
  }

  public function lastCommande()
  {
    $DBase = new Connect();
    $db = $DBase->connexion();
    $commandes = [];
    
    $q = $db->prepare('SELECT id_commande,commande.quantité,date,utilisateur.Nom,utilisateur.Prenom,utilisateur.email,produit.reference,produit.libelle, 
    (produit.prix_unitaire * commande.quantité) AS prix FROM commande 
    JOIN utilisateur ON commande.id_utilisateur = utilisateur.id 
    JOIN produit on commande.id_produit = produit.id_produit ORDER by date DESC LIMIT 5 ');
    $q->execute();
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $commandes[] = new Commande($donnees);
    }

    return $commandes;
  }

  public function addCommande($id_produit,$quantite,$date,$id_utilisateur)
  {
    $DBase = new Connect();
		$db = $DBase->connexion();
    $q = $db->prepare('INSERT INTO commande (quantité, date, id_utilisateur, id_produit) VALUES ("'.$quantite.'",CURDATE(),"'.$id_utilisateur.'","'.$id_produit.'")');
    $q->execute();
  }
}
?>