/**
 * Ce fichier sert à faire en sorte que lorsqu'une vignette de projet s'affiche celui ci s'affiche dans une fenetre plus grande
 *
 * @summary écouteurs d'évènement Fetch et injection HTML / PHP
 * @author William Caouette
 *
 * Created at     : 2021-04-25 12:21:10 
 * Last modified  : 2021-04-26 14:36:54
 */
 const containerShowProject = document.querySelector("#js-container-show-project");
 let projects;
 let projectContent;
 let currentProject;
 
 /**
  * @summary récupère tout les post via l'API
  */ 
 function getAllPost(){
     fetch("project-api.php")
     .then(response=>{return response.json()})
     .then(json =>{
         projects = json.project;
     })
 }getAllPost();
 
 
 /**
  * @summary affiche le projet en entier dans le conteneur s'activer au clique d'un projet
  * @param {event} e représente l'évènement click 
  */
 function showProject(e){
     getCurrentProject(e.target.dataset.projet);
     createProjectContent();
     containerShowProject.innerHTML = projectContent;
     containerShowProject.style.display = "block";
 }
 
 
 /**
  *@summary récupère les informations du projet que l'on veux afficher
  * @param {int} idProjet contient l'identifiant du projet actuel
  */
 function getCurrentProject(idProjet){
    projects.forEach(projet => {
        if(projet.id_projet == idProjet){
            currentProject = projet;
        }else{
            return;
        }
    });
 }
 
 
 /**
  * @summary créé le contenu HTML incluant les informations du projet qui sera ensuite injecter dans notre conteneur
  */
 function createProjectContent(){
 
     //crée le contenu html en fonction du type de média que contient le projet
     if(currentProject.type === "image"){
         projectContent = `
         <div class="half-item">
             <img class="media-fluide" src="${currentProject.url_media}" alt="image représentant le projet">
         </div>
         <div class="half-item">
             <section class="creator-infos">
                 <div class="img-profil">
                     <img class="media-fluide" src="media/<?php=getSpecificUser(${currentProject.id_user})->img?>" alt="image de profil de l'utilisateur">
                 </div>
                 <p class="user-name"><?php=getSpecificUser(${currentProject.id_user})->mail?>, <?php=getSpecificUser(${currentProject.id_user})->location?></p>
             </section>
             <section class="post-content">
                 <h2 class="projet-titre">${currentProject.nom}</h2>
                 <p>${currentProject.description}</p>
             </section>
             <section class="like-section">
                 <div class="img-like">
                     <img class="media-fluide" onclick='addALike(${currentProject.id_project})' src="media/heart.png" alt="image de profil de l'utilisateur">
                 </div>
                 <p>${currentProject.likes}</p>
             </section>
         </div>`;
     }
     else{
         projectContent = `
         <div class="half-item">
             <div class="youtube-responsive">
                 <iframe width="818" height="460" src="https://www.youtube.com/embed/${currentProject.url_media}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>
         </div>
         <div class="half-item">
             <section class="creator-infos">
                 <div class="img-profil">
                     <img class="media-fluide" src="media/<?php=getSpecificUser(${currentProject.id_user})->img?>" alt="image de profil de l'utilisateur">
                 </div>
                 <p class="user-name"><?php=getSpecificUser(${currentProject.id_user})->mail?>, <?php=getSpecificUser(${currentProject.id_user})->location?></p>
             </section>
             <section class="post-content">
                 <h2 class="projet-titre">${currentProject.nom}</h2>
                 <p>${currentProject.description}</p>
             </section>
             <section class="like-section">
                 <div class="img-like">
                     <img class="media-fluide" onclick='addALike(${currentProject.id_projet})' src="media/heart.png" alt="image de profil de l'utilisateur">
                 </div>
                 <p>${currentProject.likes}</p>
             </section>
         </div>`;
     }
     
 }