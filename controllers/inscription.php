<?php
    session_start();
    include_once('../models/ConnexionBdd.php');

    if(isset($_POST['inscription'])){
        if(empty(isset($_POST['email']))){
            $mailErr = "Il faut un mail pour s'inscrire";
        } else {
            $email = htmlspecialchars($_POST['email']);
        }
        if(empty(isset($_POST['nom']))){
            $nomErr = "Il faut un nom pour s'inscrire";
        } else {
            $nom = htmlspecialchars($_POST['nom']);
        }
        if(empty(isset($_POST['prenom']))){
            $prenomErr = "Il faut un prénom pour s'inscrire";
        } else {
            $prenom = htmlspecialchars($_POST['prenom']);
        }
        if(empty(isset($_POST['raisonSocial']))){
            $raisonSocial = "null";
        } else {
            $raisonSocial = htmlspecialchars($_POST['raisonSocial']);
        }
        if(empty(isset($_POST['adresse']))){
            $adresseErr = "Il faut une adresse pour s'inscrire";
        } else {
            $adresse = htmlspecialchars($_POST['adresse']);
        }
        if(empty(isset($_POST['ville']))){
            $villeErr = "Il faut une ville pour s'inscrire"; 
        } else {
            $ville = htmlspecialchars($_POST['ville']);
        }
        if(empty(isset($_POST['codePostal']))){
            $codeErr = "Il faut un code postal pour s'inscrire";
        } else {
            $codePostal = htmlspecialchars($_POST['codePostal']);
        }
        if(empty(isset($_POST['ntel']))){
            $ntel = 123456789;
        } else {
            $ntel = htmlspecialchars($_POST['ntel']);
        }
        if(empty(isset($_POST['mdp']))){
            $mdpErr = "Il faut un mot de passe pour s'inscrire";
        } else {
            $mdp = htmlspecialchars($_POST['mdp']);
        }
            
        $DBase = new Connect();
        $db = $DBase->connexion();
        $q = $db->prepare("INSERT INTO utilisateur SET `Nom`= '" . $nom . "', `Prenom`= '" . $prenom . "', `email`= '" . $email . "', `MDP`= '" . $mdp . "', `Raison`= '" . $raisonSocial . "
        ',  `adresse` = '" . $adresse . "', `ville` = '" . $ville . "', `codepostal` = " . $codePostal .", `tel`= " . $ntel . ", id_cat = 2");
        $q->execute();

        header("location:/projetphp/vue/menuUtilisateur.php");
    }

?>