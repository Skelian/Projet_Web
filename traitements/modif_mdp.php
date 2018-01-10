<?php
	require_once("../modeles/benevole.php");
	session_start();
	
	$errChp=0;
	
	if(empty($_POST["mdp"])){
		$errChp+=2;
	}
	
	if($_POST["mdpConfirmation"] != $_POST["mdp"]){
		$errChp+=1;
	}

	if($errChp>0){
		header('Location: http://localhost/ProjetWeb/pages/connexion.php?&errChp='.$errChp);
		exit();
	}else{	
		
		$bd=new Bd();
		$bd->connexion();
		$co=$bd->getCo();
		
		$benevole=$_SESSION["benevole"];
		$mdp=$_POST["mdp"];
		$id = $benevole->getId();
		
		if(!empty($mdp)){
			$requete="UPDATE benevole SET mdpBenevole='$mdp' WHERE numBenevole=$id";
			$resultat=mysqli_query($co,$requete) or die("erreur de requete");
			$benevole->setMdp($mdp);
			
		}
		mysqli_close($co);
		header('Location: http://localhost/ProjetWeb/pages/connexion.php');
	}
?>