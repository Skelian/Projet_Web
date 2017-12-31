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

    <div id="contenue">
        <?php
            require_once("../modeles/bd.php");
            $bd=new Bd();
            $bd->connexion();
            $co=$bd->getCo();
            $requete="SELECT  `numEnfant` as id,`personne`.`prenomPersonne` as prenom, `personne`.`nomPersonne` as nom FROM `enfant`, `personne` 
                      WHERE `enfant`.`numPersonne`=`personne`.`numPersonne` ORDER BY `enfant`.`numCategorie`";
            $resultatEnfant=mysqli_query($co,$requete) or die("erreur de requete liste enfant");
            $requete="SELECT `numProduit`,`nomProduit`,`prixProduit`,`quantiteProduit` FROM `produit` WHERE `quantiteProduit`>0 ";
            $resultatProduit=mysqli_query($co,$requete) or die("erreur de requete liste produit");
        ?>
        <h1>Gouter Rugby</h1>

        <form method="post" action=" ../traitements/gouter_recap.php">
            <div>
            <div id="form_gouter">
                <div id="liste_Enfant">
                    <label for="listeEnfant"> Liste des Enfants</label>
                    <div id="cadre_liste_enfant">
                        <?php
                         while($row=mysqli_fetch_assoc($resultatEnfant)){
                             ?>
                                 <input type= "radio" name="listeEnfant" value="<?php echo $row['id'] ; ?>">  <?php echo $row['prenom'].' '.$row['nom'] ; ?><br>
                             <?php
                         }
                        ?>
                    </div>
                </div>
                <div id="liste_Produit">
                    <label for="listeProduit">Liste des Produits</label>
                    <div id="cadre_liste_Produit">
                        <table>
                            <tr> <th>Nom</th> <th>Prix/u</th> <th>en stock</th> <th>Qte acheter</th> </tr>
                        <?php
                        while($row=mysqli_fetch_assoc($resultatProduit)){
                            ?>
                                 <tr> <td><?php echo $row['nomProduit'] ; ?></td> <td><?php echo $row['prixProduit'] ; ?>€</td>  <td><?php echo $row['quantiteProduit'] ; ?></td> <td><input type="number" name="produit_<?php echo $row['numProduit'] ; ?>" min="0" max="5"></td> </tr>
                            <?php
                        }
                        ?>
                        </table>
                     </div>
                </div>
            </div>
            </div>
                <input type="submit" value="Confirmer">
                <input type="reset">

        </form>
    </div>

</body>
</html>