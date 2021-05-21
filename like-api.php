<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With");
    try {
        include 'db.php';
        $like = json_decode(file_get_contents("php://input"));
        $requete = 'INSERT INTO `like`(`user_id`, `project_id`) VALUES (:user_id, :project_id)';
        $sth = $dbh->prepare($requete);
        $sth->bindParam(':user_id', $like->user_id, PDO::PARAM_INT);
        $sth->bindParam(':project_id', $like->project_id, PDO::PARAM_INT);
        if($sth->execute()){

            http_response_code(201);

            echo(json_encode(
                array("message"=>"Le post à bien été liker : " . $dbh->lastInsertId())
            ));

        }else{
            
            http_response_code(503);

            echo(json_encode(
                    array("message"=>"une erreur est survenue lors de la création du like")
                ));
        }
    }

    catch (PDOException $e) {
        echo('Échec lors de la connexion : ' . $e->getMessage());
    }
?>