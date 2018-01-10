<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/bootstrap.css">
    <link rel="stylesheet" href="../styles/css/style.css" />
    <title>APERO - Enfants</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>

<body>
<!-- Menu -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div><a class="navbar-brand" href="../accueil.php"><img src="../images/logo.png" alt="logo apero" class="img-thumbnail img-logo"></a></div>
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
            <li class="nav-item">
                <a class="nav-link" href="../pages/produit.php">Produits </a>
            </li>
			<li class="nav-item active">
                <a class="nav-link" href="#">Enfants <span class="sr-only">(current)</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="../pages/membre.php">Membres </a>
            </li>
            <li class="nav-item">
                <a class="nav-link "  href="../pages/connexion.php">Connexion </a>
            </li>
        </ul>
    </div>
</nav>

<div id="contenue" style="height: 70%;">

        <h1>Enfants</h1>
		<br />
		<h3>Liste des enfants inscrits dans l'APERO.</h3>
		
        <?php
            require_once("../modeles/bd.php");
            $bd = new Bd();
            $bd->connexion();
            $co = $bd->getCo();
    
			$requete = "SELECT * FROM compteenfants";
			$resultatEnfant = mysqli_query($co, $requete) or die("erreur de requete liste enfant");
        ?>
                <div style="height: 75%">
                    <form method="post" action=" ../pages/crediter_enfant.php" style="height: 100%;">
                    <div  class="table-responsive-md table_prod">
                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Numéro</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Solde</th>
								<th scope="col">Crédit</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($resultatEnfant)) {
                                if ($row['soldeEnfants']<5){
                                    $classLigne="bg-danger";
                                }else if ($row['soldeEnfants']<10){
                                    $classLigne="bg-warning";
                                }else{
                                    $classLigne="";
                                }
                                ?>
                                <tr class="<?php echo $classLigne ?>">
                                    <td><?php echo $row['numEnfant']; ?></td>
                                    <td><?php echo $row['nomEnfant']; ?></td>
									<td><?php echo $row['prenomEnfant']; ?></td>
                                    <td><?php echo $row['soldeEnfants']; ?></td>
                                    <td><button type="submit" name="enf" value="<?php echo $row['numEnfant']; ?>">Créditer</button></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    </form>
                </div>
                <?php
                if(isset($_GET['suc'])){
                    echo " <p> Produit modifier avec succes! </p>";
                }
                ?>
                <p>
                    <a href="../pages/ajouter_prod.php"><button >Ajouter un produit</button></a>
                    <a href="../pages/course.php"><button >Enregistrer des courses</button></a>
                </p>
    </div>
</body>
</html>