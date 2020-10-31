<?php



class clientManager
{
  
  //recupere les informations sur la connexion pour la verifier
  public function connexion(Client $client)
  {
    $DBase = new Connect();
		$db = $DBase->connexion();
    $q = $db->prepare('SELECT id,login,mdp from client where login = :login and mdp = :mdp');
    $q->bindValue(':login', $client->login());
    $q->bindValue(':mdp', $client->mdp());
    $q->execute();
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    
    if($donnees == false){
      return $donnees;
    }else{
    return new Client($donnees);
    }
  }

  //verifie que le login ou le mail n'existe pas deja pour la creation d un nouveau client
  public function verifDoublon(Client $client)
  {
    $DBase = new Connect();
		$db = $DBase->connexion();
    $q = $db->prepare('SELECT login,email from client where login = :login or email = :email');
    $q->bindValue(':login', $client->login());
    $q->bindValue(':email', $client->email());
    $q->execute();
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    
    if($donnees == false){
      return $donnees;
    }else{
    return new Client($donnees);
    }
  }
 
  //creer un client
  public function add(Client $client)
  {
    $DBase = new Connect();
		$db = $DBase->connexion();
    $q = $db->prepare('INSERT INTO client(nom,prenom,email,login,mdp,
    adressefac,villefac,cpfac,adresseliv,villeliv,cpliv) VALUES(:nom,:prenom,:email,:pseudo,:mdp,
    :adressefac,:villefac,:cpfac,:adresseliv,:villeliv,:cpliv)');
    $q->bindValue(':nom', $client->nom());
    $q->bindValue(':prenom', $client->prenom());
    $q->bindValue(':email', $client->email());
    $q->bindValue(':pseudo', $client->login());
    $q->bindValue(':mdp', $client->mdp());
    $q->bindValue(':adressefac', $client->adresseFac());
    $q->bindValue(':villefac', $client->villeFac());
    $q->bindValue(':cpfac', $client->cpFac());
    $q->bindValue(':adresseliv', $client->adresseLiv());
    $q->bindValue(':villeliv', $client->villeLiv());
    $q->bindValue(':cpliv', $client->cpLiv());
    $q->execute();
  }
  
//recupere les infos d'un client
  public function get($id)
  {

    $DBase = new Connect();
		$db = $DBase->connexion();
      
    $q = $db->prepare('SELECT id,nom,prenom,email,login,mdp,
      adressefac,villefac,cpfac,adresseliv,villeliv,cpliv FROM client where id = '.$id);
    $q->execute();
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
      

    return new Client($donnees);
  }
    
//modifie les infos d un client
  public function update(Client $client){
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare( "UPDATE client 
      SET nom =:nom, prenom =:prenom, email =:email, login =:pseudo, mdp =:mdp,
      adressefac=:adressefac, villefac = :villefac, cpfac=:cpfac, adresseliv =:adresseliv,
      villeliv =:villeliv, cpliv =:cpliv 
      where id = :id");
      $q->bindValue(':id', $client->id());
      $q->bindValue(':nom', $client->nom());
      $q->bindValue(':prenom', $client->prenom());
      $q->bindValue(':email', $client->email());
      $q->bindValue(':pseudo', $client->login());
      $q->bindValue(':mdp', $client->mdp());
      $q->bindValue(':adressefac', $client->adresseFac());
      $q->bindValue(':villefac', $client->villeFac());
      $q->bindValue(':cpfac', $client->cpFac());
      $q->bindValue(':adresseliv', $client->adresseLiv());
      $q->bindValue(':villeliv', $client->villeLiv());
      $q->bindValue(':cpliv', $client->cpLiv());
    $q->execute();
    
  }

  //verifie si le login ou le mail n existe pas deja avant l update
  public function verifDoublonUpdate(Client $client)
  {
    $DBase = new Connect();
		$db = $DBase->connexion();
    $q = $db->prepare('SELECT login,email from client where id <>:id and login = :login or id <> :id and email = :email');
    $q->bindValue(':id', $client->id());
    $q->bindValue(':login', $client->login());
    $q->bindValue(':email', $client->email());
    $q->execute();
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    
    if($donnees == false){
      return $donnees;
    }else{
    return new Client($donnees);
    }
  }
  
}
?>