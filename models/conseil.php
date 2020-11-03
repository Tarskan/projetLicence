<?php  

class Conseil
{
    private $_id;
    private $_titre;
    private $_libelle;
    private $_video;

	public function __construct($donnees)
	{
		$this->_id = $donnees['id_cons'];
        $this->_titre = $donnees['titre'];
        $this->_libelle = $donnees['libelle'];
		$this->_video = $donnees['video'];
	}

	public function setId($id){
		$this->_id = $id;
	}

	public function setTitre($titre){
		$this->_titre = $titre;
	}

    public function setLibelle($libelle){
		$this->_libelle = $libelle;
	}

	public function setVideo($video){
		$this->_video = $video;
    }
    
	public function getId()
	{
		return $this->_id;
	}

	public function getLibelle()
	{
		return $this->_libelle;
    }

    public function getTitre()
	{
		return $this->_titre;
	}

	public function getVideo()
	{
		return $this->_video;
	}
}

?>