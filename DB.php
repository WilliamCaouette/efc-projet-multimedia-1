<?php

    $dsn = 'mysql:dbname=tim_eq2-2021;host=localhost';
    $utilisateur = 'tim_eq2-2021';
    $motPasse = '6J5n9quduA';

    try {

        $dbh = new PDO($dsn, $utilisateur, $motPasse);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec('SET CHARACTER SET UTF8');

    } catch (PDOException $e) {
        echo('Échec lors de la connexion : ' . $e->getMessage());
    }
?>