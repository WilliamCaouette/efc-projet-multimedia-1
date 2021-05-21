/**
 * Script de l'Api Mustache de la page profil
 *
 * @summary short description for the file
 * @author N.Prevel & William Caouette
 *
 * Created at     : 2021-04-25 19:48:30
 * Last modified  : 2021-05-21 10:37:45
 */

const viewsContainerProject = document.querySelector("#js-feed-project");
const viewsContainerOffer = document.querySelector("#js-feed-offer");
const profilId = document.querySelector("#js-value").value;
let projectsContainers;


/**
 * @summary récupère la vue et les données via l'api approprié puis insère le html dans le conteneur 
 */
function fetchView() {
    fetch("views/feed-project.html")
        .then((reponse) => {
            return reponse.text();
            
        })
        .then((html) => {
            fetch("project-api.php?id_user=" + profilId)
                .then((response) => {
                    return response.json();
                })
                .then((json) => {
                    //s'il reçoit un message de la part de l'api alors ils récupère le contenu d'entreprise (ça veut dire que c'est une entreprise et non un utilisateur)
                    if(json.message  == "aucun projets n'a été trouver"){
                        fetch("views/feed-offer.html")
                        .then((reponse) => {
                            return reponse.text();
                            
                        })
                        .then((html) => {
                            fetch("offer-api.php?id_user=" + profilId)
                                .then((response) => {
                                    return response.json();
                                })
                                .then((json) => {
                                    viewsContainerOffer.innerHTML = Mustache.render(html, json);
                                    offerContainers = document.querySelectorAll(".offer");
                                    offerContainers.forEach(offer=>{
                                        offer.addEventListener("click", showOffer);
                                    })
                                })
                        });

                    }else{
                        viewsContainerProject.innerHTML = Mustache.render(html, json);
                        projectsContainers = document.querySelectorAll(".projet");
                        projectsContainers.forEach(project=>{
                            project.addEventListener("click", showProject);
                        })
                    }
                    
                })
        });
        
}fetchView()