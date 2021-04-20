<?php 
        include "db.php";
    ?>
     
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/feed-project.css">
    <!-- Mustache -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.1.0/mustache.min.js" integrity="sha512-HYiNpwSxYuji84SQbCU5m9kHEsRqwWypXgJMBtbRSumlx1iBB6QaxgEBZHSHEGM+fKyCX/3Kb5V5jeVXm0OglQ==" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="scripts/feed-offer.js" defer></script>
    <script src="scripts/feed-project.js" defer></script>
    <title>Eniwan</title>
</head>
<body>
    <!-- intégrer ici l'entête/ la barre de recherche/ etc. -->
    <?php
        include "header.php"
    ?>
    <main>
        <section id="js-feed-offer">

        </section>
    </main>

    <!--Template mustache mettre dans un views--> 
    <!----> 
       
    <?php
        include "footer.php";
    ?>
</body>
</html>