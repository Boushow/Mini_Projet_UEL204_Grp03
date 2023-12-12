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
<body class="products" style="background-image: url('../assets/medias/Home.png');">
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

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="border rounded p-4 text-center">
            <p class="mb-0">Bienvenue, <?php echo $_SESSION['identifiant']?> !</p>
            <div class="pt-2">
            <a class="btn btn-primary" href="../pages/deconnexion.php" title="Deconnexion">Se déconnecter</a>
            <a class="btn btn-secondary" href="../index.php" title="Revenir à l'accueil">Revenir à l'accueil</a>
            </div>
        </div> 
    </div>
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

	<div class="size1 flex-w flex-c-m p-t-20 p-b-55 p-l-15 p-r-15">
		<div class="wsize1 bor1 bg1 p-b-45 p-l-15 p-r-15 p-t-20 respon1">
			<p class="txt-center m1-txt1 p-t-33 p-b-68">
				Connectez-vous
			</p>
            <div class="alert alert-info text-justify">
                <p>
                    Cette page permet de vous connecter à votre compte.
                </p>
            </div>
            <p class="txt-center pb-4">
                <a class="btn btn-primary" href="../index.php" title="Revenir à l'accueil">
                	Revenir à l'accueil
                </a>
            </p>
            <div>
                <form method="POST" action="config.php" class="p-4 rounded w-100 ">
                    <div class="row mb-3 d-flex justify-content-center">
                        <label for="inputLogin3" class="col-sm-2 col-form-label">Identifiant</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control border-black" id="inputLogin3" name="identifiant" required autocomplete="off">
                        </div>
                    </div>
                    <div class="row mb-3 d-flex justify-content-center">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Mot de passe</label>
                        <div class="col-sm-4">
                        <input type="password" class="form-control border-black" id="inputPassword3" name="mdp" required autocomplete="off">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-primary w-25" >Se connecter</button>
                    </div>
                </form>
            </div>
		</div>
	</div>
    <?php }?>
</body>
</html>