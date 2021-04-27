/**
 * Afficher le formulaire pour la publication de contenu
 *
 * @summary short description for the file
 * @author N.Prevel & William Caouette
 * 
 * Created at     : 2021-04-25 19:36:04
 * Last modified  : 2021-04-27 09:48:09
 */


const btnPublication = document.querySelector("#js-btn-publier");
const formPublication = document.querySelector("#form-publication box");

/**
 *si le formulais est display block il le met en none et vis versa
 */
btnPublication.addEventListener("click", (e)=>{
    
    formPublication.style.display == "block" ? formPublication.style.display = "none" : formPublication.style.display = "block";

});