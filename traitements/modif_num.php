<?php
	require_once("../modeles/benevole.php");
	session_start();
	
	$errChp=0;
	$errForm=0;
	$telExp="#^[0-9]{10}$#";

	
	if(empty($_POST["telephone"])){
		$errChp+=4;
	}else
	if(!preg_match($telExp,$_POST["telephone"])){
		$errForm+=4;
	}

	if($errChp>0 || $errForm>0){
		header('Location: http://localhost/ProjetWeb/pages/connexion.php?errForm='.$errForm.'&errChp='.$errChp);
		exit();
	}else{	
		
		$bd=new Bd();
		$bd->connexion();
		$co=$bd->getCo();
		
		$benevole=$_SESSION["benevole"];
		$telephone=$_POST["telephone"];
		$id = $benevole->getId();
		

		
		if(!empty($telephone)){
			
			$requete="UPDATE personne INNER JOIN benevole ON benevole.numPersonne=personne.numPersonne
			SET telPersonne='$telephone' WHERE benevole.numPersonne=personne.numPersonne
			AND benevole.numBenevole=$id";
			
			$resultat=mysqli_query($co,$requete) or die("erreur de requete");		
			$benevole->setTelephone($telephone);
			
		}
		mysqli_close($co);
		header('Location: http://localhost/ProjetWeb/pages/connexion.php');
	}
?>