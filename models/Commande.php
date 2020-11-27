<?php 

class Commande
{
	private $_id ;
    private $_quantite = "";
    private $_date = "";
	private $_nom = "";
	private $_prenom = "";
	private $_email= "";
	private $_reference = "";
	private $_libelle = "";
    private $_prix = "";


	public function __construct($donnees)
	{
		if (isset($donnees['id_commande'])) {
			$this->_id = $donnees['id_commande'];
        }
        if (isset($donnees['quantité'])) {
			$this->_quantite = $donnees['quantité'];
        }
        if (isset($donnees['date'])) {
			$this->_date = $donnees['date'];
		}
		if (isset($donnees['Nom'])) {
			$this->_nom = $donnees['Nom'];
		}
		if (isset($donnees['Prenom'])) {
			$this->_prenom = $donnees['Prenom'];
		}
		if (isset($donnees['email'])) {
			$this->_email = $donnees['email'];
        }
        if (isset($donnees['reference'])) {
			$this->_reference = $donnees['reference'];
        }
        if (isset($donnees['libelle'])) {
			$this->_libelle = $donnees['libelle'];
        }
        if (isset($donnees['prix'])) {
			$this->_prix = $donnees['prix'];
		}
		
	}

	public function getId()
	{
		return $this->_id;
    }
    
    public function getDate()
	{
		return $this->_date;
	}

	public function getNom()
	{
		return $this->_nom;
	}

	public function getPrenom()
	{
		return $this->_prenom;
	}

	public function getEmail()
	{
		return $this->_email;
    }
    
    public function getReference()
	{
		return $this->_reference;
	}

	public function getQuantite()
	{
		return $this->_quantite;
	}

	public function getPrix()
	{
		return $this->_prix;
	}

	public function getLibelle()
	{
		return $this->_libelle;
	}

}

 ?>