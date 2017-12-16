<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/bootstrap.css">
    <link rel="stylesheet" href="../styles/css/style.css" />
    <title>connexion APERO</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
<?php
require_once("../modeles/benevole.php");
session_start();
?>
<!-- Menu -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><img src="../images/logo.png" alt="logo apero" class="img-thumbnail img-logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../accueil.php">Accueil </a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link" href="../pages/gouter.php">Gouter </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/produit.php">Produit </a>
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
    <?php
        if(!isset($_SESSION['benevole'])) {
            ?><h1>Connexion</h1>
                    
                    Veuillez renseigner tous les champs :
                    <form method="post" action=" ../traitements/connexion.php">
                        <p>
                            <label for="identifiant">Utilisateur :</label>
                            <br>
                            <input type="text"  name="identifiant">
                        </p>
                        <p>
                            <label for="mdp">Mot de passe:</label>
                            <br>
                            <input type="password"  name="mdp">
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
            <h1> Mes infos</h1>

            <p>Bonjour <?php echo $prenom.' '.$nom; ?></p>
            <form method="post" action=" ../traitements/modif_login.php">
                <p>
                    Nom d'utilisateur actuel :<?php echo $identifiant ?>.<br>
                    <label for="identifiant">Nouveau identifiant :</label>
                    <input type="text"  name="identifiant">
                    <button type="submit">Modifier</button>
                 </p>

                <form method="post" action=" ../traitements/modif_mail.php">
                    <p>
                        Adresse Mail actuel : <?php echo $mail?>.<br>
                        <label for="mail">Nouvelle adresse mail :</label>
                        <input type="text"  name="mail">
                        <button type="submit">Modifier</button>
                    </p>
                </form>

                <form method="post" action=" ../traitements/modif_num.php">
                    <p>
                        Numero de telephone actuel : <?php echo $tel?>.<br>
                        <label for="mail">Nouveau telephone :</label>
                        <input type="text"  name="mail">
                        <button type="submit">Modifier</button>
                    </p>
                </form>
                <form method="post" action=" ../traitements/modif_num.php">
                    <p>
                        Changer votre mot de passe : <br>
                        <label for="mdp">Nouveau mot de passe :</label> <br>
                        <input type="text"  name="mdp"> <br>
                        <label for="mdp">Confirmer votre nouveau mot de passe :</label> <br>
                        <input type="text"  name="mdpConfirmation">
                        <button type="submit">Modifier</button>
                    </p>
                </form>

                <form method="post" action=" ../traitements/deconnexion.php">
                    <p>
                        <button style="position: relative; left: 70%;" type="submit">Se deconnecter</button>
                    </p>
                </form>

        <?php
        }
        ?>
</div>
</body>
</html>