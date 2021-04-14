/**
 * Script de l'Api Mustache du Feed des offres
 *
 * @summary
 * @author N.Prevel & W.Caouette
 *
 * Created at     : 2021-04-14 15:07:49
 * Last modified  : 2021-04-14 16:17:46
 */

/*-- Vérification --*/
console.log("le script est lié");

/*-- Récupération des contenus --*/
const viewsContainer = document.querySelector("#js-feed-offer");

/*-- Fonction pour l'affichage --*/
fetchView("views/feed-offer.html");

function fetchView(view) {
    fetch(view)
        .then((response) => {
            return response.text();
        })
        .then((html) => {
            viewsContainer.innerHTML = html;
        });
}

/*-- Récupération des contenus (API) --*/

fetchDatas("../offer-api.php");

function fetchDatas(dataPath) {
    fetch(dataPath)
        .then((response) => {
            return response.json();
        })
        .then((html) => {
            viewsContainer.innerHTML = html;
        });
}