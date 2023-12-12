<?php session_start();?>
<!DOCTYPE html>
<html lang="fr" class="overflow-hidden">
<head>
	<title>Mini-projet G3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body class="bg-image" style="background-image: url('assets/medias/Home.png');">
    <?php 
        if(isset($_SESSION['identifiant'])){
    ?>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/icones/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Bibliothèque
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="pages/rechercher.php">Rechercher</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="pages/ajouter.php">Ajouter un livre</a>
                    </li>
                </ul>
                <a class="btn btn-primary" href="pages/deconnexion.php" title="Deconnexion">Se déconnecter</a>
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
                <a class="navbar-brand" href="index.php">
                    <img src="assets/icones/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Bibliothèque
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="pages/rechercher.php">Rechercher</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="pages/ajouter.php">Ajouter un livre</a>
                    </li>
                </ul>
                <a class="btn btn-primary" href="pages/connexion.php" title="Connexion">
                    Se connecter
                </a>
                </div>
            </div>
        </nav>
    </header>
    <?php }?>   
	<div class="size1 flex-w flex-c-m p-t-4 p-b-55 p-l-15 p-r-15">
		<div class="wsize1 bor1 bg1 p-b-45 p-l-15 p-r-15 p-t-4 respon1">
			<p class="txt-center m1-txt1 p-t-4 p-b-68">
				Mini-projet G3
			</p>
            <div class="alert alert-info text-justify">
                <p>
                    Bienvenue dans notre bibliothèque !
                </p>

            </div>
            <!-- Rechercher -->
            <div class="card">
                <div class="card-header">
                    <span class="font-weight-bold">Rechercher :</span>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <p>
                            Vers la page de recherche
                        </p>
                        <p class="txt-center">
                            <a class="btn btn-primary" href="pages/rechercher.php" title="Rechercher">
                                Rechercher
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Ajout de Livre -->
            <div class="card">
                <div class="card-header">
                    <span class="font-weight-bold">Ajouter un livre</span>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <p>
                            Cliquez su ce bouton pour ajouter un nouveau livre.
                        </p>
                        <p class="txt-center">
                            <a class="btn btn-primary" href="pages/ajouter.php" title="Ajouter">
                                Ajouter un livre
                            </a>
                        </p>
                    </div>
                </div>
            </div>
		</div>
	</div>
</body>
</html>