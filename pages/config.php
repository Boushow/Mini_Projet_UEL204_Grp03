<?php

$host = "localhost";
$db_name = "bibliotheque";
$username = "root";
$password = "root";

try {
    $pdo = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password,);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    die("Erreur de connexion à la base de données : " . $exception->getMessage());
}
?>