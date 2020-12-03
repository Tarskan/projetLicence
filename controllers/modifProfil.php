<?php
    session_start();
    include_once('../models/ConnexionBdd.php');

    if(isset($_POST['modification'])){
        if(empty(isset($_POST['mail']))){
            $email = $_SESSION['email'];
        } else {
            $email = htmlspecialchars($_POST['email']);
        }
        if(empty(isset($_POST['nom']))){
            $nom = $_SESSION['nom'];
        } else {
            $nom = htmlspecialchars($_POST['nom']);
        }
        if(empty(isset($_POST['prenom']))){
            $prenom = $_SESSION['prenom'];
        } else {
            $prenom = htmlspecialchars($_POST['prenom']);
        }
        if(empty(isset($_POST['raisonSocial']))){
            $raisonSocial = $_SESSION['raison'];
        } else {
            $raisonSocial = htmlspecialchars($_POST['raisonSocial']);
        }
        if(empty(isset($_POST['adresse']))){
            $adresse = $_SESSION['adresse'];
        } else {
            $adresse = htmlspecialchars($_POST['adresse']);
        }
        if(empty(isset($_POST['ville']))){
            $ville = $_SESSION['ville']; 
        } else {
            $ville = htmlspecialchars($_POST['ville']);
        }
        if(empty(isset($_POST['codePostal']))){
            $codePostal = $_SESSION['codePostal'];
        } else {
            $codePostal = htmlspecialchars($_POST['codePostal']);
        }
        if(empty(isset($_POST['ntel']))){
            $ntel = $_SESSION['tel'];
        } else {
            $ntel = htmlspecialchars($_POST['ntel']);
        }
        if(empty(isset($_POST['mdp']))){
            $mdp = $_SESSION['mdp'];
        } else {
            $mdp = htmlspecialchars($_POST['mdp']);
        }
            
        $DBase = new Connect();
        $db = $DBase->connexion();
        $q = $db->prepare("UPDATE utilisateur SET `Nom`= '" . $nom . "', `Prenom`= '" . $prenom . "', `email`= '" . $email . "', `MDP`= '" . $mdp . "', `Raison`= '" . 
        $raisonSocial . "',  `adresse` = '" . $adresse . "', `ville` = '" . $ville . "', `codepostal` = " . $codePostal .", `tel`= " . $ntel . "  WHERE id = " . $_SESSION['id']);
        $q->execute();

        $DBase2 = new Connect();
        $recup = $DBase2->connexion();
        $userConnexion = $recup->prepare("SELECT id, email, Nom, Prenom, Raison, adresse, codepostal, ville, tel, MDP FROM utilisateur WHERE email = '" . $email ."'");
		$userConnexion->execute();
		$user = $userConnexion->fetch(PDO::FETCH_ASSOC);
			
		if ($user['email'] != null) {
			$_SESSION['id'] = $user['id'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['nom'] = $user['Nom'];
			$_SESSION['prenom'] = $user['Prenom'];
			$_SESSION['raison'] = $user['Raison'];
			$_SESSION['adresse'] = $user['adresse'];
			$_SESSION['codePostal'] = $user['codepostal'];
			$_SESSION['ville'] = $user['ville'];
            $_SESSION['tel'] = $user['tel'];
            $_SESSION['mdp'] = $user['MDP'];
        }
        header("location:/projetphp/vue/menuUtilisateur.php");
    }

?>