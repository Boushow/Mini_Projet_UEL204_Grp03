<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$db_name = "bibliotheque";
$username = "root";
$password = "root";

try {
    $pdo = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    // Stocker l'erreur dans une variable de session
    $_SESSION['erreur_connexion'] = "Erreur de connexion à la base de données : " . $exception->getMessage();
    
    // Rediriger vers la page précédente si possible, sinon vers la page de connexion
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: " . ($referer ? $referer : "inscription.php"));
    exit();
}

if (isset($_POST['submit'])) {
    if (!empty($_POST["identifiant"]) && !empty($_POST["mdp"])) {
        $identifiant = htmlspecialchars($_POST['identifiant']);
        $mdp = ($_POST['mdp']);

        try {
            $query = "SELECT * FROM utilisateurs WHERE identifiant = ? AND motdepasse = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$identifiant, $mdp]);

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch();
                $_SESSION['identifiant'] = $identifiant;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header("Location: ../index.php");
                exit();
            } else {
                $_SESSION['erreur_connexion'] = "Identifiant ou mot de passe incorrect";
                header("Location: connexion.php");
                exit();
            }
        } catch (PDOException $exception) {
            echo "Erreur lors de l'exécution de la requête : " . $exception->getMessage();
        }
    } else {
        echo "";
    }
}
?>
