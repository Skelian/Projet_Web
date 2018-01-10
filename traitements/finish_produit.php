<?php
    require_once("../modeles/bd.php");
    $bd=new Bd();
    $bd->connexion();
    $co=$bd->getCo();

    /*
     * Modification d'un produit dans la base de donnée.
     */
    $err=0;
    if(isset($_POST['nom'])){
        $nom=$_POST['nom'];
        if(!empty($nom) && preg_match("#^[a-zA-Z0-9_]{3,16}$# ",$nom)){

        }else{
            $err+=4;
        }
    }else{
        $err+=8;
    }
    if(isset($_POST['prix'])){
        $prix=$_POST['prix'];
        if($prix<0){
            $err=1;
        }
    }else{
        $err+=2;
    }
    if ($err>0){
        header('Location: http://localhost/ProjetWeb/pages/modif_produit.php?err='.$err);
        exit();
    }else{
        $idProd = $_POST["idProd"];
        $requete="UPDATE `produit` SET `nomProduit`='$nom',`prixProduit`=$prix WHERE `numProduit`=$idProd";
        echo $requete;
        $resultat = mysqli_query($co, $requete) or die("erreur de requete modif produit");
    }
    header('Location: http://localhost/ProjetWeb/pages/produit.php?suc=1');
    exit();

?>

