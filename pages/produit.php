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
        <?php
        // Si on n'est pas co, on affiche que 3 onglets
        if(!isset($_SESSION['benevole'])) {
            ?>
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="../accueil.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/utilisateur.php">Utilisateur </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="../pages/connexion.php">Connexion </a>
                </li>
            </ul>

            <?php
        }else{
            ?>
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="../accueil.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/gouter.php">Goûters</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/enfant.php">Enfants </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/membre.php">Membres </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="../pages/connexion.php">Connexion </a>
                </li>
            </ul>
            <?php
        }
        ?>
    </div>
</nav>

    <div id="contenue">

        <h1>Produits</h1>
        <?php
            require_once("../modeles/bd.php");
            $bd = new Bd();
            $bd->connexion();
            $co = $bd->getCo();

            if(!isset($_SESSION['benevole'])) {  // espace invitée

                $requete = "SELECT `numProduit`,`nomProduit`,`prixProduit`,`quantiteProduit` FROM `produit`";
                $resultatProduitPublic = mysqli_query($co, $requete) or die("erreur de requete liste produit");
            ?>

            <label for="listeProduit">Liste des produits</label>
            <div id="cadre_liste_Produit" class="table-responsive-md">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix/u</th>
                    </tr>
                    <?php

                            while ($row = mysqli_fetch_assoc($resultatProduitPublic)) {  ?>
                                <tr>
                                    <td><?php echo $row['nomProduit']; ?></td>
                                    <td><?php echo $row['prixProduit']; ?>€</td>
                                </tr>
                            <?php   }
                    ?>
                </table>
            </div>
            <?php
            }else{
                $requete = "SELECT `numProduit`,`nomProduit`,`prixProduit`,`quantiteProduit` FROM `produit` ";
                $resultatProduit = mysqli_query($co, $requete) or die("erreur de requete liste produit");
            ?>

                <form method="post" action=" ../pages/modif_produit.php" >
                    <div class="form_produit">
                        <label for="listeProduit">Liste des Produits</label>
                        <div class="table-responsive-md" >
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prix/u</th>
                                    <th scope="col">en stock</th>
                                    <th scope="col">modifier</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($resultatProduit)) {
                                    if ($row['quantiteProduit']<10){
                                        $classLigne="bg-danger";
                                    }else if ($row['quantiteProduit']<20){
                                        $classLigne="bg-warning";
                                    }else{
                                        $classLigne="";
                                    }
                                    ?>
                                        <tr class="<?php echo $classLigne ?>">
                                            <td><?php echo $row['nomProduit']; ?></td>
                                            <td><?php echo $row['prixProduit']; ?>€</td>
                                            <td><?php echo $row['quantiteProduit']; ?></td>
                                            <td><input type= "radio" name="prod" value="<?php echo $row['numProduit']; ?>"></td>
                                        </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <button type="submit">Modifier un produit</button>
                        <button href="../pages/ajout_prod.php">Ajouter un produit</button>
                        <button href="../pages/course.php">Enregistrer des courses</button>
                    </div>
                </form>


            <?php
            }?>
    </div>
</body>
</html>