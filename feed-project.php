<?php 
    session_start();
    
    if (empty($_SESSION['utilisateur'])) {
        header('Location: index.php');
    }
    function getSpecificUser($id_user){
        include 'db.php';
        $requete = 'SELECT `utilisateur_id`,`img`,`mail`, `location` FROM `utilisateur` WHERE `utilisateur_id` = :user_id';
        $sth = $dbh->prepare($requete);
        $sth->bindParam(':user_id', $id_user, PDO::PARAM_INT);
        $sth->execute();
        echo($sth->fetch());

    }   
?>
     
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome + CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS/feed-project.css">
    <!-- Mustache -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.1.0/mustache.min.js" integrity="sha512-HYiNpwSxYuji84SQbCU5m9kHEsRqwWypXgJMBtbRSumlx1iBB6QaxgEBZHSHEGM+fKyCX/3Kb5V5jeVXm0OglQ==" crossorigin="anonymous"></script>
    <!-- JS -->
    <script src="scripts/menu-burger.js" defer></script>
    <script src="scripts/feed-project.js" defer></script>
    <script src="scripts/scroll.js" defer></script>
    <script src="scripts/post-project.js" defer></script>
    <title>Projets</title>
</head>

<body>
    <!-- Changer la couleur du logo -->
    <!-- Suppression de l'include header.php -->    
    <?php
        include "header.php"
    ?>

    <!-- Barre de recherche -->
    <div>
        <label for="barre-recherche">Recherche dans le site: </label>
        <input type="search" id="barre-recherche" name="barre-recherche">
        <button>Recherche</button>
    </div>

    <main class="main-content">
        
        <!-- Formulaire de publication de projets -->
        <section class="form-publication box">
            <form action="treatment/post-project-treatment.php" method="post">
                <div>
                    <div class="col-25">
                        <label for="title">Titre <span class="icone-obligatoire">*</span></label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="title" placeholder="titre">
                    </div>     
                </div>

                <div>
                    <div class="col-25">
                        <label for="description">description <span class="icone-obligatoire">*</span></label>    
                    </div>
                    <div class="col-75">
                        <textarea name="description" id="description" placeholder="description" cols="30" rows="10"></textarea>    
                    </div>       
                </div>
                
                <div>
                    <div class="col-25">
                        <label for="title">type de média <span class="icone-obligatoire">*</span></label>    
                    </div>
                    <div class="col-75">
                        <div class="media-choix">
                            <div>
                                <input type="radio" name="type" id="image" checked value="image"> image
                                <label for="url">Url Image<span class="icone-obligatoire">*</span></label>
                                <input name="url_image" id="url" type="text">
                            </div>
                            <div>
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

        <!-- Feed de projets -->
        <section id="js-feed-project" class="feed-project"></section>

        <section id="js-container-show-project"></section>
    </main>
       
    <section class="bas-de-page-static">
        <button id="js-btn-publier">Publier</button>
    </section>

    <section>
        <!--Remplacer par une image perso-->
        <i class="fas fa-chevron-up" id="js-btn-scroll"></i>
    </section>

    <input type="hidden" name="" id="js-user-id" value="<?=$_SESSION['utilisateur']['utilisateur_id']?>">
</body>
</html>
