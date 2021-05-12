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
    <link rel="stylesheet" href="CSS/feed-offer.css">
    <!-- Mustache -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.1.0/mustache.min.js" integrity="sha512-HYiNpwSxYuji84SQbCU5m9kHEsRqwWypXgJMBtbRSumlx1iBB6QaxgEBZHSHEGM+fKyCX/3Kb5V5jeVXm0OglQ==" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="scripts/menu-burger.js" defer></script>
    <script src="scripts/feed-offer.js" defer></script>
    <script src="scripts/post-offer.js" defer></script>
    <script src="scripts/afficher-form-publication.js" defer></script>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Offres</title>
</head>

<body>
    <?php
        include "header.php"
    ?>
    <section class="container-container">
        <section class="form-publication box">
            
            <div class="logo-formulaire">
                <a href="feed-project.php" class="btn-liens">
                    <h1><div><img src="media/logo.png" alt="logo" class="media-fluide"></div>ENIWAN</h1>
                </a>
            </div>

            <div id="js-btn-close-form" class="btn-x">
                <i class="fas fa-times"></i>
            </div>

            <form action="treatment/post-project-treatment.php" enctype="multipart/form-data" method="post">
                <div>
                    <div class="col-25">
                        <label for="title">Titre du projet <span class="icone-obligatoire">*</span></label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="title" placeholder="titre">
                    </div>     
                </div>

                <div>
                    <div class="col-25">
                        <label for="description">Description <span class="icone-obligatoire">*</span></label>    
                    </div>
                    <div class="col-75">
                        <textarea name="description" id="description" placeholder="description" cols="30" rows="10"></textarea>    
                    </div>       
                </div>
                
                <div>
                    <div class="col-25">
                        <label for="title">Type de média <span class="icone-obligatoire">*</span></label>    
                    </div>
                    <div class="col-75">
                        <div class="media-choix">
                            <div class="choix-image">
                                <input type="radio" name="type" id="image" checked value="image"> image
                                <label for="url">Url Image<span class="icone-obligatoire">*</span></label>
                                <input name="url_image" id="url" type="file">
                            </div>
                            <div class="choix-video">
                                <input type="radio" name="type" id="video" value="video"> video
                                <label for="url">Url Vidéo Youtube<span class="icone-obligatoire">*</span></label>
                                <input name="url_video" id="url" type="text">
                            </div>
                        </div>                    
                    </div>
                    
                </div>

                <div class="btn-publication">
                    <input type="submit" value="Publier">
                </div>
            </form>
        </section>   
    </section>
    <main>
        <div id="js-container-show-offer" class="container-container">
            <section id="js-show-offer-content-container" class="show-project-container"></section>        
        </div> 
        <section id="js-feed-offer">
        
        </section>
    </main>
    <section class="bas-de-page-static">
        <button id="js-btn-publier" class="btn-publier-projet"><b>Publier</b></button>
        <i class="fas fa-chevron-up" id="js-btn-scroll"></i>
    </section>
    
       
</body>
</html>