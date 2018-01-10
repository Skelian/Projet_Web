<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/css/bootstrap.css">
    <link rel="stylesheet" href="./styles/css/style.css" />
    <title>APERO - Accueil</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Menu -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="accueil.php"><img src="images/logo.png" alt="logo apero" class="img-thumbnail img-logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
		
		<?php
			require_once("modeles/benevole.php");
			session_start();
			
			// Si on n'est pas co, on affiche que 3 onglets
			if(!isset($_SESSION['benevole'])) {
		?>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./pages/produit.php">Produits</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link " href="./pages/utilisateur.php">Utilisateur </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="./pages/connexion.php">Connexion </a>
                </li>
            </ul>
			
		<?php
			}else{
		?>
			<ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./pages/gouter.php">Goûters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./pages/produit.php">Produits</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link " href="./pages/enfant.php">Enfants </a>
                </li>
				<li class="nav-item">
                    <a class="nav-link " href="./pages/membre.php">Membres </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link "  href="./pages/connexion.php">Connexion </a>
                </li>
            </ul>
		<?php
			}
		?>
		
        </div>
    </nav>

	<div id="contenue">
		 <h1>Accueil</h1>

		<!--le planning des prochains gouter ou annonces -->
		Bienvenue sur le site de gestion des goûters de l'APERO. <br/><br/>	
		
		<h3>Qui Sommes-nous ?</h3>
		<p>Nous sommes une association de parents bénévoles, qui distribue des goûters à moindre coût aux enfants de l'école
		de rugby d'Orsay après leur entraînement. Ces goûters ont donc lieu le mercredi et le samedi à partir de 16h. 
		Pour y avoir accès, l'enfant doit absolument être inscrit à l'APERO.		
		</p>
		
		<h3>Comment vous inscrire ?</h3>
		<p>Si vous voulez y inscrire un enfant, il faut passer par un parent bénévole. 
		Pour celà, il faudra fournir les informations nécessaires de l'enfant auprès du parent bénévole lors des horaires d'un goûter.
		Ce dernier inscrira l'enfant et celui-ci aura directement l'autorisation de participer aux goûters.
		</p>
		
		<p>Si vous voulez vous inscrire en tant que parent bénévole, il faut faire une demande dans la rubrique "Utilisateur" de notre site
		ou bien <a href="./pages/utilisateur.php">cliquer sur ce lien</a> pour vous y emmener.
		</p>
		
		
		<h3>Comment nous contacter ?</h3>
		<ul>
			<li>Pour venir sur place : <br>
			- 20 rue Mademoiselle,  91 400 Orsay</li>
			<li>Pour nous contacter à distance :<br>
				- Mail : contact_apero@gmail.com<br>
				- Téléphone : 01 23 45 67 89</li>
		</ul>
		
		<h3>Horaires</h3>
		<ul>
			<li>Mercredi : 16h - 17h</li>
			<li>Samedi : 16h - 17h</li>
		</ul>
		
	</div>

</body>
</html>
