/**
 * Script de l'Api Mustache du Feed des projets + Animation du menu burger
 *
 * @summary
 * @author N.Prevel & W.Caouette
 *
 * Created at     : 2021-04-14 15:07:49
 * Last modified  : 2021-04-20 15:00:11
 */

/*-- Vérification --*/
console.log("le script est lié");

/*-- Récupération des contenus --*/
const viewsContainer = document.querySelector("#js-feed-project");

/*-- Fonction pour l'affichage --*/
fetchView("views/feed-project.html");

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

fetchDatas("../project-api.php");

function fetchDatas(dataPath) {
    fetch(dataPath)
        .then((response) => {
            return response.json();
        })
        .then((html) => {
            viewsContainer.innerHTML = html;
        });
}

/*-- Menu burger --*/

const boxes = document.querySelectorAll(".box");

window.addEventListener("scroll", checkBoxesAppear);

function checkBoxesAppear() {
    boxes.forEach((box) => {
        const boxTop = box.getBoundingClientRect().top;
        const boxBottom = box.getBoundingClientRect().bottom;

        const triggerPos = window.innerHeight - (boxBottom - boxTop) / 2;

        if (boxTop < triggerPos) {
            box.classList.add("show-box");
        } else {
            box.classList.remove("show-box");
        }
    });
}

checkBoxesAppear();

/*-- Menu  --*/

const btnBurger = document.querySelector(".fa-bars");
const btnCancel = document.querySelector(".btn-cancel");
const navigation = document.querySelector("nav");
const mainContent = document.querySelector(".main-content");

btnBurger.addEventListener("click", (evt) => {
    navigation.classList.add("nav-appear");
    navigation.style.display = "block";
});

btnCancel.addEventListener("click", (evt) => {
    navigation.classList.remove("nav-appear");
    navigation.style.display = "none";
});

btnBurger.addEventListener("click", (evt) => {
    if (evt.target.classList.contains("btn-burger")) {}
    navigation.classList.remove("nav-appear");
});