<?php
session_start();
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["livre_id"])) {
    $livreId = $_POST["livre_id"];

    $query = "SELECT * FROM livres WHERE livre_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$livreId]);
    $livre = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SESSION['role'] == 'admin' || ($_SESSION['role'] == 'proprietaire' && $livre['proprietaire_id'] == $_SESSION['utilisateur_id'])) {
        $supprQuery = "DELETE FROM livres WHERE livre_id = ?";
        $supprStmt = $pdo->prepare($supprQuery);
        $supprStmt->execute([$livreId]);

        $reponse = ["status" => "success", "message" => "livre bien supprimé"];
    } else {
        $reponse = ["status" => "error", "message" => "Pas de permision"];
    }
} else {
    $reponse = ["status" => "error", "message" => "Requete invalide"];
}

header('Content-Type: application/json');
echo json_encode($reponse);
?>
