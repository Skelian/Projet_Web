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

<div id="contenue">
    <h1>Enfants</h1>
	<br />
	<p>Liste des enfants inscrits dans l'APERO.</p>
	
	<table>
		
		<!-- En-tête -->
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Age</th>
			<th>Catégorie</th>
			<th>Mail d'un parent</th>
			<th>Téléphone d'un parent</th>
			<th>Solde</th>
			<th> </th><!-- Colonne pour mettre les checkbox -->
		</tr>
		
		<!-- Reste -->
		<!-- Pour la dernière colonne, il faut mettre des checkbox (pour pouvoir modifier un enfant par exemple) -->
		<tr>
		
		</tr>

	</table>
	
	<p><br />
		<form method="post" action="formulaire_enfant.php">
			<button type="submit" name="btnAjouterEnfant">Ajouter un enfant</button> 
			<button type="submit" name="btnCrediterEnfant">Créditer</button>
			<button type="submit" name="btnModifierEnfant">Modifier</button>
			<button type="submit" name="btnSupprimerEnfantx">Supprimer</button>
		</form>
	</p>
	<p>
		<form method="post" action="transaction_enfant.php">
			<button type="submit" name="btnVoirTransaction">Voir les transactions</button> 
		</form>
	</p>
	
	
</div>
</body>
</html>