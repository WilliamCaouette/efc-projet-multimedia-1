<?php 
    session_start();
    
    /*if (empty($_SESSION['utilisateur'])) {
        header('Location: index.php');
    }*/
    

    function addALike($idProject, $currentNbLikes){
        include 'db.php';
        $requete = 'UPDATE `projet` SET `likes`= :likes WHERE `id_projet` = :id_projet';
        $sth = $dbh->prepare($requete);
        $sth->bindParam(':likes', $currentNbLikes+=1, PDO::PARAM_INT); //ça marche clairment pas si t'as pas rafraichit avant de like tu descend le nombre de like
        $sth->bindParam(':id_projet', $idProject, PDO::PARAM_INT);
        $sth->execute();
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
    <script src="scripts/feed-project.js" defer></script>
    <title>Eniwan</title>
</head>
<body>
    <!-- Changer la couleur du logo -->
    <!-- intégrer ici l'entête/ la barre de recherche/ etc. -->
    <!-- Suppression de l'include header.php -->
    
    <?php
        include "header.php"
    ?>
    
    <main class="main-content">
    <section class="form-publication box">
        <form action="treatment/post-project-treatment.php" method="post">
            <div>
                <label for="title">Titre <span class="icone-obligatoire">*</span></label>
                <input type="text" name="title" placeholder="titre">
            </div>
            <div>
                <label for="description">description <span class="icone-obligatoire">*</span></label>
                <textarea name="description" id="description" placeholder="description" cols="30" rows="10"></textarea>
            </div>
            <!-- pour t'aider pendant le dev du btn radio https://stackoverflow.com/questions/43276485/enable-button-if-radio-button-selected-->
            <div>
                <label for="title">type de média <span class="icone-obligatoire">*</span></label>
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
            <div class="btn-publication">
                <input type="submit" value="Publier">
            </div>
        </form>
    </section>

    <section id="js-feed-project">

    </section>
    </main>
    <!-- À RETIRER PLUS TARD SERT JUSTE POUR LE DEV EN ATTENDANT LE MENU-->
   
    <!--Template mustache mettre dans un views--> 
    <!----> 
    <section class="bas-de-page-static">
        <button id="js-btn-publier">Publier</button>
    </section>
    <?php
        //include "footer.php";
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