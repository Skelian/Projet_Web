<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/bootstrap.css">
    <link rel="stylesheet" href="../styles/css/style.css" />
    <title>APERO - Utilisateur </title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>

<body>
<?php
require_once("../modeles/benevole.php");
session_start();
if(!isset($_SESSION['benevole'])) {
?>
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
				<a class="nav-link" href="../pages/produit.php">Produits</a>
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

	<form method="post" action="../traitements/verif_form_utilisateur.php">
		<p> Nom : <br />	
		
			<?php
				if(!isset($_POST['nom'])){?>
					<input type="text" name="nom"><br><?php
				}else{?>
					<input type="text" name="nom" value="<?php echo $nom; ?>"><br>
				<?php }
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=2048){
						echo '<div class="erreur"> Veuillez renseigner votre nom.<br /></div>';
						$_GET["errChp"]-=2048;
					}
				}	
			?>
				
			<?php
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=2048){
						echo '<div class="erreur"> Veuillez renseigner votre nom.<br /></div>';
						$_GET["errChp"]-=2048;
					}
				}	
			?>

			
			Prénom : <br />
			<input type="text" name="prenom"/><br>
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=1024){
						echo '<div class="erreur"> Veuillez renseigner votre prénom. <br /></div>';
						$_GET["errChp"]-=1024;
					}
				}	
			?>
			
			Date de naissance : <br />
			<input type="date" name="dateNaissance"/><br>
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=512){
						echo '<div class="erreur"> Veuillez renseigner votre date de naissance. <br /></div>';
						$_GET["errChp"]-=512;
					}
				}	
			?>
		</p>
		
		<p> Adresse mail :<br />
			<input type="text" name="email"/><br />
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=256){
						echo '<div class="erreur"> Veuillez renseigner votre adresse mail. </div>';
						$_GET["errChp"]-=256;
					}
				}	
				if(isset($_GET["errForm"])){
						if($_GET["errForm"]>=256){
							echo '<div class="erreur"> Mail invalide, veuillez vérifier votre adresse mail.</div>';
							$_GET["errForm"]-=256;
					}
				}
			?>
			
			Confirmer adresse mail : <br />
			<input type="text" name="mailConfirmation"/><br />
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=128){
						echo '<div class="erreur"> Veuillez confirmer votre adresse mail. </div>';
						$_GET["errChp"]-=128;
					}
				}	
			?>
			
			Téléphone : <br />
			<input type="text" name="telephone"/>
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=64){
						echo '<div class="erreur"> Veuillez renseigner votre numéro de téléphone. </div>';
						$_GET["errChp"]-=64;
					}
				}
				if(isset($_GET["errForm"])){
					if($_GET["errForm"]>=64){
						echo '<div class="erreur"> Numéro de téléphone invalide, veuillez vérifier votre numéro de téléphone.</div>';
						$_GET["errForm"]-=64;
					}
				}				
			?>
		</p>
		
		<p> Identifiant : <br />
			<input type="text" name="identifiant"/><br />
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=32){
						echo '<div class="erreur"> Veuillez renseigner votre identifiant. </div>';
						$_GET["errChp"]-=32;
					}
				}	
			?>
			
			Mot de passe : <br />
			<input type="password" name="mdp"/><br />
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=16){
						echo '<div class="erreur"> Veuillez renseigner votre mot de passe. </div>';
						$_GET["errChp"]-=16;
					}
				}	
			?>
			
			Confirmation mot de passe : <br />
			<input type="password" name="mdpConfirmation"/>
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=8){
						echo '<div class="erreur"> Veuillez confirmer votre mot de passe. </div>';
						$_GET["errChp"]-=8;
					}
				}	
			?>
		</p>
		
		<p> Code Postal : <br />
			<input type="text" name="codePostal"/>
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=4){
						echo '<div class="erreur"> Veuillez renseigner votre code postal. </div>';
						$_GET["errChp"]-=4;
					}
				}	
			?>
		</p>
		
		<p>
			Photo de la carte d'identité :
			<input type="file" name="photoCarteIdentite"/><br />
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=2){
						echo '<div class="erreur"> Veuillez déposer une photo de votre carte d\'identité. </div>';
						$_GET["errChp"]-=2;
					}
				}	
			?>
			
			Photo d'identité :
			<input type="file" name="photoIdentite"/><br />
			<?php 
				if(isset($_GET["errChp"])){
					if($_GET["errChp"]>=1){
						echo '<div class="erreur"> Veuillez déposer une photo d\'identité. </div>';
						$_GET["errChp"]-=1;
					}
				}	
			?>
		</p>
		
		<p><br />
			<button type="submit">Envoyer</button>
		</p>
	</form>
	
</div>
<?php } ?>
</body>
</html>