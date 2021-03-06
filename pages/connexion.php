<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/bootstrap.css">
    <link rel="stylesheet" href="../styles/css/style.css" />
    <title>APERO - Connexion</title>
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
			<li class="nav-item">
                <a class="nav-link " href="../pages/utilisateur.php">Utilisateur </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link "  href="#">Connexion <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<div id="contenue">
	<h1>Connexion</h1>
                    
        Veuillez renseigner tous les champs :
        <form method="post" action="../traitements/connexion.php">
			<p>
				<label for="identifiant">Utilisateur :</label>
				<br>
				<input type="text"  name="identifiant">
			</p>
			<p>
				<label for="mdp">Mot de passe:</label>
				<br>
				<input type="password"  name="mdp">
				<?php
					if(isset($_GET["errChp"])){
						if($_GET["errChp"]>=2){
							echo '<div class="erreur"> Identifiant ou mot de passe incorrect.<br /></div>';
							$_GET["errChp"]-=2;
						}
					}
					if(isset($_GET["errChp"])){
						if($_GET["errChp"]>=1){
							echo '<div class="erreur"> Veuillez saisir votre identifiant et votre mot de passe. </div>';
							$_GET["errChp"]-=1;
						}
					}	
				?>
			</p>
			<button type="submit">Se connecter</button>
		</form>
		
        <?php
        }else{
            $benevole= $_SESSION["benevole"];
            $prenom=$benevole->getPrenom();
            $nom=$benevole->getNom();
            $identifiant=$benevole->getIdentifiant();
            $mail=$benevole->getEmail();
            $tel=$benevole->getTelephone();
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
                <a class="nav-link" href="../pages/gouter.php">Goûters </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/produit.php">Produits </a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="../pages/enfant.php">Enfants </a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="../pages/membre.php">Membres </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link "  href="#">Connexion <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<div id="contenue">
			<?php
				if(isset($_GET["sucChp"])){
					if($_GET["sucChp"]>=256){
						echo '<div class="ok"> Le login a correctement été changé. </div>';
						$_GET["sucChp"]-=256;
					}
				}
				if(isset($_GET["sucChp"])){
					if($_GET["sucChp"]>=128){
						echo '<div class="ok"> L\'adresse mail a correctement été changée. </div>';
						$_GET["sucChp"]-=128;
					}
				}
				if(isset($_GET["sucChp"])){
					if($_GET["sucChp"]>=64){
						echo '<div class="ok"> Le numéro de téléphone a correctement été changé. </div>';
						$_GET["sucChp"]-=64;
					}
				}
				if(isset($_GET["sucChp"])){
					if($_GET["sucChp"]>=32){
						echo '<div class="ok"> Le mot de passe a correctement été changé. </div>';
						$_GET["sucChp"]-=32;
					}
				}
			?>
			
            <h1> Mes infos</h1>

            <p>Bonjour <?php echo $prenom.' '.$nom; ?></p>
            <form method="post" action=" ../traitements/modif_login.php">
                <p>
                    Nom d'utilisateur actuel : <?php echo $identifiant ?><br>
                    <label for="identifiant">Nouvel identifiant :</label>
                    <input type="text"  name="identifiant">
					<?php 
						if(isset($_GET["errChp"])){
							if($_GET["errChp"]>=16){
								echo '<div class="erreur"> Veuillez saisir le nouvel identifiant. </div>';
								$_GET["errChp"]-=16;
							}
						}
					?>
                    <button type="submit">Modifier</button>
                 </p>
			</form>
			

                <form method="post" action=" ../traitements/modif_mail.php">
                    <p>
                        Adresse mail actuelle : <?php echo $mail?><br>
                        <label for="email">Nouvelle adresse mail :</label>
                        <input type="text"  name="email">
						<?php 
							if(isset($_GET["errChp"])){
								if($_GET["errChp"]>=8){
									echo '<div class="erreur"> Veuillez saisir la nouvelle adresse mail. </div>';
									$_GET["errChp"]-=8;
								}
							}
							if(isset($_GET["errForm"])){
								if($_GET["errForm"]>=8){
									echo '<div class="erreur"> Mail invalide, veuillez vérifier votre adresse mail. </div>';
									$_GET["errForm"]-=8;
								}
							}
						?>
                        <button type="submit">Modifier</button>
                    </p>
                </form>

				
                <form method="post" action=" ../traitements/modif_num.php">
                    <p>
                        Numero de téléphone actuel : <?php echo $tel?><br>
                        <label for="telephone">Nouveau téléphone :</label>
                        <input type="text"  name="telephone">
						<?php
							if(isset($_GET["errChp"])){
								if($_GET["errChp"]>=4){
									echo '<div class="erreur"> Veuillez saisir le nouveau numéro de téléphone. </div>';
									$_GET["errChp"]-=4;
								}
							}
							if(isset($_GET["errForm"])){
								if($_GET["errForm"]>=4){
									echo '<div class="erreur"> Téléphone invalide, veuillez vérifier votre numéro de téléphone. </div>';
									$_GET["errForm"]-=4;
								}
							}
						?>
                        <button type="submit">Modifier</button>
                    </p>
                </form>
				
				
                <form method="post" action=" ../traitements/modif_mdp.php">
                    <p>
                        Changer votre mot de passe : <br>
                        <label for="mdp">Nouveau mot de passe :</label> <br>
                        <input type="password"  name="mdp"> <br>
						<?php
						if(isset($_GET["errChp"])){
							if($_GET["errChp"]>=2){
								echo '<div class="erreur"> Veuillez saisir le nouveau mot de passe. </div>';
								$_GET["errChp"]-=2;
							}
						}	
						?>
                        <label for="mdp">Confirmer votre nouveau mot de passe :</label> <br>
                        <input type="password"  name="mdpConfirmation">
						<?php 
							if(isset($_GET["errChp"])){
								if($_GET["errChp"]>=1){
									echo '<div class="erreur"> Veuillez confirmer votre mot de passe. </div>';
									$_GET["errChp"]-=1;
								}
							}	
						?>
                        <button type="submit">Modifier</button>
                    </p>
                </form>
				

                <form method="post" action=" ../traitements/deconnexion.php">
                    <p>
                        <button style="position: relative; left: 70%;" type="submit">Se déconnecter</button>
                    </p>
                </form>

        <?php
        }
        ?>
</div>
</body>
</html>