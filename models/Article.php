<?php 

class Article
{
	private $_id ;
	private $_reference = "";
	private $_quantité = 0;
	private $_prix_unitaire = 0;
	private $_libelle = "";
	private $_description = "";
	private $_idCat;
	private $_categorie = "";
	private $_chemin = "";
	private $_nomImage = "";
	private $_id_promotion = "";
	private $_prixPromo;
	private $_pourcentage;
	private $_datefin;


	public function __construct($donnees)
	{
		if (isset($donnees['id_produit'])) {
			$this->_id = $donnees['id_produit'];
		}
		if (isset($donnees['reference'])) {
			$this->_reference = $donnees['reference'];
		}
		if (isset($donnees['quantité'])) {
			$this->_quantité = $donnees['quantité'];
		}
		if (isset($donnees['prix_unitaire'])) {
			$this->_prix_unitaire = $donnees['prix_unitaire'];
		}
		if (isset($donnees['libelle'])) {
			$this->_libelle = $donnees['libelle'];
		}
		if (isset($donnees['description'])) {
			$this->_description = $donnees['description'];
		}
		if (isset($donnees['id_cat'])) {
			$this->_idCat = $donnees['id_cat'];
		}
		if (isset($donnees['categorie'])) {
			$this->_categorie = $donnees['categorie'];
		}
		if (isset($donnees['chemin'])) {
			$this->_chemin = $donnees['chemin'];
		}
		if (isset($donnees['image'])) {
			$this->_nomImage = $donnees['image'];
		}
		if (isset($donnees['promotion'])) {
			$this->_id_promotion = $donnees['promotion'];
		}
		if (isset($donnees['prix'])) {
			$this->_prixPromo = $donnees['prix'];
		}
		if (isset($donnees['pourcentage'])) {
			$this->_pourcentage = $donnees['pourcentage'];
		}
		if (isset($donnees['datefin'])) {
			$this->_datefin = $donnees['datefin'];
		}	
	}

	public function getId()
	{
		return $this->_id;
	}

	public function getReference()
	{
		return $this->_reference;
	}

	public function getQuantite()
	{
		return $this->_quantité;
	}

	public function getPrix()
	{
		return $this->_prix_unitaire;
	}

	public function getLibelle()
	{
		return $this->_libelle;
	}

	public function getDescription()
	{
		return $this->_description;
	}

	public function getCategorie()
	{
		return $this->_categorie;
	}

	public function getImage()
	{
		return $this->_chemin;
	}

	public function getNomImage()
	{
		return $this->_nomImage;
	}

	public function getPromotion()
	{
		return $this->_id_promotion;
	}

	public function getPrixPromo()
	{
		return $this->_prixPromo;
	}

	public function getPourcentage()
	{
		return $this->_pourcentage;
	}

	public function getDateFin()								
	{
		return $this->_datefin;
	}

}

 ?>