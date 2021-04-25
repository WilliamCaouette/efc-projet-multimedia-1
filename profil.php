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
    <link rel="stylesheet" href="CSS/feed-project.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/4.1.0/mustache.min.js" integrity="sha512-HYiNpwSxYuji84SQbCU5m9kHEsRqwWypXgJMBtbRSumlx1iBB6QaxgEBZHSHEGM+fKyCX/3Kb5V5jeVXm0OglQ==" crossorigin="anonymous"></script>
    <script src="scripts/feed-project.js" defer></script>
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
        <div>
            <img src="<?="media/".$profil['image'];?>" alt="image de profil de l'utilisateur">
        </div>
        <div>
            <h2><?=$profil['mail'];?></h2>
        </div>
        <div>
            <p><?=$profil['bio'];?></p>
        </div>
        <div>
            <p><?=$profil['location'];?></p>
        </div>
    </section>
    <main class="main-content">
        <section id="js-profil">

        </section>
    </main>
</body>
</html>