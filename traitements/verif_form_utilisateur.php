<?php
	$errChp=0;
	$errForm=0;
	$mailExp="#^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$#";
	$telExp="#^[0-9]{10,10}$#";
	
	if(empty($_POST["nom"])){
		$errChp+=2048;
	}
	if(empty($_POST["prenom"])){
		$errChp+=1024;
	}
	if(empty($_POST["dateNaissance"])){
		$errChp+=512;
	}
	if(empty($_POST["email"])){
		$errChp+=256;
	}else
	if(!preg_match($mailExp,$_POST["email"])){
		$errForm+=256;
	}
	
	/*if(empty($_POST["mailConfirmation"])){
		$errChp+=128;
	}*/
	if($_POST["mailConfirmation"] != $_POST["email"]){
		$errChp+=128;
	}
	
	if(empty($_POST["telephone"])){
		$errChp+=64;
	}else
	if(!preg_match($mailExp,$_POST["telephone"])){
		$errForm+=64;
	}
	
	if(empty($_POST["identifiant"])){
		$errChp+=32;
	}
	if(empty($_POST["mdp"])){
		$errChp+=16;
	}
	
	/*if(empty($_POST["mdpConfirmation"])){
		$errChp+=8;
	}*/
	if($_POST["mdpConfirmation"] != $_POST["mdp"]){
		$errChp+=8;
	}
	
	if(empty($_POST["codePostal"])){
		$errChp+=4;
	}
	if(empty($_POST["photoCarteIdentite"])){
		$errChp+=2;
	}
	if(empty($_POST["photoIdentite"])){
		$errChp+=1;
	}

	if($errChp>0){
		header('Location: http://localhost/ProjetWeb/pages/utilisateur.php?errForm='.$errForm.'&errChp='.$errChp);//enlever copie
		exit();
	}else{
		$nom=$_POST["nom"];
		$prenom=$_POST["prenom"];
		$dateNaissance=$_POST["dateNaissance"];
		$email=$_POST["email"];
		$mailConfirmation=$_POST["mailConfirmation"];
		$telephone=$_POST["telephone"];
		$identifiant=$_POST["identifiant"];
		$mdp=$_POST["mdp"];
		$mdpConfirmation=$_POST["mdpConfirmation"];
		$codePostal=$_POST["codePostal"];
		$photoCarteIdentite=$_POST["photoCarteIdentite"];
		$photoIdentite=$_POST["photoIdentite"];
		
		require_once('../modeles/bd.php');
		$bd=new Bd();
		$bd->connexion();
		$co=$bd->getCo();
		
		// Identifiant déjà présent ?
		$requete="SELECT loginBenevole FROM benevole WHERE loginBenevole='$identifiant'";
		//echo $requete
		$resultat=mysqli_query($co,$requete) or die("Erreur de connexion");
		
		if(mysqli_num_rows($resultat)==0){
			$requete="INSERT INTO personne(nomPersonne, prenomPersonne, mailPersonne, telPersonne, codePostal, dateNaissance)
			VALUES ('$nom', '$prenom', '$email', '$telephone', '$codePostal', '$dateNaissance')";
			$resultat=mysqli_query($co,$requete) or die("erreur execution impossible ".mysqli_error($co));
			$id=mysqli_insert_id($co);
			
			$requete="INSERT INTO benevole(loginBenevole, mdpBenevole, numPersonne) 
			VALUES ('$identifiant', '$mdp', '$id')";
			$resultat=mysqli_query($co,$requete) or die("erreur execution impossible ".mysqli_error($co));
			echo "<p>OK</p>";
		}else{
			echo "<p>Identifiant déjà existant, veuillez recommencer et saisir un autre identifiant !</p>";
		}
		mysqli_close($co);
		header('Location: http://localhost/ProjetWeb/acceuil.php');
?>