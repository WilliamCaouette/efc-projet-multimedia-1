<?php
    include "db.php";

    //vérifie si un utilisateur est préciser sinon retourner tout les utilisateurs
    if(!isset($_GET['id_user'])){
        $requete = "SELECT `utilisateur_id`, `bio`, `img`,`mail`, `location` FROM `utilisateur`";
        $sth = $dbh->prepare($requete);
    }
    else{
        $requete = "SELECT `utilisateur_id`, `bio`, `img`,`mail`, `location` FROM `utilisateur` WHERE`utilisateur_id` = :utilisateur_id";
        $sth = $dbh->prepare($requete);
        $sth->bindParam(':utilisateur_id', $_GET['id_user'], PDO::PARAM_INT);
    }
    $sth->execute();
    
    // si il y a des éléments retournés les affichés sous forme de JSON
    if($sth->rowCount() > 0){

        http_response_code(200);
        
        $users = array();
        $users['user'] = array();
        while($user = $sth->fetch(PDO::FETCH_ASSOC)){
            array_push($users['user'], $user);
        }

        print_r(json_encode($users, JSON_UNESCAPED_UNICODE));

    }
    else{

        http_response_code(404);

        echo(json_encode(
            array("cet utilisateur n'existe pas")
        ));
    }

?>