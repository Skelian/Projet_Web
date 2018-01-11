<?php
	require_once("../modeles/benevole.php");
	session_start();
	
	$errChp=0;
	$errForm=0;
	$sucChp=0;
	$mailExp="#^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$#";
	
	if(empty($_POST["email"])){
		$errChp+=8;
	}else
	if(!preg_match($mailExp,$_POST["email"])){
		$errForm+=8;
	}

	if($errChp>0 || $errForm>0){
		header('Location: http://localhost/ProjetWeb/pages/connexion.php?errForm='.$errForm.'&errChp='.$errChp);
		exit();
	}else{	
		
		$bd=new Bd();
		$bd->connexion();
		$co=$bd->getCo();
		
		$benevole=$_SESSION["benevole"];
		$email=$_POST["email"];
		$id = $benevole->getId();
		

		
		if(!empty($email)){
			
			$requete="UPDATE personne INNER JOIN benevole ON benevole.numPersonne=personne.numPersonne
			SET mailPersonne='$email' WHERE benevole.numPersonne=personne.numPersonne
			AND benevole.numBenevole=$id";
			
			$resultat=mysqli_query($co,$requete) or die("erreur de requete");		
			$benevole->setEmail($email);
			
			$sucChp+=128;
			if($sucChp>0){
				header('Location: http://localhost/ProjetWeb/pages/connexion.php?&sucChp='.$sucChp);
				exit();
			}
			
		}
		mysqli_close($co);
		header('Location: http://localhost/ProjetWeb/pages/connexion.php');
	}
?>