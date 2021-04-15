<?php
    if (!empty($_SESSION['utilisateur'])) {
        header('Location: ../feed-project.php');
    }


    try {

        include "../db.php";


        $utilsateur = filter_var_array($_POST, array(
            'mail' => FILTER_SANITIZE_EMAIL,
            'password' => ['filter' => FILTER_SANITIZE_STRING,
                            'options' => FILTER_FLAG_STRIP_HIGH]
        ));

        $sth = $dbh->prepare("SELECT `id_utilisateur`, `courriel`, `mot_passe`
                                FROM `utilisateur` 
                               WHERE `courriel` = :courriel");

        $sth->bindParam(':courriel', $utilsateur['mail'], PDO::PARAM_STR);
        $sth->bindParam(':mot_passe', $utilsateur['password'], PDO::PARAM_STR);
        ?>

        <div class="centrer centrer-texte">
        <?php
        if ($sth->execute()) {
            echo("Succès lors de la récupération du compte.");
            
            $utilisateurTrouve = $sth->fetch(PDO::FETCH_ASSOC);
            if(password_verify($utilsateur["password"], $utilisateurTrouve['password'])) {

                $_SESSION['utilisateur'] = array(
                    'id_utilisateur' => $utilisateurTrouve['id_utilisateur'],
                    'courriel' => $utilisateurTrouve['mail'],
                    'mot_passe' => $utilisateurTrouve['password']
                );
            
                header('Location: ../feed-project.php');
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