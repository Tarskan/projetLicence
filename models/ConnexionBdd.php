<?php
class Connect
{
    //connexion a la base de donnees
    protected $db = '';
    private $connec_host = '';
    private $connec_dbname = '';
    private $connec_pseudo = '';
    private $connec_mdp = '';

    public function __construct($connec_host = 'localhost', $connec_dbname = 'projetlicence', $connec_pseudo = 'root', $connec_mdp = ''){
        try {
            $this->db = new PDO('mysql:host='.$connec_host.';dbname='.$connec_dbname, $connec_pseudo, $connec_mdp);
            $this->db->exec("SET CHARACTER SET utf8");
            $this->db->exec("SET NAMES utf8");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        catch(PDOException $e) {
            die('<h3>Erreur impossible de se connecter à la base de donnée !</h3> <br/> <a href="../index.php">Retour</a>');
        }
    }

    public function connexion(){
        return $this->db;
    }

}

?>
