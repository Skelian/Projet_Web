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
                <a class="nav-link" href="../pages/enfant.php">Enfants <span class="sr-only">(current)</span></a>
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

    <div id="contenue">
        <?php
        require_once("../modeles/bd.php");
        $bd=new Bd();
        $bd->connexion();
        $co=$bd->getCo();
        if(isset($_POST['enf'])) {
            $idEnf = $_POST["enf"];
            $requete="SELECT numEnfant, nomEnfant, prenomEnfant, soldeEnfants FROM compteenfants WHERE numEnfant='$idEnf'";
            $resultat=mysqli_query($co,$requete) or die("erreur de requete liste enfant");
            $row=mysqli_fetch_assoc($resultat);
        }
        ?>
        <h1>Créditer un enfant :</h1>
		<br />
        <form  method="post" action="../traitements/crediter.php">
            <p>
                <input type="hidden" name="idEnf" value="<?php echo $idEnf;?>">
                <label for="num">Num : <?php if(isset($_POST['enf'])) { echo $row['numEnfant'];}?></label>
				<br>
                <label for="nom">Nom : <?php if(isset($_POST['enf'])) { echo $row['nomEnfant'];}?></label>
				<br>
                <label for="prenom">Prénom : <?php if(isset($_POST['enf'])) { echo $row['prenomEnfant'];}?></label>
				<br>
				
				<!--<label for="prenom">Solde : <?php //if(isset($_POST['enf'])) { echo $soldeEnfants;}?></label>
				<br>-->
                <label for="solde">Crédit :</label>
                <input type="number" value="<?php if(isset($_POST['enf'])) { echo $row['soldeEnfants'];}?>" name="solde">
				<!--<br><label for="prenom">Nouveau solde : <?php //if(isset($_POST['enf'])) { echo $soldeEnfants;}?></label>
				<br>-->
				
				
            </p>
            <button type="submit">Créditer</button>
        </form>
        <div>
            <br>
            <a href="../pages/enfant.php">
                <button>Retour</button>
            </a>
        </div>
    </div>

</body>
</html>