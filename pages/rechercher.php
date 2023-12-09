
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mini-projet G3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="../assets/style.css" rel="stylesheet">
</head>
<body>
    <div class="size1 flex-w flex-c-m p-t-20 p-b-55 p-l-15 p-r-15">
        <div class="wsize1 bor1 bg1 p-b-45 p-l-15 p-r-15 p-t-20 respon1">
            <p class="txt-center m1-txt1 p-t-33 p-b-68">
                Rechercher des livres
            </p>
            <form method="post" action="">
                <div class="form-group">
                    <label for="term">Terme de recherche :</label>
                    <input type="text" class="form-control" id="term" name="term" value="<?php echo $term; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
            <div class="mt-3">
			
				<?php
				session_start();
				require_once('config.php'); // Inclure le fichier de configuration de la base de données


				// Initialiser les variables
				$term = "";
				$results = [];

				// Vérifier si le formulaire a été soumis
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					// Récupérer le terme de recherche
					$term = isset($_POST['term']) ? htmlspecialchars($_POST['term'], ENT_QUOTES, 'UTF-8') : '';

					// Interroger la base de données pour trouver les livres correspondants au terme de recherche
					$query = "SELECT * FROM livres WHERE titre_livre LIKE :term OR auteur LIKE :term";
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