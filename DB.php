<?php

    $dsn = 'mysql:dbname=;host=localhost';
    $utilisateur = '';
    $motPasse = '';

    try {

        $dbh = new PDO($dsn, $utilisateur, $motPasse);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec('SET CHARACTER SET UTF8');

    } catch (PDOException $e) {
        echo('Échec lors de la connexion : ' . $e->getMessage());
    }
?>
