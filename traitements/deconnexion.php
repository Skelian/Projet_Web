<?php
	require_once("../modeles/benevole.php");	
	session_start();

	if(isset($_SESSION['benevole'])){
		$benevole=$_SESSION['benevole'];
		$benevole->deconnexion();
		header('Location: http://localhost/ProjetWeb/pages/connexion.php');
		
	}else {
        header('Location: http://localhost/ProjetWeb/pages/connexion.php$errDeco=1');
    }
?>