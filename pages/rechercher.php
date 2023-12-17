<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Mini-projet G3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;700&amp;display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="../assets/style.css" rel="stylesheet">
</head>
<body>
	<?php
 require_once "config.php"; // inclure le fichier de configuration de la base de données
 if (isset($_SESSION["identifiant"])) { ?>
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
	<?php } else { ?>
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
	<?php }
 ?>   
	<div class="size1 flex-w flex-c-m p-t-20 p-b-55 p-l-15 p-r-15">
		<div class="wsize1 bor1 bg1 p-b-45 p-l-15 p-r-15 p-t-20 respon1">
			<?php
   // initialiser les variables
   $term = "";
   $results = [];

   // vérifier si le formulaire a été soumis
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
       // récupérer le terme de recherche
       $term = isset($_POST["term"])
           ? htmlspecialchars($_POST["term"], ENT_QUOTES, "UTF-8")
           : "";

       // interroger la base de données pour trouver les livres correspondants au terme de recherche
       $query =
           "SELECT * FROM livres WHERE titre_livre LIKE :term OR auteur LIKE :term OR annee_publication LIKE :term";
       $stmt = $pdo->prepare($query);
       $stmt->bindValue(":term", "%" . $term . "%", PDO::PARAM_STR);
       $stmt->execute();
       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   // afficher les résultats de la recherche ou tous les livres par défaut
   echo '<p class="txt-center m1-txt1 p-t-33 p-b-68">';
   if (!empty($term)) {
       echo "Résultats de la recherche :</p>";
       if (!empty($results)) {
           echo "<ul>";
           foreach ($results as $result) {
               echo '<li id="livre_' .
                   $result["livre_id"] .
                   '">' .
                   $result["titre_livre"] .
                   " - <i>" .
                   $result["auteur"] .
                   "</i> (" .
                   $result["annee_publication"] .
                   ")";

               if (
                   $_SESSION["role"] == "admin" ||
                   ($_SESSION["role"] == "proprietaire" &&
                       $result["proprietaire_id"] ==
                           $_SESSION["utilisateur_id"])
               ) {
                   echo '<li id="livre_' .
                       $result["livre_id"] .
                       '">' .
                       $result["titre_livre"] .
                       " - <i>" .
                       $result["auteur"] .
                       "</i> (" .
                       $result["annee_publication"] .
                       ") - <i> Ajouté par : " .
                       $result["ajoute_par"] .
                       "</i>";
               }

               echo "</li>";
           }

           echo "</ul>";
       } else {
           echo "<p>Aucun résultat trouvé.</p>";
       }
   } else {
       echo "Tous les livres</p>";
       // Si le formulaire n'est pas soumis, récupérer tous les livres
       $query = "SELECT * FROM livres";
       $stmt = $pdo->prepare($query);
       $stmt->execute();
       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
       // Afficher tous les livres
       if (!empty($results)) {
           echo "<ul>";
           foreach ($results as $result) {
               echo '<div style="overflow: auto;">';
               echo '<li id="livre_' .
                   $result["livre_id"] .
                   '">' .
                   $result["titre_livre"] .
                   " - <i>" .
                   $result["auteur"] .
                   "</i> (" .
                   $result["annee_publication"] .
                   ") - <i> Ajouté par : " .
                   $result["ajoute_par"] .
                   "</i>";

               if (
                   $_SESSION["role"] == "admin" ||
                   ($_SESSION["role"] == "proprietaire" &&
                       $result["proprietaire_id"] ==
                           $_SESSION["utilisateur_id"])
               ) {
                   echo ' <button style="background-color: red; border: none; padding: 2px; color: white; font-weight: bold; float: right;" onclick="supprimerLivre(' .
                       $result["livre_id"] .
                       ')">X</button>';
               }

               echo "</li>";
               echo "</div>";
           }

           echo "</ul>";
       } else {
           echo "<p>Aucun livre trouvé.</p>";
       }
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
	<script>
function supprimerLivre(livreId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "supprimer.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.send("livre_id=" + livreId);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var element = document.getElementById("livre_" + livreId);
            if (element) {
                element.parentNode.removeChild(element);
            } else {
                console.log("Book element not found");
            }
        }
    };
}
</script>
</body>
</html>