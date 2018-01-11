<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/css/bootstrap.css">
    <link rel="stylesheet" href="../styles/css/style.css" />
    <title>APERO - Courses</title>
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
			<li class="nav-item">
                <a class="nav-link" href="../pages/enfant.php">Enfants </a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="../pages/membre.php">Membres </a>
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
    <h1>Courses</h1>
    <?php
        require_once("../modeles/bd.php");
        $bd = new Bd();
        $bd->connexion();
        $co = $bd->getCo();

        $requete="SELECT `dateCourse`,`montantCourse` FROM `course`";
        $resultatCourse = mysqli_query($co, $requete) or die("erreur de requete liste produit");

    ?>
    <div id="form_gouter">
        <div id="liste_course">

            <table class="table table-striped">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Montant</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($resultatCourse)){
                    ?>
                    <tr>
                        <td><?php echo $row["dateCourse"]?></td>
                        <td><?php echo $row["montantCourse"]?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <form>
            <button type="submit">Enregistrer de nouvelle course</button>
        </form>
    </div>

</div>
</body>
</html>