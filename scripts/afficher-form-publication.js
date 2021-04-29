/**
 * Afficher le formulaire pour la publication de contenu
 *
 * @summary short description for the file
 * @author N.Prevel & William Caouette
 *
 * Created at     : 2021-04-25 19:36:04
 * Last modified  : 2021-04-29 16:50:02
 */

const btnPublication = document.querySelector("#js-btn-publier");
const formPublication = document.querySelector(".form-publication");

/**
 * @summary si le formulaire est en display "block", il le met en "none" et vice-versa
 */
btnPublication.addEventListener("click", (e) => {
  formPublication.style.display == "flex"? formPublication.style.display = "none" : formPublication.style.display = "flex";
});
