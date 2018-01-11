<?php
	require_once("../modeles/bd.php");
    $bd=new Bd();
    $bd->connexion();
    $co=$bd->getCo();
	
	/*
     * Modification du solde d'un enfant dans la base de donnée.
     */
	$err=0;

    if(isset($_POST['solde'])){
        $solde=$_POST['solde'];
        if($solde<0){
            $err=1;
        }
    }else{
        $err+=2;
    }
    if ($err>0){
        header('Location: http://localhost/ProjetWeb/pages/crediter_enfant.php?err='.$err);
        exit();
    }else{
        $idEnf = $_POST["idEnf"];
		$requete="INSERT INTO transaction(montantTransaction, numEnfant) VALUES ($solde, $idEnf)";
        echo $requete;
        $resultat = mysqli_query($co, $requete) or die("erreur de requete modif enfant");
    }
    header('Location: http://localhost/ProjetWeb/pages/enfant.php?suc=1');
    exit();

?>


