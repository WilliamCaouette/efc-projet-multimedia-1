<?php 
    session_start();
    if (empty($_SESSION['utilisateur'])) {
        header('Location: index.php');
    }

    
?>
     
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="CSS/profil.css">
    <link rel="stylesheet" href="CSS/feed-project.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.1.0/mustache.min.js" integrity="sha512-HYiNpwSxYuji84SQbCU5m9kHEsRqwWypXgJMBtbRSumlx1iBB6QaxgEBZHSHEGM+fKyCX/3Kb5V5jeVXm0OglQ==" crossorigin="anonymous"></script>
    <script src="scripts/profil.js" defer></script>
    <script src="scripts/menu-burger.js" defer></script>
    <script src="scripts/post-project.js" defer></script>
    <script src="scripts/afficher-form-publication.js" defer></script>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Eniwan</title>
</head>
<body>

    <?php
        include "header.php";
        include "db.php";
        $request = "SELECT `bio`, `img`, `mail`, `location` FROM `utilisateur` WHERE `utilisateur_id` = :user_id";
        $sth = $dbh->prepare($request);
        $sth->bindParam(":user_id", $_GET['user_id'], PDO::PARAM_INT);
        $sth->execute();
        if($sth->rowCount() == 0){
            echo("cet utilisateur n'existe pas");
        }
        $profil = $sth->fetch();
    ?>
    <section class="profil">
        <div class="col-30">
            <img src="<?="media/".$profil['img'];?>" alt="image de profil de l'utilisateur" class="media-fluide">
        </div>
        <div class="col-70 infos-profil">
            <div>
                <h2><?=$profil['mail'];?></h2>
            </div>
            <div>
                <p><?=$profil['bio'];?></p>
            </div>
            <div>
                <p><?=$profil['location'];?></p>
            </div>
        </div>    
    </section>

    <main class="main-content">
    <section class="container-container">
            <section class="form-publication box">

                <div class="logo-formulaire">
                    <a href="feed-project.php">
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
        <section id="js-feed-project" class="feed-project"></section>
        <div id="js-container-show-project" class="container-container">
            <section id="js-show-project-content-container" class="show-project-container"></section>        
        </div> 
    </main>
    <section class="bas-de-page-static">
        <button id="js-btn-publier" class="btn-publier-projet"><b>Publier</b></button>
        <i class="fas fa-chevron-up" id="js-btn-scroll"></i>
    </section>
    <input type="hidden" name="" value="<?=$_GET['user_id'];?>" id="js-value">
    <input type="hidden" name="" id="js-user-id" value="<?=$_SESSION['utilisateur']['utilisateur_id']?>">
</body>
</html>