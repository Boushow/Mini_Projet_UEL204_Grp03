<?php session_start();?>
<!DOCTYPE html>
<html lang="fr" class="overflow-hidden">
<head>
	<title>Mini-projet G3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="../assets/style.css" rel="stylesheet">
</head>
<body class="bg-image" style="background-image: url('../assets/medias/Home.png');">
<?php 
        if(isset($_SESSION['identifiant'])){
    ?>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../assets/icones/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Bibliothèque
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../pages/rechercher.php">Rechercher</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../pages/ajouter.php">Ajouter un livre</a>
                    </li>
                </ul>
                <a class="btn btn-primary" href="../pages/deconnexion.php" title="Deconnexion">Se déconnecter</a>
                </div>
            </div>
        </nav>
    </header>
    <?php 
        }else{
    ?>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../assets/icones/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Bibliothèque
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../pages/rechercher.php">Rechercher</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../pages/ajouter.php">Ajouter un livre</a>
                    </li>
                </ul>
                <a class="btn btn-primary" href="../pages/connexion.php" title="Connexion">
                    Se connecter
                </a>
                </div>
            </div>
        </nav>
    </header>
    <?php }?>   
    <div class="container d-flex justify-content-center p-t-150 p-b-55 p-l-15 p-r-15">
        <div class="wsize1 bor1 bg1 p-b-45 p-l-15 p-r-15 p-t-4 respon1 bg-white">
            <h1 class="mt-4 mb-4">Ajouter un livre</h1>		
            <?php
                


            
            ?>

            <form action="ajouter.php" method="post">
                <div class="form-group">
                    <label for="titre">Titre du livre :</label>
                    <input type="text" class="form-control" id="titre" name="titre" required>
                </div>
                <div class="form-group">
                    <label for="auteur">Auteur :</label>
                    <input type="text" class="form-control" id="auteur" name="auteur" required>
                </div>
                <div class="form-group pb-2">
                    <label for="annee">Année de publication :</label>
                    <input type="text" class="form-control" id="annee" name="annee" required>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter le livre</button>
            </form>

            <p class="txt-center">
                <a class="btn btn-secondary" href="../index.php" title="Revenir à l'accueil">
                    Revenir à l'accueil
                </a>
            </p>
        </div>
    </div>
</body>
</html>