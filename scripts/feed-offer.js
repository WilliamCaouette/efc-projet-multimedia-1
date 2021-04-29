/**
 * Script de l'Api Mustache du Feed des offres
 *
 * @summary
 * @author N.Prevel & W.Caouette
 *
 * Created at     : 2021-04-14 15:07:49
 * Last modified  : 2021-04-29 08:27:47
 */


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
            fetch(dataPath)
                .then((response) => {
                    return response.json();
                })
                .then((json) => {
                    viewsContainer.innerHTML = Mustache.render(html, json);
                });
        });
}