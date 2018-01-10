<?php
	require_once("../modeles/benevole.php");
	session_start();
	
	$errChp=0;
	
	if(empty($_POST["identifiant"])){
		$errChp+=16;
	}

	if($errChp>0){
		header('Location: http://localhost/Projet_web - copie/pages/connexion.php?&errChp='.$errChp);
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
			
			
		}
		mysqli_close($co);
		header('Location: http://localhost/Projet_web - copie/pages/connexion.php');
	}
?>