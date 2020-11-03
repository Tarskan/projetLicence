<?php

include_once('Article.php');

class articleManager
{
  //recupere la liste des promotions actives
  public function getPromotion()
  {
    $promotions = [];

    $DBase = new Connect();
		$db = $DBase->connexion();
    $q = $db->prepare('SELECT article.id,image,prix*(pourcentage/100)as prix,description, CURDATE() as datejour from article
    join art_promo on article.id = article 
    join promotion on promotion.id = promotion where CURDATE() between datedebut and datefin ');
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $promotions[] = new Article($donnees);
    }
    return $promotions;
  }

  //recupere les informations de la promotion en cours sur un article
  public function getPromotionArticle($article)
  {
    $promotions = [];

    $DBase = new Connect();
		$db = $DBase->connexion();
    $q = $db->prepare('SELECT article.id,image,ROUND(prix*(pourcentage/100),2)as prix,description, CURDATE() as datejour from article
    join categorie on categorie.id = categorie
    join art_promo on article.id = article 
    join promotion on promotion.id = promotion where CURDATE() between datedebut and datefin and article.id = '.$article);
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $promotions[] = new Article($donnees);
    }
    return $promotions;
  }

  //Recupere la liste des informations de la promotions pour les articles de la meme categorie
  public function getPromotionCategorie($categorie)
  {
    $promotions = [];

    $DBase = new Connect();
		$db = $DBase->connexion();
    $q = $db->prepare('SELECT article.id,image,ROUND(prix*(pourcentage/100),2)as prix,description, CURDATE() as datejour from article
    join categorie on categorie.id = categorie
    join art_promo on article.id = article 
    join promotion on promotion.id = promotion where CURDATE() between datedebut and datefin and categorie.id = '.$categorie);
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $promotions[] = new Article($donnees);
    }
    return $promotions;
  }

  //Recupere les infos d'une promotion
  public function promo($promotion)
  {
    $promotions = [];

    $DBase = new Connect();
		$db = $DBase->connexion();
    $q = $db->prepare('SELECT article.id,image,prix,description, CURDATE() as datejour from article
    join art_promo on article.id = article 
    join promotion on promotion.id = promotion where CURDATE() between datedebut and datefin and promotion.id = '.$promotion);
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $promotions[] = new Article($donnees);
    }
    return $promotions;
  }

  //Recupere les dernières ventes
  public function getVentes()
  {

    $ventes = [];

    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('SELECT DISTINCT description from article 
    join cmd_art on article.id = article join commande on commande.id = commande order by commande.id DESC limit 3');
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $ventes[] = new Article($donnees);
    }
    return $ventes;
  }

  //Recupere les astuces
  public function getAstuce()
  {

    $astuces = [];

    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('SELECT DISTINCT article.id,article.description from article join 
    conseil on article.id = article');
    $q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $astuces[] = new Article($donnees);
    }
    return $astuces;
  }
  
  //recupere la liste des categories
  public function getList($categorie)
  {
    $articles = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('SELECT id_produit,produit.libelle,description,prix_unitaire,chemin,image from objet join (produit 
    join categorie_produit on categorie_produit.id_cat_prod = id_cat) on produit.id_produit = id_prod  where id_cat LIKE "'.$categorie.'" ');
    $q->execute();
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $articles[] = new Article($donnees);
    }
    
    return $articles;
  }

  //permet la recherche
  public function getRecherche($categorie)
  {
    $articles = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('SELECT article.id,image,description,prix from article 
    join categorie on categorie.id = categorie where categorie.nom = "'.$categorie.'" or article.description = "'.$categorie.'"');
    $q->execute();
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $articles[] = new Article($donnees);
    }
    
    return $articles;
  }

  //recupere les infos d'un article
  public function getInfo($id)
  {
    $informations = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('SELECT id_produit,libelle,chemin,image,description,prix_unitaire,quantité from produit join objet on objet.id_prod = id_produit where id_produit = "'.$id.'" ');
    $q->execute();
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $informations[] = new Article($donnees);
    }
    
    return $informations;

  }

//creer la commande
  public function insertCommande(Article $article)
  {

    $DBase = new Connect();
    $db = $DBase->connexion();

    $q = $db->prepare('INSERT INTO commande(date,client,total) values(NOW(),:client,:total)');
    $q->bindValue(':client' , $_SESSION['id']);
    $q->bindValue(':total', $article->prix());
    $q->execute();

    $commande = $db->lastInsertId();
    

    $q = $db->prepare('INSERT INTO cmd_art(commande,article,quantite) values (:commande,:article,:quantite)');
    $q->bindValue(':commande', $commande);
    $q->bindValue(':article', $article->id());
    $q->bindValue(':quantite', $article->quantite());
    $q->execute();
  }

  //modifie le stock une fois la commande passée
  public function modifierStock(Article $article)
  {

    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('UPDATE article set quantite = quantite-:quantite where id = :article');
    $q->bindValue(':article', $article->id());
    $q->bindValue(':quantite', $article->quantite());
    $q->execute();
  }

  //recupere les infos de la commande et sur le client pour creer sa facture
  public function pdf()
  {

    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('SELECT nom,prenom,adresseliv,villeliv,cpliv,reference,total,cmd_art.quantite,total,prix,description from commande 
    join cmd_art on commande.id = commande
    join client on client.id = client
    join article on article.id = cmd_art.article
    where client = "'.$_SESSION['id'].'" 
    order by commande.id desc limit '.$_SESSION['nbArticle']);
    $q->execute();
    
    return $q;
  }

  //creer le paiement
  public function insertPaiement()
  {

    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare('INSERT into paiement(carte,client) values ("'.$_SESSION['carte'].'", "'.$_SESSION['id'].'")');
    $q->execute();

    $historique = $db->lastInsertId();

    $q = $db->prepare('INSERT into historique(paiement) values ("'.$historique.'")');
    $q->execute();
  }

}