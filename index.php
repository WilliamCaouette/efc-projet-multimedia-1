<?php
    session_start();
    if (!empty($_SESSION['utilisateur'])) {
        header('Location: feed-project.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/accueil.css">
    <title>Connexion/inscription</title>
</head>
<body>
    <main>
        <div class="banner-video">
            <video src="media/videoBanner.mp4" autoplay muted loop class="media-fluide"></video>
        </div>
        <div class="formulaire-authentification">
            <div class="logo">
                <h1><img src="media/logo.png" alt="logo" class="media-fluide">ENIWAN</h1>
            </div>
            <form action="POST">
                <div class="box-identification">
                    <input type="text" name="username" id="username" placeholder="xyz@gmail.com">
                </div>
                <div class="box-identification">
                    <input type="password" name="password" id="password" placeholder="password">
                </div>
                <input type="submit" name="Connexion" value="Connexion" id="">
            </form>

            <div class="button">
                <p>Vous n'avez pas de compte ?</p>
                <a href="inscription.php"><b>Inscrivez-vous</b></a>
            </div>
        </div>
    </main>
</body>
</html>