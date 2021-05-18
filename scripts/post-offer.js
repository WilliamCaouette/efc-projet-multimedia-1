/**
 * Ce fichier sert à faire en sorte que lorsqu'une vignette de offer s'affiche celui ci s'affiche dans une fenetre plus grande
 *
 * @summary écouteurs d'évènement Fetch et injection HTML / PHP
 * @author William Caouette
 *
 * Created at     : 2021-04-25 12:21:10 
 * Last modified  : 2021-05-18 15:19:11
 */
 const contentContainer = document.querySelector("#js-show-offer-content-container");
 const containerShowProject = document.querySelector("#js-container-show-offer");
 let offers;
 let offersContent;
 let currentOffer;
 let currentOfferCreator;
 /**
  * @summary récupère tout les post via l'API
  */ 
 function getAllPost(){
     fetch("offer-api.php")
     .then(response=>{return response.json()})
     .then(json =>{
         offers = json.offer;
     })
     
 }getAllPost();
 
 
 /**
  * @summary affiche l'offre en entier dans le conteneur s'activer au clique d'un offre
  * @param {event} e représente l'évènement click 
  */
 function showOffer(e){
     getcurrentOffer(e.target.dataset.offer);
     console.log("click")
 }
 
 
 /**
  *@summary récupère les informations du offer que l'on veux afficher
  * @param {int} idOffer contient l'identifiant du offer actuel
  */
 function getcurrentOffer(idOffer){
    offers.forEach(offer => {
        if(offer.id_emploie == idOffer){
            currentOffer = offer;
            console.log(offer.id_emploie);
            getProjectCreator()
        }else{
            return;
        }
    });
 }
 /**
  * @summary récupère les informations sur le créateur du offer selectionner
  */
 function getProjectCreator(){
    fetch("user-api.php?id_user=" + currentOffer.id_user)
    .then(response=>{return response.json()})
    .then(json =>{
        currentOfferCreator = json.user[0];
        createProjectContent();
    })
 }
 
 /**
  * @summary créé le contenu HTML incluant les informations du offer qui sera ensuite injecter dans notre conteneur
  */
 function createProjectContent(){
 
     //crée le contenu html en fonction du type de média que contient le offer
     if(currentOffer.type_media === "image"){
         offersContent = `
         <div id="js-btn-close" class="btn-x">
            <i class="fas fa-times"></i>
         </div>
         <div class="half-item">
             <img class="media-fluide" src="images-post/${currentOffer.url_media}" alt="image représentant le offer">
         </div>
         <div class="half-item">
             <a href="profil.php?user_id=${currentOffer.id_user}">
                <section class="creator-infos">
                    <div class="img-profil">
                        <img class="media-fluide" src='media/${currentOfferCreator.img}' alt="image de profil de l'utilisateur">
                    </div>
                    <p class="user-name">${currentOfferCreator.mail}, ${currentOfferCreator.location}</p>
                </section>
             </a>
             <section class="post-content">
                 <h2 class="offer-titre">${currentOffer.titre}</h2>
                 <p>${currentOffer.description}</p>
             </section>
         </div>`;
     }
     else{
         offersContent = `
         <div id="js-btn-close" class="btn-x">
            <i class="fas fa-times"></i>
         </div>
         <div class="half-item">
             <div class="youtube-responsive">
                 <iframe width="818" height="460" src="https://www.youtube.com/embed/${currentOffer.url_media}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
             </div>
         </div>
         <div class="half-item">
            <a href="profil.php?user_id=${currentOffer.id_user}">
                <section class="creator-infos">
                    <div class="img-profil">
                        <img class="media-fluide" src='media/${currentOfferCreator.img}' alt="image de profil de l'utilisateur">
                    </div>
                    <p class="user-name">${currentOfferCreator.mail}, ${currentOfferCreator.location}</p>
                </section>
            </a>
            <section class="post-content">
                <h2 class="offer-titre">${currentOffer.titre}</h2>
                <p>${currentOffer.description}</p>
            </section>
        </div>`;
     }
     addContentToContainer();
 }

 /**
  * ajoute le contenu créé dans createProjectContent() dans le content container et ajoute l'event listener pour le fermer
  */
function addContentToContainer(){
    contentContainer.innerHTML = offersContent;
    containerShowProject.style.display = "flex";
    document.querySelector("#js-btn-close").addEventListener("click", (e)=>{
        containerShowProject.style.display = "none"
    });
}
