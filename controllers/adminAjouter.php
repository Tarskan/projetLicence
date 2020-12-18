<?php

include_once('../models/ArticleManager.php');
include_once('../models/ConnexionBdd.php');
include_once('../models/CategorieManager.php');
include_once('../models/conseilManager.php');
include_once('../models/ClientManager.php');

$DBase = new Connect();
$db = $DBase->connexion();
$Cat_man = new CategorieManager();
$Art_man = new articleManager();
$Conseil_man = new conseilManager();
$Cli_man = new clientManager();

if(isset($_POST['PAid_produit']) && isset($_POST['PApourcentage']) && isset($_POST['PAdate']))
    {
        $pourcentage = htmlspecialchars($_POST['PApourcentage']);
        $date = htmlspecialchars($_POST['PAdate']);
        $Art_man->addPromotion($_POST['PAid_produit'],$pourcentage,$date);
        header('location:../vue/dashboard.php');
    }

if(isset($_POST['CO-Atitre']) && isset($_POST['CO-Alibelle']) && isset($_POST['CO-Avideo']) ){
    $Conseil_man->addConseil($_POST['CO-Atitre'],$_POST['CO-Alibelle'],$_POST['CO-Avideo']);
    header('location:../vue/dashboard.php');
}

if(isset($_POST['CAlibelle'])){
    $Cat_man->addCategorie($_POST['CAlibelle']);
    header('location:../vue/dashboard.php');
}

if(isset($_POST['reference']) && isset($_POST['libelle']) && isset($_POST['prix']) &&
    isset($_POST['description']) && isset($_POST['quantite']) && isset($_POST['categorie'])) {
        $dossier = '../public/img/';
        $fichier = basename($_FILES['image']['name']);
        $taille_maxi = 100000;
        $taille = filesize($_FILES['image']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['image']['name'], '.'); 
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
        }
        if($taille>$taille_maxi)
        {
            $erreur = 'Le fichier est trop gros...';
        }
        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier, 
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                echo 'Upload effectué avec succès !';
            }
            else //Sinon (la fonction renvoie FALSE).
            {
                echo 'Echec de l\'upload !';
            }
        }
        else
        {
            echo $erreur;
        }
        $chemin = $dossier.$fichier;

        $Art_man->addProduit($_POST['reference'],$_POST['libelle'],$_POST['prix'],$_POST['description'],$_POST['quantite'],$_POST['categorie'],$fichier,$chemin);
        header('location:../vue/dashboard.php');
    }
?>