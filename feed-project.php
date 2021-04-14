 <?php 
        include "db.php";
    ?>
    <!--Faire un header appart sur une page html appart--> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>RS</title>
</head>
<body>
    <!-- intégrer ici l'entête/ la barre de recherche/ etc. -->
    <?php
        include "header.php";
    ?>

<!--Commencer HTML MUSTACHE TEMPLATE--> 
       
    <?php
        include "footer.php";
    ?>
</body>
</html>

<!-- vérifier si ça marche
    $id = $projet['id_projet'];
    $likes = $projet['likes'];
    $requestLike = 'UPDATE `projet` SET`likes`=:likes WHERE id_projet = :id_projet';
    $sth = $dbh->prepare($requestLike);
    $sth->execute();
-->