/**
 * Script de l'Api Mustache de la page profil
 *
 * @summary short description for the file
 * @author N.Prevel
 *
 * Created at     : 2021-04-25 19:48:30
 * Last modified  : 2021-04-27 15:26:46
 */

const viewsContainer = document.querySelector("#js-feed-project");
const value = document.querySelector("#js-value").value;
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
            fetch("project-api.php?id_user=" + value)
                .then((response) => {
                    return response.json();
                })
                .then((json) => {
                    console.log(json);
                    viewsContainer.innerHTML = Mustache.render(html, json);
                    projectsContainers = document.querySelectorAll(".projet");
                    projectsContainers.forEach(project=>{
                        project.addEventListener("click", showProject);
                    })
                });
        });
}fetchView()