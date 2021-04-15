<?php
    if (!empty($_SESSION['utilisateur'])) {
        header('Location: page-securisee.php');
    }


    try {

        include "../db.php";


        $utilsateur = filter_var_array($_POST, array(
            'courriel' => FILTER_SANITIZE_EMAIL,
            'mot_passe' => ['filter' => FILTER_SANITIZE_STRING,
                            'options' => FILTER_FLAG_STRIP_HIGH]
        ));

        // Pour ajouter un contexte, la date de suppression doit être vide.
        $sth = $dbh->prepare("SELECT `id_utilisateur`, `courriel`, `mot_passe`, `date_creation`
                                FROM `utilisateur` 
                               WHERE `courriel` = :courriel 
                                 AND `date_suppression` IS NULL;");

        $sth->bindParam(':courriel', $utilsateur['courriel'], PDO::PARAM_STR);
        ?>

        <div class="centrer centrer-texte">
        <?php
        if ($sth->execute()) {
            echo("Succès lors de la récupération du compte.");
            
            $utilisateurTrouve = $sth->fetch(PDO::FETCH_ASSOC);

            /*
                Comparez le mot de passe saisit avec celui dans la base de données.
            */
            if(password_verify($utilsateur["mot_passe"], $utilisateurTrouve['mot_passe'])) {

                /* 
                    Conservez les informations de l'usager dans la variable `utilisateur`. 
                    Cette variable sera incluse dans la super variable globale `$_SESSION`.
                */
                $_SESSION['utilisateur'] = array(
                    'id_utilisateur' => $utilisateurTrouve['id_utilisateur'],
                    'courriel' => $utilisateurTrouve['courriel'],
                    'mot_passe' => $utilisateurTrouve['mot_passe'],
                    'date_creation' => $utilisateurTrouve['date_creation']
                );
            
                // Redirigez l'utilisateur authentifé vers la page sécurisée.
                header('Location: page-securisee.php');
            }
            else {
                echo("Connexion impossible avec ces informations.");
            }

        } else {
            echo("Erreur lors de l'authentification.");
        }
        ?>
        </div>
        <?php
    } catch (\Throwable $e) {
        echo("Erreur lors de l'authentification.");
        echo($e->getMessage());
    }
?>