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

if(isset($_POST['PDid_promo']) && isset($_POST['PDid_produit']))
{
    $Art_man->deletePromotion($_POST['PDid_promo'],$_POST['PDid_produit']);
    header('location:../vue/dashboard.php');
}

if(isset($_POST['CO-Did'])){
    $Conseil_man->deleteConseil($_POST['CO-Did']);
    header('location:../vue/dashboard.php');
}

if(isset($_POST['CDid'])){
    $Cat_man->deleteCategorie($_POST['CDid']);
    header('location:../vue/dashboard.php');
}

if(isset($_POST['id_produit'])){
    $Art_man->deleteProduit($_POST['id_produit']);
    header('location:../vue/dashboard.php');
}

?>