/**
 * Script de l'Api Mustache du Feed des offres
 *
 * @summary
 * @author N.Prevel & W.Caouette
 *
 * Created at     : 2021-04-14 15:07:49
 * Last modified  : 2021-05-12 12:26:49
 */


/*-- Récupération des contenus --*/
const viewsContainer = document.querySelector("#js-feed-offer");

/*-- Fonction pour l'affichage --*/
fetchView("views/feed-offer.html");

function fetchView() {
    fetch("views/feed-offer.html")
    .then(reponse=>{return reponse.text();})
    .then(html=>{

        fetch("offer-api.php")
        .then(response=>{return response.json();})
        .then(json=>{
            viewsContainer.innerHTML = Mustache.render(html, json);
            offersContainers = document.querySelectorAll(".offer");
            offersContainers.forEach(offer=>{
                offer.addEventListener("click", showOffer);
                //show project est une fonction dans le script post-project qui est complémentaire aux scriptes feed et profil
            })
        })
    })
}