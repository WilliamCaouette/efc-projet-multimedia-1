<?php
    include "db.php";
    
    //vérifie si un utilisateur est préciser sinon retourner tout les projets
    if(!isset($_GET['id_user'])){
        $requete = "SELECT `id_emploie`, `titre`, `id_user`, `type_media`, `url_media`, `description` FROM `emploies`ORDER BY `id_emploie` DESC";
        $sth = $dbh->prepare($requete);
    }
    else{
        $requete = "SELECT SELECT `id_emploie`, `titre`, `id_user`, `type_media`, `url_media`, `description` FROM `emploies` WHERE `id_user` = :id_user ORDER BY `id_emploie` DESC";
        $sth = $dbh->prepare($requete);
        $sth->bindParam(':id_user', $_GET['id_user'], PDO::PARAM_INT);
    }

    $sth->execute();


    // si il y a des éléments retournés les affichés sous forme de JSON
    if($sth->rowCount() > 0){

        http_response_code(200);
        
        $offers = array();
        $offers['offer'] = array();

        while($offer = $sth->fetch(PDO::FETCH_ASSOC)){
            array_push($offers['offer'], $offer);
        }

        print_r(json_encode($offers, JSON_UNESCAPED_UNICODE));

    }
    else{

        http_response_code(404);

        echo(json_encode(
            array("message"=>"aucun projets n'a été trouver")
        ));
    }

?>