<?php
    require_once("../modeles/benevole.php");
	$errChp=0;
	
    if(!empty($_POST["identifiant"]) && !empty($_POST["mdp"])){
        $identifiant=$_POST["identifiant"];
        $mdp=$_POST["mdp"];
    }else{
		$errChp+=1;
		if($errChp>0){
			header('Location: http://localhost/ProjetWeb/pages/connexion.php?errChp='.$errChp);
			exit();
		}else{
			header('Location: http://localhost/ProjetWeb/pages/connexion.php?err=1');
			exit();
		}
    }
    $bd=new Bd();
    $bd->connexion();
    $co=$bd->getCo();
    $requete = "SELECT `loginBenevole`, `mdpBenevole`,`numPersonne` FROM `benevole`WHERE `mdpBenevole`='$mdp' AND `loginBenevole`='$identifiant'";
    $resultat=mysqli_query($co,$requete) or die("erreur de connexion");
    if(mysqli_num_rows($resultat)>0){
        $benevole= new Benevole($co,$identifiant,$mdp);
        $benevole->connexion();
        mysqli_close($co);
    }else{
		$errChp+=2;
		if($errChp>0){
			header('Location: http://localhost/ProjetWeb/pages/connexion.php?errChp='.$errChp);
			exit();
		}else{
			mysqli_close($co);
			header('Location: http://localhost/ProjetWeb/pages/connexion.php?err=2');
			exit();
		}
    }
   header('Location: http://localhost/ProjetWeb/pages/connexion.php');
    exit();
?>