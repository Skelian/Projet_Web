<?php
	require_once("../modeles/benevole.php");	
	
	if(isset($_SESSION['benevole'])){
		session_destroy();
		header('Location: http://localhost/ProjetWeb/pages/connexion.php');
		
	}else{
		echo "CA MARCHE PAS";
	}
	
	//session_destroy();
	
	header('Location: http://localhost/ProjetWeb/pages/connexion.php');

?>