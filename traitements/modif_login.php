<?php
	require_once("../modeles/benevole.php");
	session_start();
	
	$errChp=0;
	$sucChp=0;
	
	if(empty($_POST["identifiant"])){
		$errChp+=16;
	}

	if($errChp>0){
		header('Location: http://localhost/ProjetWeb/pages/connexion.php?&errChp='.$errChp);
		exit();
	}else{	
		
		$bd=new Bd();
		$bd->connexion();
		$co=$bd->getCo();
		
		$benevole=$_SESSION["benevole"];
		$identifiant=$_POST["identifiant"];
		$id = $benevole->getId();
		
		if(!empty($identifiant)){
			$requete="UPDATE benevole SET loginBenevole='$identifiant' WHERE numBenevole=$id";
			$resultat=mysqli_query($co,$requete) or die("erreur de requete");
			$benevole->setIdentifiant($identifiant);
			
			$sucChp+=256;
			if($sucChp>0){
				header('Location: http://localhost/ProjetWeb/pages/connexion.php?&sucChp='.$sucChp);
				exit();
			}
			
		}
		mysqli_close($co);
		//header('Location: http://localhost/ProjetWeb/pages/connexion.php');
	}
?>