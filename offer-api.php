<?php
    include "db.php";
    
    if(!isset($_GET['id_user'])){
        $requete = "SELECT `id_emploie`, `titre`, `salaire`, `type`, `id_entreprise`, `id_user` FROM `emploies`ORDER BY `id_emploie` DESC";
        $sth = $dbh->prepare($requete);
    }
    else{
        $requete = "SELECT `id_emploie`, `titre`, `salaire`, `type`, `id_entreprise`, `id_user` FROM `emploies` WHERE `id_user` = :id_user ORDER BY `id_emploie` DESC";
        $sth = $dbh->prepare($requete);
        $sth->bindParam(':id_user', $_GET['id_user'], PDO::PARAM_INT);
    }
    
        
    

    $sth->execute();


    
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