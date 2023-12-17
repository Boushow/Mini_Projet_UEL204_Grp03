<?php
session_start();
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["livre_id"])) {
    $livreId = $_POST["livre_id"];

    // Debugging: Log the received data
    error_log("Received livre_id: " . $livreId, 0);

    // Check if the user has the permission to delete (admin or owner)
    $query = "SELECT * FROM livres WHERE livre_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$livreId]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    // Debugging: Log user role and book details
    error_log("User role: " . $_SESSION['role'], 0);
    error_log("Book details: " . print_r($book, true), 0);

    if ($_SESSION['role'] == 'admin' || ($_SESSION['role'] == 'proprietaire' && $book['proprietaire_id'] == $_SESSION['utilisateur_id'])) {
        // Perform the deletion
        $deleteQuery = "DELETE FROM livres WHERE livre_id = ?";
        $deleteStmt = $pdo->prepare($deleteQuery);
        $deleteStmt->execute([$livreId]);

        // Debugging: Log deletion success
        error_log("Book deleted successfully", 0);

        // Respond with a success message
        echo "Book deleted successfully";
    } else {
        // Debugging: Log permission denied
        error_log("Permission denied", 0);

        // Respond with an error message
        echo "Permission denied";
    }
} else {
    // Debugging: Log invalid request
    error_log("Invalid request", 0);

    // Respond with an error message
    echo "Invalid request";
}
?>
