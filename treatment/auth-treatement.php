<?php
    session_start();
    if (!empty($_SESSION['utilisateur'])) {
        header('Location: ../feed-project.php');
    }


    try {

        include "../db.php";


        $utilisateur = filter_var_array($_POST, array(
            'mail' => FILTER_SANITIZE_EMAIL,
            'password' => ['filter' => FILTER_SANITIZE_STRING,
                            'options' => FILTER_FLAG_STRIP_HIGH]
        ));
        
        $sth = $dbh->prepare("SELECT `utilisateur_id`, `mail`, `password`, `type`
                                FROM `utilisateur` 
                               WHERE `mail` = :mail");
      
        $sth->bindParam(':mail', $utilisateur['mail'], PDO::PARAM_STR);

        if ($sth->execute()) {
            echo("Succès lors de la récupération du compte.");
            
            $utilisateurTrouve = $sth->fetch(PDO::FETCH_ASSOC);

            if(password_verify($utilisateur['password'], $utilisateurTrouve['password'])) {
                
                $_SESSION['utilisateur'] = array(
                    'utilisateur_id' => $utilisateurTrouve['utilisateur_id'],
                    'mail' => $utilisateurTrouve['mail'],
                    'password' => $utilisateurTrouve['password'],
                    'type' => $utilisateurTrouve['type']
                );
                header('Location: ../feed-project.php');
            }
            else {
                echo("Connexion impossible avec ces informations.");
            }

        } else {
            echo("Erreur lors de l'authentification.");
        }
    } 
    catch (Throwable $e) {
        echo("Erreur lors de l'authentification.");
        echo($e->getMessage());
    }
?>