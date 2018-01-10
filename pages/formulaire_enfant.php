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
            <li class="nav-item">
                <a class="nav-link" href="../pages/produit.php">Produits </a>
            </li>
			<li class="nav-item active">
                <a class="nav-link" href="../pages/enfant.php">Enfants <span class="sr-only">(current)</span></a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="../pages/membre.php">Membres </a>
            </li>
                <a class="nav-link "  href="../pages/connexion.php">Connexion </a>
            </li>
        </ul>
    </div>
</nav>

<div id="contenue">
    <h1>Enfants</h1>
	<br />
    <!-- Formulaire à remplir pour faire une demande de création de compte au président -->
	<h3> Formulaire d'inscription d'un enfant</h3>
	<p>Pour ajouter un enfant dans l'APERO, il faut renseigner les champs suivants : </p>

	<form method="post" action="confirmation_enfant.php">
		<p> Nom : <br />
			<input type="text" name="nomEnfant"/><br />
			Prénom : <br />
			<input type="text" name="prenomEnfant"/><br />
			Date de naissance : <br />
			<input type="date" name="dateNaissanceEnfant"/>
		</p>
		
		<p> Adresse mail d'un parent :<br />
			<input type="text" name="emailEnfant"/><br />
			Confirmer adresse mail : <br />
			<input type="text" name="mailConfirmationEnfant"/><br />
			Téléphone d'un parent : <br />
			<input type="text" name="telephoneEnfant"/>
		</p>
		
		<p> Code Postal : <br />
			<input type="text" name="codePostalEnfant"/>
		</p>
		
		<p>
			Photo d'identité :
			<input type="file" name="photoIdentiteEnfant"/><br />
		</p>
		
		<p><br />
			<button type="submit">Ajouter</button>
		</p>
	</form>
	
</div>
</body>
</html>