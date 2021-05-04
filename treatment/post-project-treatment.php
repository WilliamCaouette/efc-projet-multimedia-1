<?php 
    session_start();

    //rediriger les utilisateurs non connecter
    if (empty($_SESSION['utilisateur'])) {
        header('Location: ../index.php');
    }

    try {
        include "../db.php";


        //vérification du type d'utilisateur pour choisir le type Post(modifie la table dans la requete)
        if($_SESSION['utilisateur']['type'] === "personnal"){
            $request = "INSERT INTO `projet`(`nom`, `type_media`, `url_media`, `description`, `id_user`) VALUES (:nom, :type_media, :url_media, :description, :id_user)";
            $pageFinal = "../feed-project.php";
        }
        else{
            $request = "INSERT INTO `emploies`(`titre`, `id_user`, `type_media`, `url_media`, `description`) VALUES (:nom, :id_user, :type_media, :url_media, :description)";
            $pageFinal = "../feed-offer.php";
        }

        $sth = $dbh->prepare($request);

        $sth->bindParam(':nom', $_POST['title'], PDO::PARAM_STR);
        $sth->bindParam(':type_media', $_POST['type'], PDO::PARAM_STR);
        $sth->bindParam(':id_user', $_SESSION['utilisateur']['utilisateur_id'], PDO::PARAM_STR);
        $sth->bindParam(':description', $_POST['description'], PDO::PARAM_STR);

        //selon le type de média choisie il prend les données dans un champ où l'autre
        if($_POST['type'] === "image"){
            $sth->bindParam(':url_media', $_POST['url_image'], PDO::PARAM_STR);
        }else{
            $sth->bindParam(':url_media', $_POST['url_video'], PDO::PARAM_STR);
        }
        
        if($sth->execute()){
            header('Location: '.$pageFinal);
        }else{
            echo("erreur lors de la création du post");
        }



    } catch (Throwable $th) {
        echo("Erreur lors de la création du post.");
        echo($e->getMessage());
    }


?>