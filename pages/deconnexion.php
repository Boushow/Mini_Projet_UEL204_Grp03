<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user'])) {
    // Détruire toutes les données de la session
    session_unset();
    session_destroy();
}

// Rediriger l'utilisateur vers la page d'accueil
header("Location: ../index.php");
exit();
?>