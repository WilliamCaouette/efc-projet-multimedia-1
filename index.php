<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion/inscription</title>
</head>
<body>
    <div class="banner-video">
        <video src="media/Airport.mp4" autoplay muted loop></video>
    </div>
    <div class="formulaire-authentification">
        <form action="POST">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </div>
            <input type="submit" name="log in" value="Log In" id="">
        </form>

        <div class="button">
            <p>Sing in</p>
        </div>
    </div>
</body>
</html>