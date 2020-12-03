<?php   
    include_once('../models/ConnexionBdd.php');
    session_start();

    $DBSauvegarde = new Connect();
    $db = $DBSauvegarde->connexion();
    $q = $db->prepare("INSERT INTO comptesupprimer (`id`, `Nom`, `Prenom`, `email`, `MDP`, `Raison`, `adresse`, `codePostal`, `ville`, `tel`, `id_cat`) VALUES 
    (" . $_SESSION['id'] . ", '" . $_SESSION['nom'] . "', '" . $_SESSION['prenom'] . "', '" . $_SESSION['email'] . "', '" . $_SESSION['mdp'] ."', '" . $_SESSION['raison'] . "', '" . 
    $_SESSION['adresse'] . "', " . $_SESSION['codePostal'] . ", '" . $_SESSION['ville'] . "', " . $_SESSION['tel'] . ", 1)");
    $q->execute();
            
    $DBase = new Connect();
    $db = $DBase->connexion();
    $q = $db->prepare("DELETE FROM `utilisateur` WHERE `id` = " . $_SESSION['id']);
    $q->execute();

    $_SESSION = array();
    session_destroy(); //Paf la session meurt
    unset($_SESSION);
    header("location:/projetphp/vue/index.php"); //une fois deconnecter on retourne a l'acceuille merci bonsoir

?>