<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/bootstrap.css">
    <link rel="stylesheet" href="../styles/css/style.css" />
    <title>APERO - Produits</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
<?php
require_once("../modeles/benevole.php");
session_start();
?>
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
                <li class="nav-item">
                    <a class="nav-link" href="../pages/gouter.php">Goûters </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Produits <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/enfant.php">Enfants </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/membre.php">Membres </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/course.php">Courses </a>
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

    <div id="contenue">
        <?php
        require_once("../modeles/bd.php");
        $bd=new Bd();
        $bd->connexion();
        $co=$bd->getCo();

        if(isset($_POST["prod"])){
            $idProd=$_POST["prod"];
        }else{
            header('Location: http://localhost/ProjetWeb/pages/gouter.php?err=1');
            exit();
        }
        $requete="SELECT `nomProduit`,`prixProduit`,`quantiteProduit` FROM `produit` WHERE `numProduit`='$idProd'";
        $resultat=mysqli_query($co,$requete) or die("erreur de requete liste produit");
        $row=mysqli_fetch_assoc($resultat);
        ?>
        <h1>Modifier un produit :</h1>
        <form  method="post" action="../traitements/finish_produit.php">
            <p>
                <label for="nom">nom :</label>
                <input type="text" value="<?php echo $row['nomProduit'];?>" name="nom">

                <label for="prix">prix unitaire :</label>
                <input type="number" value="<?php echo $row['prixProduit'];?>" name="prix">
            </p>
            <button type="submit">Modifier le produit</button>
        </form>
    </div>
</body>
</html>
