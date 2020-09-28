<?php

/*retourne un mot de passe hasher specifiquement*/
function mdpHash($password) {
	$long = strlen($password);
	$salt = "#1jsoaj:§[@sdf]";
	$hashPassword = hash('sha512', $long . $password . $salt);
	return $hashPassword;
}

function userRedirection($privilege) {
	if ($privilege == "technicien") {
		header("Location: technicien/mesInterventions.php");
		die();
	}
	elseif ($privilege == "assistantTelephonique")
	{
		header("Location: assistantTelephonique/gestionClient.php");
		die();
	}else {
		$logErr = "ERREUR : Page de redirection pour '" . $privilege . "' manquant. Contacter l'administrateur.";
		return $logErr;
	}
}