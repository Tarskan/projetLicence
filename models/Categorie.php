<?php  

class Categorie
{
	private $_id;
	private $_libelle;

	public function __construct($donnees)
	{
		$this->_id = $donnees['id_cat_prod'];
		$this->_libelle = $donnees['libelle'];	
	}

	public function setId($id){
		$this->_id = $id;
	}

	public function setLibelle($libelle){
		$this->_libelle = $libelle;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function getLibelle()
	{
		return $this->_libelle;
	}
}

?>