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
        $request = "SELECT `id_projet`, `nom`, `type_media`, `url_media` FROM `projet`";
        $sth->$dbh->prepare($requete);
        $sth->execute();
        $projects = $sth->fetchAll();

        foreach($projects as $project){
            ?>
            <div class="projet-card">
                    <?php 
                        if($project['type_media'] === 'youtube'){
                            ?>
                                <div class="youtube-responsive">
                                    <iframe width="1280" height="720" src="<?=$project['url_media'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            <?php
                        }
                        else{
                            ?>
                                <div class="conteneur-vignette">
                                    <img class="media-fluide" src="<?=$project['url_media'];?>" alt="image représentant le projet">
                                </div>
                            <?php
                        }
                    ?>
                    <h3><?=$project['nom'];?></h3>
                    <a href="detail-projet.php?id_projet=<?=$project['id_projet'];?>">en savoire plus -></a>
                    <!-- créé la section Like -->
                    <button class="btn-like">Like</button>
                    <p class="nb-like" onclick=""><?=$project['likes'];?></p>
                </div>
            <?php
        }
    ?>
</body>
</html>

<!-- vérifier si ça marche
    $id = $projet['id_projet'];
    $likes = $projet['likes'];
    $requestLike = 'UPDATE `projet` SET`likes`=:likes WHERE id_projet = :id_projet';
    $sth->$dbh->prepare($requestLike);
    $sth->execute();
-->