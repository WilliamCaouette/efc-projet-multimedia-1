<?php
    include "db.php";

    if(!isset($_GET['id_user'])){
        $requete = "SELECT `id_projet`, `nom`, `type_media`, `url_media`, `description`, `likes`, `id_user` FROM `projet`ORDER BY `id_projet` DESC";
        $sth = $dbh->prepare($requete);
    }
    else{
        $requete = "SELECT `id_projet`, `nom`, `type_media`, `url_media`, `description`, `likes`, `id_user` FROM `projet` WHERE `id_user` = :id_user ORDER BY `id_projet` DESC";
        $sth = $dbh->prepare($requete);
        $sth->bindParam(':id_user', $_GET['id_user'], PDO::PARAM_INT);
    }
    

    $sth->execute();


    
    if($sth->rowCount() > 0){

        http_response_code(200);
        
        $projects = array();
        $projects['project'] = array();

        while($project = $sth->fetch(PDO::FETCH_ASSOC)){
            array_push($projects['project'], $project);
        }

        print_r(json_encode($projects, JSON_UNESCAPED_UNICODE));

    }
    else{

        http_response_code(404);

        echo(json_encode(
            array("message"=>"aucun projets n'a été trouver")
        ));
    }

?>