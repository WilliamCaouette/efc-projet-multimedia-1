<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS</title>
</head>
<body>
    <!-- intégrer ici l'entête/ la barre de recherche/ etc. -->



    <?php 
        include "db.php";
        $request = "SELECT `id_projet`, `nom`, `type`, `url_media` FROM `projet`";
        $sth->$dbh->prepare($requete);
        $sth->execute();
        $projets = $sth->fetchAll();

        foreach($projets as $projet){
            ?>
            <div class="projet-card">
                    <?php 
                        if($projet['type'] === 'youtube'){
                            ?>
                                <div class="youtube-responsive">
                                    <iframe width="1280" height="720" src="<?=$projet['url_media'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            <?php
                        }
                        else{
                            ?>
                                <div class="conteneur-vignette">
                                    <img class="media-fluide" src="<?=$projet['url_media'];?>" alt="image représentant le projet">
                                </div>
                            <?php
                        }
                    ?>
                    <h3><?=$projet['nom'];?></h3>
                    <a href="detail-projet.php?id_projet=<?=$projet['id_projet'];?>">en savoire plus -></a>
                </div>
            <?php
        }
    ?>
</body>
</html>