<?php 
class Panier {
    public function creationPanier()
    {
        if (! isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
            $_SESSION['panier']['id_prod'] = array();
            $_SESSION['panier']['quantite'] = array();
            $_SESSION['panier']['prix'] = array();
        }
        return true;
    }
    public function ajouterArticle($id_prod, $quantite, $prix)
    {
        if ($this->creationPanier()) {
            $positionProduit = array_search($id_prod, $_SESSION['panier']['id_prod']);
            if ($positionProduit !== false) {
                $_SESSION['panier']['quantite'][$positionProduit] += $quantite;
            } else {
                array_push($_SESSION['panier']['id_prod'], $id_prod);
                array_push($_SESSION['panier']['quantite'], $quantite);
                array_push($_SESSION['panier']['prix'], $prix);
            }
        } 
    }

    public function montantTotal()
    {
        $total = 0;
        if (isset($_SESSION['panier']['id_prod'])) {
            $nbArticle = sizeof($_SESSION['panier']['id_prod']);
            for ($i = 0; $i < $nbArticle ; $i ++) {
                $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
            }
        }
        return $total;
    }

    public function getPanier()
    {
        $panier = [];
        for ($i = 0; $i < count($_SESSION['panier']); $i++) {
            $panier += $_SESSION['panier'];
        }
        return $panier;
    }

    public function nbArticles()
    {
        $total = 0;
        if (isset($_SESSION['panier']['id_prod'])) {
            for ($i = 0; $i < count($_SESSION['panier']['id_prod']); $i ++) {
                $total += $_SESSION['panier']['quantite'][$i];
            }
        }
        return $total;
    }

    public function supprimerArticle($id_prod)
    {
        if ($this->creationPanier()) {
            $tmp = array();
            $tmp['id_prod'] = array();
            $tmp['quantite'] = array();
            $tmp['prix'] = array();
            
            for ($i = 0; $i < count($_SESSION['panier']['id_prod']); $i ++) {
                if ($_SESSION['panier']['id_prod'][$i] !== $id_prod) {
                    array_push($tmp['id_prod'], $_SESSION['panier']['id_prod'][$i]);
                    array_push($tmp['quantite'], $_SESSION['panier']['quantite'][$i]);
                    array_push($tmp['prix'], $_SESSION['panier']['prix'][$i]);
                }
            }
            $_SESSION['panier'] = $tmp;
            unset($tmp);
        } else
            $this->error = "Un problème est survenu veuillez contacter l'administrateur du site.";
    }

    public function modifierQTeArticle($id_prod, $qteProduit)
    {
        if ($this->creationPanier()) {
            if ($qteProduit > 0) {
                $positionProduit = array_search($id_prod, $_SESSION['panier']['id_prod']);
                
                if ($positionProduit !== false) {
                    $_SESSION['panier']['quantite'][$positionProduit] = $qteProduit;
                }
            }
        } else
            $this->error = "Un problème est survenu veuillez contacter l'administrateur du site.";
    }

    public function detruirePanier(){
        unset($_SESSION['panier']);
    }

}