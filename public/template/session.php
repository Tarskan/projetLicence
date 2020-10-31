<?php
	require('util.php');
	init_php_session();

	require_once("../models/config.php");

	try {
		$bddConnexion = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
	} catch (Exception $e) {
		echo "Le service est actuellement indisponnible : BDD connexion error";
		exit();
	}

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
		
			$userConnexion = $bddConnexion->prepare("SELECT email, MDP, Nom, Prenom FROM utilisateur WHERE email = ? AND MDP = ?");
			$userConnexion->bind_param("ss", $mail, $mdp);
			$userConnexion->execute();
			$user = $userConnexion->get_result();
			$userInfo = $user->fetch_assoc();

			print_r($userInfo);
			
			if ($userInfo['email'] != null) {
				$_SESSION['email'] = $userInfo['email'];
				$_SESSION['Nom'] = $userInfo['Nom'];
				$_SESSION['Prenom'] = $userInfo['Prenom'];
			}
			else {
				$loginErr = "Identifiant ou mot de passe incorrect";
			}
		} 
	}
?>