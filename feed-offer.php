<?php 
        include "db.php";
    ?>
     
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome + CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
    <link rel="stylesheet" href="CSS/feed-project.css">
    <!-- Mustache -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.1.0/mustache.min.js" integrity="sha512-HYiNpwSxYuji84SQbCU5m9kHEsRqwWypXgJMBtbRSumlx1iBB6QaxgEBZHSHEGM+fKyCX/3Kb5V5jeVXm0OglQ==" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="scripts/menu-burger.js" defer></script>
    <script src="scripts/feed-offer.js" defer></script>
    <script src="scripts/post-offer.js" defer></script>

    <title>Offres</title>
</head>
<body>
        <?php
            include "header.php"
        ?>
    <main>
        <div id="js-container-show-offer" class="container-container">
            <section id="js-show-offer-content-container" class="show-project-container"></section>        
        </div> 
        <section id="js-feed-offer">
        
        </section>
    </main>

    
       
</body>
</html>