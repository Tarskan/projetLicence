<?php 

class Client
{
	private $_id ;
    private $_nom = "";
    private $_prenom = "";
	private $_email = "";
	private $_adresse = "";
	private $_cp= "";
	private $_ville = "";
	private $_tel = "";
    private $_categorie = "";
    private $_id_cat = "";


	public function __construct($donnees)
	{
		if (isset($donnees['id'])) {
			$this->_id = $donnees['id'];
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
		if (isset($donnees['adresse'])) {
			$this->_adresse = $donnees['adresse'];
		}
		if (isset($donnees['codepostal'])) {
			$this->_cp = $donnees['codepostal'];
        }
        if (isset($donnees['ville'])) {
			$this->_ville = $donnees['ville'];
        }
        if (isset($donnees['tel'])) {
			$this->_tel = $donnees['tel'];
		}
		if (isset($donnees['libellé'])) {
			$this->_categorie = $donnees['libellé'];
        }
        if (isset($donnees['id_cat'])) {
			$this->_id_cat = $donnees['id_cat'];
		}
		
	}

	public function getId()
	{
		return $this->_id;
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

	public function getAdresse()
	{
		return $this->_adresse;
	}

	public function getCp()
	{
		return $this->_cp;
    }
    
    public function getVille()
	{
		return $this->_ville;
    }
    
    public function getTel()
	{
		return $this->_tel;
	}

	public function getCategorie()
	{
		return $this->_categorie;
    }
    
    public function getId_cat()
	{
		return $this->_id_cat;
	}


}

 ?>