<?php
session_start();
if (!isset($_SESSION['identifiant'])) {
    header("Location: connexion.php");
    exit();
}

require_once('config.php');

$erreurs = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $titre = isset($_POST['titre']) ? htmlspecialchars($_POST['titre']) : '';
    $auteur = isset($_POST['auteur']) ? htmlspecialchars($_POST['auteur']) : '';
    $annee = isset($_POST['annee']) ? intval($_POST['annee']) : 0;

    if (empty($titre) || !ctype_alpha($titre)) {
        $erreurs[] = "Le champ 'Titre' ne peut pas être vide.";
    }

    if (empty($auteur) || !ctype_alpha($auteur)) {
        $erreurs[] = "Le champ 'Auteur' ne peut pas être vide.";
    }

    if (!is_numeric($annee) || $annee > 2024) {
        $erreurs[] = "L'année doit être inférieure à 2024.";
    }

    if (empty($erreurs)) {
        try {
            $ajoutePar = $_SESSION['identifiant'];
            $insertion = $pdo->prepare('INSERT INTO livres (titre_livre, auteur, annee_publication, ajoute_par) VALUES (?, ?, ?, ?)');

            $insertion->execute([$titre, $auteur, $annee, $ajoutePar]);

            echo "Livre ajouté avec succès !";
        } catch (PDOException $e) {
            echo "Erreur d'insertion : " . $e->getMessage();
        }
    }
}
?>

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

<?php if (isset($_SESSION['identifiant'])) : ?>
    <header>
        <!-- ... Votre code de navigation ... -->
    </header>
<?php endif; ?>

<div class="container">
    <h1 class="mt-4 mb-4">Ajouter un livre</h1>

    <form action="ajouter.php" method="post">
        <!-- ... Vos champs de formulaire ... -->
        <button type="submit" class="btn btn-primary" name="submit">Ajouter le livre</button>
    </form>

    <?php
    // Affichage des erreurs
    foreach ($erreurs as $erreur) {
        echo "<p class='text-danger'>$erreur</p>";
    }
    ?>
</div>

</body>
</html>
