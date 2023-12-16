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
                    <a class="nav-link " href="../pages/rechercher.php">Rechercher</a>
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
    <div class="size1 flex-w flex-c-m p-t-20 p-b-55 p-l-15 p-r-15">
        <div class="wsize1 bor1 bg1 p-b-45 p-l-15 p-r-15 p-t-20 respon1 bg-white">
            <p class="txt-center m1-txt1 p-t-33 p-b-68">
                Rechercher des livres
            </p>
            <?php
				require_once('config.php'); // Inclure le fichier de configuration de la base de données


				// Initialiser les variables
				$term = "";
				$results = [];

				// Vérifier si le formulaire a été soumis
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					// Récupérer le terme de recherche
					$term = isset($_POST['term']) ? htmlspecialchars($_POST['term'], ENT_QUOTES, 'UTF-8') : '';

					// Interroger la base de données pour trouver les livres correspondants au terme de recherche
					$query = "SELECT * FROM livres WHERE titre_livre LIKE :term OR auteur LIKE :term OR annee_publication LIKE :term";
					$stmt = $pdo->prepare($query);
					$stmt->bindValue(':term','%' . $term . '%', PDO::PARAM_STR);
					$stmt->execute();
					$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
				?>
				
                <?php
                // Afficher les résultats de la recherche
                if (!empty($results)) {
                    echo '<h3>Résultats de la recherche :</h3>';
                    echo '<ul>';
                    foreach ($results as $result) {
                        echo '<li>' . $result['titre_livre'] . ' - ' . $result['auteur'] . ' (' . $result['annee_publication'] . ')</li>';
                    }
                    echo '</ul>';
                } else {
                    echo '<p>Aucun résultat trouvé.</p>';
                }
            ?>
            <form method="post" action="">
                <div class="form-group pb-2">
                    <label for="term">Terme recherché :</label>
                    <input type="text" class="form-control" id="term" name="term" value="<?php echo $term; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
            <div class="mt-3">
            </div>
            <p class="txt-center">
                <a class="btn btn-secondary" href="../index.php" title="Revenir à l'accueil">
                    Revenir à l'accueil
                </a>
            </p>
        </div>
    </div>
</body>
</html>