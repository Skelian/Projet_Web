<?php
	$errChp=0;
	$errForm=0;
	$mailExp="#^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$#";
	$telExp="#^[0-9]{10,10}$#";
	
	if(empty($_POST["nomEnfant"])){
		$errChp+=128;
	}
	if(empty($_POST["prenomEnfant"])){
		$errChp+=64;
	}
	if(empty($_POST["dateNaissanceEnfant"])){
		$errChp+=32;
	}
	if(empty($_POST["emailEnfant"])){
		$errChp+=16;
	}else
	if(!preg_match($mailExp,$_POST["emailEnfant"])){
		$errForm+=16;
	}
	
	/*if(empty($_POST["mailConfirmation"])){
		$errChp+=128;
	}*/
	if($_POST["mailConfirmationEnfant"] != $_POST["emailEnfant"]){
		$errChp+=8;
	}
	
	if(empty($_POST["telephoneEnfant"])){
		$errChp+=4;
	}else
	if(!preg_match($mailExp,$_POST["telephoneEnfant"])){
		$errForm+=4;
	}
		
	if(empty($_POST["codePostalEnfant"])){
		$errChp+=2;
	}
	if(empty($_POST["photoIdentiteEnfant"])){
		$errChp+=1;
	}

	if($errChp>0){
		header('Location: http://localhost/ProjetWeb/pages/formulaire_enfant.php?errForm='.$errForm.'&errChp='.$errChp);
		exit();
	}else{
		$nom=$_POST["nomEnfant"];
		$prenom=$_POST["prenomEnfant"];
		$dateNaissance=$_POST["dateNaissanceEnfant"];
		$email=$_POST["emailEnfant"];
		$telephone=$_POST["telephoneEnfant"];
		$codePostal=$_POST["codePostalEnfant"];
		$photoIdentite=$_POST["photoIdentiteEnfant"];
		
		require_once('../modeles/bd.php');
		$bd=new Bd();
		$bd->connexion();
		$co=$bd->getCo();
		
		$requete="INSERT INTO personne(nomPersonne, prenomPersonne, mailPersonne, telPersonne, codePostal, dateNaissance)
		VALUES ('$nom', '$prenom', '$email', '$telephone', '$codePostal', '$dateNaissance')";
		$resultat=mysqli_query($co,$requete) or die("erreur execution impossible ".mysqli_error($co));
		$id=mysqli_insert_id($co);
		
		$requete="INSERT INTO enfant(numPersonne, numCategorie) VALUES ('$id', 1)";
		$resultat=mysqli_query($co,$requete) or die("erreur execution impossible ".mysqli_error($co));
		echo "<p>OK</p>";
		
		
		mysqli_close($co);
		header('Location: http://localhost/ProjetWeb/pages/enfant.php');	
	}
?>