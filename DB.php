<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With");

    $dsn = 'mysql:dbname=efc_eq2;host=localhost';
    $utilisateur = 'root';
    $motPasse = '';

    try {

        $dbh = new PDO($dsn, $utilisateur, $motPasse);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec('SET CHARACTER SET UTF8');

    } catch (PDOException $e) {
        echo('Échec lors de la connexion : ' . $e->getMessage());
    }
?>