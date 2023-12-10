<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Mini-projet G3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="../assets/style.css" rel="stylesheet">
</head>
<body class="products">
	<div class="size1 flex-w flex-c-m p-t-20 p-b-55 p-l-15 p-r-15">
		<div class="wsize1 bor1 bg1 p-b-45 p-l-15 p-r-15 p-t-20 respon1">
			<p class="txt-center m1-txt1 p-t-33 p-b-68">
				Connectez-vous
			</p>
            <div class="alert alert-info text-justify">
                <p>
                    Cette page permet de vous connecter à votre compte.
                </p>
            </div>
            <p class="txt-center">
                <a class="btn btn-primary" href="../index.php" title="Revenir à l'accueil">
                	Revenir à l'accueil
                </a>
            </p>
            <form id="form-log" method="POST">
                <div class="form-row">
                    <h1 id="titre-form">Connexion</h1>  
                    <div class="div-input log">
                        <input type="text" class="form-input" id="login" placeholder="Identifiant" name="identifiant" required>
                    </div>
                    <div class="div-input mdp">
                        <input type="password" class="form-input" id="mdp" placeholder="Mot de passe" name="mdp" required>
                    </div>
                    <div id="div-button">
                        <button type="submit" id="log-bouton">Se connecter</button>
                    </div>
                </div>
            </form>

        <?php 
            // if(isset($_POST['identifiant']) && isset($_POST['mdp'])){
            //     echo 'ouuuuuuuuuuuuuuuuuuuuui';
            // }

        ?>
		</div>
	</div>
</body>
</html>