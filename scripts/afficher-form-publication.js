/**
 * Afficher le formulaire pour la publication de contenu
 *
 * @summary short description for the file
 * @author N.Prevel & William Caouette
 *
 * Created at     : 2021-04-25 19:36:04
 * Last modified  : 2021-05-12 10:17:48
 */

const btnPublication = document.querySelector("#js-btn-publier");
const formPublication = document.querySelector(".container-container");

/**
 * @summary place le formulaire en flex et créé l'évent listener pour le fermer
 */
btnPublication.addEventListener("click", (e) => {
  formPublication.style.display = "flex";
  
  document.querySelector("#js-btn-close-form").addEventListener("click", (e)=>{
    formPublication.style.display = "none"
  });
});
