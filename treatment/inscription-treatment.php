<?php 
    session_start();
    if (!empty($_SESSION['utilisateur'])) {
        header('Location: feed-project.php');
    }
    $utilsateur = filter_var_array($_POST, array(
        'mail' => FILTER_SANITIZE_EMAIL,
        'password' => FILTER_SANITIZE_STRING,
        'pays' => FILTER_SANITIZE_STRING,
        'bio' => FILTER_SANITIZE_STRING,
        'type' => FILTER_SANITIZE_STRING
     ));

    
    if (!filter_var($utilsateur['mail'], FILTER_VALIDATE_EMAIL)) {
            echo("Le format du courriel est invalide.");
    }
    else {

        try {
            include "../db.php";

            $motPasseSecurise = password_hash($utilsateur['password'], PASSWORD_BCRYPT);

            $sth = $dbh->prepare("INSERT INTO `utilisateur`(`mail`, `password`, `location`, `bio`, `type` ) VALUES (:mail, :password, :location, :bio, :type);");

            $sth->bindParam(':mail', $utilsateur['mail'], PDO::PARAM_STR);
            $sth->bindParam(':password', $motPasseSecurise, PDO::PARAM_STR);
            $sth->bindParam(':location', $utilsateur['pays'], PDO::PARAM_STR);
            $sth->bindParam(':bio', $utilsateur['bio'], PDO::PARAM_STR);
            $sth->bindParam(':type', $utilsateur['type'], PDO::PARAM_STR);


            if ($sth->execute()) {
                echo("Succès lors de la création du compte.");
            } else {
                echo("Erreur lors de la création du compte.");
            }


        } 
        catch (Throwable $e) {
            echo("Erreur lors de la création du compte.");
            echo($e->getMessage());
        }
    }

?>