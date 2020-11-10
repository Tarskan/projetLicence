<?php   
session_start(); //On s'assure que tu récupére la bonne session
session_destroy(); //Paf la session meurt
header("location:/projetphp/vue/index.php"); //une fosi deconnecter on retourne a l'acceuille merci bonsoir
?>