/**
 * Script de l'Api Mustache de la page profil
 *
 * @summary short description for the file
 * @author N.Prevel
 *
 * Created at     : 2021-04-25 19:48:30
 * Last modified  : 2021-04-25 20:03:03
 */

/*-- Récupération des contenus --*/
const viewsContainer = document.querySelector("#js-profil");
const value = document.querySelector("#js-value").value;

/*-- Fonction pour l'affichage + Récupération des contenus en fonction de l'id dans l'URL --*/
fetchView("views/feed-project.html?user_id=" + value);

/*-- Récupération des contenus (API) --*/

function fetchView(view) {
    fetch(view)
        .then((response) => {
            return response.text();
        })
        .then((html) => {
            fetch(dataPath)
                .then((response) => {
                    return response.json();
                })
                .then((json) => {
                    viewsContainer.innerHTML = Mustache.render(html, json);
                });
        });
}