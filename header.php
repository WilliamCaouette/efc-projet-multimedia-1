<?php
    $id_user = $_SESSION['utilisateur']['utilisateur_id'];
?>
<header>
    <div class="logo">
        <a href="feed-project.php" class="btn-liens">
            <h1><div><img src="media/logo.small.blanc.png" alt="logo" class="media-fluide"></div>ENIWAN</h1>
        </a>
    </div>
    <div class="btn-menu">
        <i class="fas fa-bars"></i>
    </div>
</header>
<nav>
    <div class="btn-cancel">
        <i class="fas fa-times"></i>
    </div>
    <ul class="menu">
        <li>
            <a href="feed-project.php" class="btn-liens">Accueil</a>
        </li>
            <span class="line"></span>
        <li>
            <a href="feed-project.php" class="btn-liens">Projets</a>
        </li>
            <span class="line"></span>
        <li>
            <a href="feed-offer.php" class="btn-liens">Emplois</a>
        </li>
            <span class="line"></span>
        <li>
            <a href="profil.php?user_id=<?=$id_user?>" class="btn-liens">Profil</a>
        </li>
            <span class="line"></span>
    </ul>
    <div class="btn-disconnect">
        <a href="treatment/disconnect.php" class="btn-liens">Déconnexion</a>
    </div>
</nav>
