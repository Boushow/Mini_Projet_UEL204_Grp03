<?php
if(session_status()=== PHP_SESSION_NONE){
    session_start();
}
$host = "localhost";
$db_name = "bibliotheque";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    die("Erreur de connexion à la base de données : " . $exception->getMessage());
}

if (isset($_POST['submit'])){
    if(!empty($_POST["identifiant"]) && !empty($_POST["mdp"])){
        $identifiant = htmlspecialchars($_POST['identifiant']);
        $mdp = ($_POST['mdp']);

        $recupUsers = $pdo->prepare('SELECT * FROM utilisateurs WHERE identifiant = ? AND motdepasse = ?');
        $recupUsers->execute(array($identifiant, $mdp));

        if($recupUsers->rowCount() > 0){
            $_SESSION['identifiant'] = $identifiant;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUsers ->fetch()['id'];
            header("Location: connexion.php");
            exit();
        }else{
            echo "Votre mot de passe ou identifiant est incorect";
        }
    }else{
        echo "Veuillez remplir tous les champs";
    }
}
?>