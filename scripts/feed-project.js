/**
 * Script de l'Api Mustache du Feed des projets
 *  CE SCRIPT FONCTIONNE DE FAÇON COMPLÉMENTAIRE AVEC post-project.js
 * @summary
 * @author N.Prevel & W.Caouette
 *
 * Created at     : 2021-04-14 15:07:49
 * Last modified  : 2021-04-27 15:25:30
 */

/*-- Récupération des contenus --*/
const viewsContainer = document.querySelector("#js-feed-project");
let projectsContainers;
/*-- Fonction pour l'affichage --*/
fetchView("views/feed-project.html");


/**
 * @summary récupère la vue et les données via l'api approprié puis insère le html dans le conteneur
 * @param {string} view le path vers le html partiel que nous souhaitons utiliser comme pattern 
 */
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
