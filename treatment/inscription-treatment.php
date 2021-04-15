<?php 

    $utilsateur = filter_var_array($_POST, array(
        'mail' => FILTER_SANITIZE_EMAIL,
        'password' => FILTER_SANITIZE_STRING
    ));

    
    if (!filter_var($utilsateur['mail'], FILTER_VALIDATE_EMAIL)) {
            echo("Le format du courriel est invalide.");
    }
    else {

        try {
            include "../db.php";

            $motPasseSecurise = password_hash($utilsateur['password'], PASSWORD_BCRYPT);

            $sth = $dbh->prepare("INSERT INTO `utilisateur`(`mail`, `password`) VALUES (:mail, :password);");

            $sth->bindParam(':mail', $utilsateur['mail'], PDO::PARAM_STR);
       
            if ($sth->execute()) {
                echo("Succès lors de la création du compte.");
            } else {
                echo("Erreur lors de la création du compte.");
            }
        } catch (\Throwable $e) {
            echo("Erreur lors de la création du compte.");
            echo($e->getMessage());
        }
    }

?>