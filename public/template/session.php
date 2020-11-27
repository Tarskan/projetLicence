<?php
	require('util.php');
	init_php_session();

	require_once("../models/config.php");

	if(isset($_POST['connexion'])){
		if(isset($_POST['mail']) && !empty(isset($_POST['mail'])) && 
		isset($_POST['mdp']) && !empty(isset($_POST['mdp'])) ){
			$mail = htmlspecialchars($_POST['mail']);
			$mdp = htmlspecialchars($_POST['mdp']);
			 
			try {
				$bddConnexion = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
			} catch (Exception $e) {
				$loginErr = "Le service est actuellement indisponnible : BDD connexion error";
			}
		
			$userConnexion = $bddConnexion->prepare("SELECT id, email, Nom, Prenom, Raison, adresse, codepostal, ville, tel, MDP FROM utilisateur WHERE email = ? AND MDP = ?");
			$userConnexion->bind_param("ss", $mail, $mdp);
			$userConnexion->execute();
			$user = $userConnexion->get_result();
			$userInfo = $user->fetch_assoc();
			
			if ($userInfo['email'] != null) {
				$_SESSION['id'] = $userInfo['id'];
				$_SESSION['email'] = $userInfo['email'];
				$_SESSION['nom'] = $userInfo['Nom'];
				$_SESSION['prenom'] = $userInfo['Prenom'];
				$_SESSION['raison'] = $userInfo['Raison'];
				$_SESSION['adresse'] = $userInfo['adresse'];
				$_SESSION['codePostal'] = $userInfo['codepostal'];
				$_SESSION['ville'] = $userInfo['ville'];
				$_SESSION['tel'] = $userInfo['tel'];
				$_SESSION['mdp'] = $userInfo['MDP'];
			}
			else {
				$loginErr = "Identifiant ou mot de passe incorrect";
			}
		} 
	}
?>