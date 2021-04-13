<?php

    include "../db.php";

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $username = $_POST['username'];
    $bio = $_POST['bio'];
    $type = $_POST['type_membre'];
    $pays = $_POST['pays'];

    $request = "INSERT INTO `utilisateur`(`nom`, `prenom`, `bio`, `mot_de_passe`, `type`, `username`, `pays`) VALUES (:nom, :prenom, :bio, :mot_de_passe , :type , :email ,:pays)";

    $sth = $dbh->prepare($request);

    $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
    $sth->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $sth->bindParam(':username', $username, PDO::PARAM_STR);
    $sth->bindParam(':type', $type, PDO::PARAM_STR);
    $sth->bindParam(':pays', $pays, PDO::PARAM_STR);
    $sth->bindParam(':bio', $bio, PDO::PARAM_STR);
    $sth->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);

    $sth->execute();

// vérification si le mail est déjà prit

/**
 * si un select avec le mail dans la base de données ne retourne aucune ligne
 * header('Location: ../index.php');
 * sinon 
 * header('Location: ../inscription.php?error="mail-used"');
 * 
 */
?>