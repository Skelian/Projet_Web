<?php 

	$nom = $_POST['nomEnfant'];
	$prenom = $_POST['prenomEnfant'];
	$dateNaissance = $_POST['dateNaissanceEnfant'];
	$email = $_POST['emailEnfant'];
	$mailConfirmation = $_POST['mailConfirmationEnfant'];
	$telephone = $_POST['telephoneEnfant'];
	$codePostal = $_POST['codePostalEnfant'];
	$photoIdentite = $_POST['photoIdentiteEnfant'];
	
	//Si formulaire complet (et confirmation mail OK) -> Message de confirmation
	if(!empty($nom) && !empty($prenom) && !empty($dateNaissance) && !empty($email) && !empty($mailConfirmation) && !empty($telephone)
		&& !empty($codePostal) && !empty($photoIdentite) && $email === $mailConfirmation){
?>

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
    <h1>Enfants</h1>
	<br />
    <!-- Message de confirmation -->		
	<h3> Inscription réussie</h3>
	<p>L'enfant <?php echo $prenom ?> <?php echo $nom ?> a bien été ajouté dans la liste des enfants de l'APERO.</p>
	
</div>
</body>
</html>


<?php

	}
	//Sinon (donc si formulaire incomplet ou infos mail non identiques) : afficher formulaire + message ATTENTION 
	//(+ remplir les champs déjà rentrées par l'utilisateur via cookie si possible (pour éviter de tout recopier à chaque fois)
	else{ 
?>


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
    <h1>Enfants</h1>
	<br />
    <!-- Formulaire à remplir pour faire une demande de création de compte au président + message ATTENTION -->
	<h3> Formulaire d'inscription d'un enfant</h3>
	<p>Pour ajouter un enfant dans l'APERO, il faut renseigner les champs suivants : </p>	
	<p>ATTENTION : Formulaire incomplet ou mail non identiques, veuillez vérifier tous les champs.</p>

	<form method="post" action="confirmation_enfant.php">
		<p> Nom : <br />
			<input type="text" name="nomEnfant" value="<?php echo $nom; ?>"/><br /> <!-- Pour conserver les champs déjà saisis-->
			Prénom : <br />
			<input type="text" name="prenomEnfant" value="<?php echo $prenom; ?>"/><br />
			Date de naissance : <br />
			<input type="date" name="dateNaissanceEnfant" value="<?php echo $dateNaissance; ?>"/><br />
		</p>
		
		<p> Adresse mail :<br />
			<input type="text" name="emailEnfant" value="<?php echo $email; ?>"/><br />
			Confirmer adresse mail : <br />
			<input type="text" name="mailConfirmationEnfant" value="<?php echo $mailConfirmation; ?>"/><br />
			Téléphone : <br />
			<input type="text" name="telephoneEnfant" value="<?php echo $telephone; ?>"/><br />
		</p>
		
		<p> Code Postal : <br />
			<input type="text" name="codePostalEnfant" value="<?php echo $codePostal; ?>"/><br />
		</p>
		
		<p>
			Photo d'identité :
			<input type="file" name="photoIdentiteEnfant" value="<?php echo $photoIdentite; ?>"/><br />
		</p>
		
		<p><br />
			<button type="submit">Ajouter</button>
		</p>
	</form>

</div>
</body>
</html>

<?php
}
?>
