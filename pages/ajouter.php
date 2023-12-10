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
    <div class="container">
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
            <div class="form-group">
                <label for="annee">Année de publication :</label>
                <input type="text" class="form-control" id="annee" name="annee" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter le livre</button>
        </form>

        <a href="../index.php" class="btn btn-secondary mt-3">Retour à l'accueil</a>
    </div>
</body>
</html>