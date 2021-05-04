/**
 * Ce fichier sert à faire en sorte que lorsqu'une vignette de projet s'affiche celui ci s'affiche dans une fenetre plus grande
 *
 * @summary écouteurs d'évènement Fetch et injection HTML / PHP
 * @author William Caouette
 *
 * Created at     : 2021-04-25 12:21:10 
 * Last modified  : 2021-05-03 20:08:41
 */
const contentContainer = document.querySelector("#js-show-project-content-container");
 const containerShowProject = document.querySelector("#js-container-show-project");
 let projects;
 let projectContent;
 let currentProject;
 let currentProjectCreator;
 let userId = document.querySelector("#js-user-id").value;
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
     contentContainer.innerHTML = projectContent;
     containerShowProject.style.display = "flex";
 }
 
 
 /**
  *@summary récupère les informations du projet que l'on veux afficher
  * @param {int} idProjet contient l'identifiant du projet actuel
  */
 function getCurrentProject(idProjet){
    projects.forEach(projet => {
        if(projet.id_projet == idProjet){
            console.log(projet)
            currentProject = projet;
            getProjectCreator()
        }else{
            return;
        }
    });
 }
 /**
  * @summary récupère les informations sur le créateur du projet selectionner
  */
 function getProjectCreator(){
    fetch("user-api.php?id_user=" + currentProject.id_user)
    .then(response=>{return response.json()})
    .then(json =>{
        currentProjectCreator = json.user[0];
    })
 }
 
 /**
  * @summary créé le contenu HTML incluant les informations du projet qui sera ensuite injecter dans notre conteneur
  */
 function createProjectContent(){
 
     //crée le contenu html en fonction du type de média que contient le projet
     if(currentProject.type_media === "image"){
         projectContent = `
         <div class="half-item">
             <img class="media-fluide" src="${currentProject.url_media}" alt="image représentant le projet">
         </div>
         <div class="half-item">
             <a href="profil.php?user_id=${currentProject.id_user}">
                <section class="creator-infos">
                    <div class="img-profil">
                        <img class="media-fluide" src='media/${currentProjectCreator.img}' alt="image de profil de l'utilisateur">
                    </div>
                    <p class="user-name">${currentProjectCreator.mail}, ${currentProjectCreator.location}</p>
                </section>
             </a>
             <section class="post-content">
                 <h2 class="projet-titre">${currentProject.nom}</h2>
                 <p>${currentProject.description}</p>
             </section>
             <section class="like-section">
                 <div class="img-like">
                    <i class="far fa-heart" onclick='addALike(${currentProject.id_projet})'></i>
                 </div>
                 <p>${currentProject.likes} likes</p>
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
            <a href="profil.php?user_id=${currentProject.id_user}">
                <section class="creator-infos">
                    <div class="img-profil">
                        <img class="media-fluide" src='media/${currentProjectCreator.img}' alt="image de profil de l'utilisateur">
                    </div>
                    <p class="user-name">${currentProjectCreator.mail}, ${currentProjectCreator.location}</p>
                </section>
            </a>
            <section class="post-content">
                <h2 class="projet-titre">${currentProject.nom}</h2>
                <p>${currentProject.description}</p>
            </section>
            <section class="like-section">
                <div class="img-like">
                    <i class="far fa-heart" onclick='addALike(${currentProject.id_projet})'></i>
                </div>
                <p>${currentProject.likes} likes</p>
            </section>
        </div>`;
     }
     
 }

 /**
  * @summary ajoute un like dans la table de données via une api ce qui à pour effet d'activé le "trigger" qui ajoute un like sur le projet
  * @param {int} projectId l'identifiant unique du projet liker
  */
 function addALike(projectId){
    like = {
        project_id : projectId,
        user_id : userId
    }
    
    fetch('like-api.php', {
        method: "POST",
        body: JSON.stringify(like),
        headers: {"Content-type": "application/json; charset=UTF-8"}
    })
    .then(reponse => reponse.text()) 
    .then(json => console.log(json))
    .catch(erreur => console.log(erreur));
 }