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

if(isset($_POST['PMid_promo']) && isset($_POST['PMpourcentage']) && isset($_POST['PMdate']))
    {
        $Art_man->modifPromotion($_POST['PMid_promo'],$_POST['PMpourcentage'],$_POST['PMdate']);
        header('location:../vue/dashboard.php');
    }

if(isset($_POST['UMid']) && isset($_POST['UMcategorie']) ){
    $Cli_man->upUtilisateur($_POST['UMid'] , $_POST['UMcategorie']);
    header('location:../vue/dashboard.php');
}

if(isset($_POST['CO-Mid']) && isset($_POST['CO-Mtitre']) && isset($_POST['CO-Mlibelle']) && isset($_POST['CO-Mvideo']) ){
    $Conseil_man->modifConseil($_POST['CO-Mid'],$_POST['CO-Mtitre'],$_POST['CO-Mlibelle'],$_POST['CO-Mvideo']);
    header('location:../vue/dashboard.php');
}

if(isset($_POST['CMid']) && isset($_POST['CMlibelle'])){
    $Cat_man->modifCategorie($_POST['CMid'],$_POST['CMlibelle']);
    header('location:../vue/dashboard.php');
}

if(isset($_POST['Mreference']) && isset($_POST['Mlibelle']) && isset($_POST['Mprix']) &&
isset($_POST['Mdescription']) && isset($_POST['Mquantite']) && isset($_POST['Mid'])) {
    $Art_man->modifProduit($_POST['Mid'],$_POST['Mreference'],$_POST['Mlibelle'],$_POST['Mprix'],$_POST['Mdescription'],$_POST['Mquantite']);
    header('location:../vue/dashboard.php');
}


?>