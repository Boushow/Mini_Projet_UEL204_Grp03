<?php session_start();
if (!isset($_SESSION['identifiant'])) {
    header("Location: connexion.php");
    exit();
}

require_once('config.php');

?>
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
    <div class="container">
        <h1 class="mt-4 mb-4">Ajouter un livre</h1>		
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
            <button type="submit" class="btn btn-primary" name="submit">Ajouter le livre</button>
        </form>

        <a href="../index.php" class="btn btn-secondary mt-3">Retour à l'accueil</a>
    </div>
    <?php
        $titre = isset($_POST['titre']) ? htmlspecialchars($_POST['titre']) : '';
        $auteur = isset($_POST['auteur']) ? htmlspecialchars($_POST['auteur']) : '';
        $annee = isset($_POST['annee']) ? intval($_POST['annee']) : 0;    
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

            if (empty($titre) || !ctype_alpha($titre)) {
                echo "Le champ 'Titre' ne peut pas être vide.";
            }
        
            if (empty($auteur) || !ctype_alpha($titre)) {
                echo "Le champ 'Auteur' ne peut pas être vide.";
            }
        
            if (!is_numeric($annee) || $annee > 2024) {
                echo "L'année doit être inférieur à 2024.";
            }
        
            else {
                try {
                    $insertion = $pdo->prepare('INSERT INTO livres (titre_livre, auteur, annee_publication) VALUES (?, ?, ?)');
            
                    $insertion->execute([$titre, $auteur, $annee]);
            
                    echo "Livre ajouté avec succès !";
                } catch (PDOException $e) {
                    echo "Erreur d'insertion : " . $e->getMessage();
                }
            }
        }        

    
        echo "Titre du livre : " . $titre . "<br>";
        echo "Auteur : " . $auteur . "<br>";
        echo "Année de publication : " . $annee . "<br>";
    ?>
</body>
</html>