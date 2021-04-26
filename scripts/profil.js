/**
 * Script de l'Api Mustache de la page profil
 *
 * @summary short description for the file
 * @author N.Prevel
 *
 * Created at     : 2021-04-25 19:48:30
 * Last modified  : 2021-04-26 14:58:19
 */

/*-- Récupération des contenus --*/
const viewsContainer = document.querySelector("js-feed-project");
const value = document.querySelector("#js-value").value;
let projectsContainers;
/*-- Fonction pour l'affichage + Récupération des contenus en fonction de l'id dans l'URL --*/


/*-- Récupération des contenus (API) --*/

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