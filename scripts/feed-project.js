/**
 * Script de l'Api Mustache du Feed des projets
 *
 * @summary
 * @author N.Prevel & W.Caouette
 *
 * Created at     : 2021-04-14 15:07:49
 * Last modified  : 2021-04-26 14:38:57
 */

/*-- Récupération des contenus --*/
const viewsContainer = document.querySelector("#js-feed-project");
let projectsContainers;
/*-- Fonction pour l'affichage --*/
fetchView("views/feed-project.html");

/*-- Récupération des contenus (API) --*/

function fetchView(view) {
    fetch(view)
        .then((response) => {
            return response.text();
        })
        .then((html) => {
            fetch("project-api.php")
                .then((response) => {
                    return response.json();
                })
                .then((json) => {
                    viewsContainer.innerHTML = Mustache.render(html, json);
                    projectsContainers = document.querySelectorAll(".projet");
                    projectsContainers.forEach(project=>{
                        project.addEventListener("click", showProject);
                        //show project est une fonction dans le script post-project qui est complémentaire aux scriptes feed et profil
                    })
                });
        });
}
