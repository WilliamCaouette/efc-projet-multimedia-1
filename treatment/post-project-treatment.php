<?php 
    session_start();
    if (empty($_SESSION['utilisateur'])) {
        header('Location: ../index.php');
    }
    try {
        include "../db.php";
        
        if($_SESSION['utilisateur']['type'] === "personnal"){
            $request = "INSERT INTO `projet`(`nom`, `type_media`, `url_media`, `description`, `id_user`) VALUES (:nom, :type_media, :url_media, :description, :id_user)";
        }
        else{
            $request = "INSERT INTO `projet`(`nom`, `type_media`, `url_media`, `description`, `id_user`) VALUES (:nom, :type_media, :url_media, :description, :id_user)";
        }




    } catch (\Throwable $th) {
        //throw $th;
    }








?>