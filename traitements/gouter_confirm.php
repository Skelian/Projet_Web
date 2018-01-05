<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../styles/css/bootstrap.css">
        <link rel="stylesheet" href="../styles/css/style.css" />
        <title>gouter APERO</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>
<body>
    <!-- Menu -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../accueil.php"><img src="../images/logo.png" alt="logo apero" class="img-thumbnail img-logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../accueil.php">Accueil </a>
                </li>
                <li class="nav-item  active">
                    <a class="nav-link" href="#">Gouter <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/produit.php">Produit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/utilisateur.php">Utilisateur </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="../pages/connexion.php">Connexion </a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="contenue" style="height: 70%;">
        <?php
            require_once("../modeles/bd.php");
            $bd=new Bd();
            $bd->connexion();
            $co=$bd->getCo();

            $prod=0;
            $idProd=array();
            $nomProd=array();
            $prixProd=array();
            $qteAchete=array();
            $requete="SELECT `numProduit`,`nomProduit`,`prixProduit`,`quantiteProduit` FROM `produit` WHERE `quantiteProduit`>0 ";
            $resultatProduit=mysqli_query($co,$requete) or die("erreur de requete liste produit");

            while($row=mysqli_fetch_assoc($resultatProduit)){
                $nameProd=$row['numProduit'];
                if(isset($_POST["$nameProd"])){
                    $idProd[]=$row['numProduit'];
                    $nomProd[]=$row['nomProduit'];
                    $prixProd[]=$row['prixProduit'];
                    $qteAchete[]=$_POST["$nameProd"];
                    $prod+=1;
                }
            }
            $max=count($idProd);

            if ($prod<1){
                $err+=1;
            }
            if(isset($_POST['enfant'])){
                $idEnfant=$_POST['enfant'];
            }
            if(isset($_POST['sommeTotal'])){
                $sommeTotal=$_POST['sommeTotal'];
            }
            for($i=0;$i<$max;$i++) {
                if (!empty($qteAchete[$i])) {
                    $requete = "UPDATE `produit` SET `quantiteProduit`=`quantiteProduit`-$qteAchete[$i] WHERE `numProduit`=$idProd[$i]";
                    mysqli_query($co,$requete) or die("erreur de requete reduction Stock");
                }
            }
            $requete="INSERT INTO `transaction`(`montantTransaction`, `numEnfant`) VALUES (-$sommeTotal,$idEnfant)";
            mysqli_query($co,$requete) or die("erreur de requete transaction");

            $requete="SELECT `prenomEnfant`,`nomEnfant`,`soldeEnfants` FROM `compteenfants` WHERE `numEnfant`=$idEnfant;";
            $resultatEnfant=mysqli_query($co,$requete) or die("erreur de requete liste produit");
            $row=mysqli_fetch_assoc($resultatEnfant);
            echo "Achat reussi.<br> nouveau solde de ".$row["prenomEnfant"]." ".$row["nomEnfant"].": ".$row["soldeEnfants"]."€";
            echo "<br> <a href='../pages/gouter.php'>Retour</a>"

        ?>

    </div>

</body>
</html>