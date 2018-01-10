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
            <li class="nav-item">
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

	<form method="post" action="verif_form_enfant.php">
		<p> Nom : <br />
			<input type="text" name="nomEnfant"/><br />
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=128){
						echo '<div class="erreur"> Veuillez renseigner le nom de l\'enfant. <br /></div>';
						$_GET["errChp"]-=128;
					}
				}	
			?>

			Prénom : <br />
			<input type="text" name="prenomEnfant"/><br />
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=64){
						echo '<div class="erreur"> Veuillez renseigner le prénom de l\'enfant. <br /></div>';
						$_GET["errChp"]-=64;
					}
				}	
			?>
			
			
			Date de naissance : <br />
			<input type="date" name="dateNaissanceEnfant"/>
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=32){
						echo '<div class="erreur"> Veuillez renseigner la date de naissance de l\'enfant. <br /></div>';
						$_GET["errChp"]-=32;
					}
				}	
			?>
		</p>
		
		<p> Adresse mail d'un parent :<br />
			<input type="text" name="emailEnfant"/><br />
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=16){
						echo '<div class="erreur"> Veuillez renseigner l\'adresse mail d\'un parent de l\'enfant. <br /></div>';
						$_GET["errChp"]-=16;
					}
				}
				if(isset($_GET["errForm"])){
					if($_GET["errForm"]>=16){
						echo '<div class="erreur"> Mail invalide, veuillez vérifier votre adresse mail.</div>';
						$_GET["errForm"]-=16;
					}
				}				
			?>
			
			Confirmer adresse mail : <br />
			<input type="text" name="mailConfirmationEnfant"/><br />
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=8){
						echo '<div class="erreur"> Veuillez confirmer l\'adresse mail du parent de l\'enfant. <br /></div>';
						$_GET["errChp"]-=8;
					}
				}	
			?>
			
			Téléphone d'un parent : <br />
			<input type="text" name="telephoneEnfant"/>
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=4){
						echo '<div class="erreur"> Veuillez renseigner le numéro de téléphone d\'un parent de l\'enfant. <br /></div>';
						$_GET["errChp"]-=4;
					}
				}
				if(isset($_GET["errForm"])){
					if($_GET["errForm"]>=4){
						echo '<div class="erreur"> Numéro de téléphone invalide, veuillez vérifier votre numéro de téléphone.</div>';
						$_GET["errForm"]-=4;
					}
				}
			?>
		</p>
		
		<p> Code Postal : <br />
			<input type="text" name="codePostalEnfant"/>
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=2){
						echo '<div class="erreur"> Veuillez renseigner le code postal de l\'enfant. <br /></div>';
						$_GET["errChp"]-=2;
					}
				}	
			?>
		</p>
		
		<p>
			Photo d'identité :
			<input type="file" name="photoIdentiteEnfant"/><br />
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=1){
						echo '<div class="erreur"> Veuillez déposer la photo d\'identité de l\'enfant. <br /></div>';
						$_GET["errChp"]-=1;
					}
				}	
			?>
		</p>
		
		<p><br />
			<button type="submit">Ajouter</button>
		</p>
	</form>
	
</div>
</body>
</html>