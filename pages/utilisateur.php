<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/bootstrap.css">
    <link rel="stylesheet" href="../styles/css/style.css" />
    <title>utilisateur APERO</title>
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
                <a class="nav-link" href="../pages/gouter.php">Gouter </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/produit.php">Produit </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " href="#">Utilisateur <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link "  href="../pages/connexion.php">Connexion </a>
            </li>
        </ul>
    </div>
</nav>

<div id="contenue">
    <h1>Utilisateur</h1>
	<br />
    <!-- Formulaire à remplir pour faire une demande de création de compte au président -->
	<h3> Demande de création du compte</h3>
	<p>Pour créer un compte utilisateur (qui vous permettra ensuite de vous connecter sur le site APERO), il faut remplir
	le formulaire ci-dessous. Votre demande sera alors examinée puis validée ou non selon les différents critères que 
	vous aurez renseignés dans ce formulaire. La réponse vous sera envoyer par mail.</p>

	<form method="post" action="confirmation.php">
		<p> Nom : <br />
			<input type="text" name="nom"/><br />
			Prénom : <br />
			<input type="text" name="prenom"/><br />
			Date de naissance : <br />
			<input type="date" name="dateNaissance"/>
		</p>
		
		<p> Adresse mail :<br />
			<input type="text" name="email"/><br />
			Confirmer adresse mail : <br />
			<input type="text" name="mailConfirmation"/><br />
			Téléphone : <br />
			<input type="text" name="telephone"/>
		</p>
		
		<p> Identifiant : <br />
			<input type="text" name="identifiant"/><br />
			Mot de passe : <br />
			<input type="password" name="mdp"/><br />
			Confirmation mot de passe : <br />
			<input type="password" name="mdpConfirmation"/>
		</p>
		
		<p> Code Postal : <br />
			<input type="text" name="codePostal"/>
		</p>
		
		<p>
			Photo de la carte d'identité :
			<input type="file" name="photoCarteIdentite"/><br />
			Photo d'identité :
			<input type="file" name="photoIdentite"/><br />
		</p>
		
		<p><br />
			<button type="submit">Envoyer</button>
		</p>
	</form>
	
</div>
</body>
</html>