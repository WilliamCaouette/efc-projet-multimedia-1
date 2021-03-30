<?php

    include "../db.php";

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $type = $_POST['type_membre'];
    $etudes = $_POST['etudes'];
    $etablissement = $_POST['etablissement'];
    $pays = $_POST['pays'];

    $request = "INSERT INTO `utilisateur`
    (`nom`, `prenom`, `bio`, `mot_de_passe`, `type`, `email`, `etudes`, `pays`, `etablissement`) VALUES 
    (:nom, :prenom, :bio, :mot_de_passe , :type , :email , :etudes , :pays , :etablissement )";

    $sth = $dbh->prepare($request);

    $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
    $sth->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $sth->bindParam(':email', $email, PDO::PARAM_STR);
    $sth->bindParam(':type', $type, PDO::PARAM_STR);
    $sth->bindParam(':etudes', $etudes, PDO::PARAM_STR);
    $sth->bindParam(':etablissement', $etablissement, PDO::PARAM_STR);
    $sth->bindParam(':pays', $pays, PDO::PARAM_STR);
    $sth->bindParam(':bio', $bio, PDO::PARAM_STR);
    $sth->bindParam(':mot_de_passe', $mot_de_passe, PDO::PARAM_STR);

    $sth->execute();

// vérification si le mail est déjà prit

/**
 * si tout est correct
 * header('Location: ../index.php');
 * sinon 
 * header('Location: ../inscription.php?error="mail-used"');
 * 
 */
?>