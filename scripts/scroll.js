/**
 * Scroll à partir d'un bouton dans la page
 *
 * @author N.Prevel
 *
 * Created at     : 2021-04-25 19:47:46
 * Last modified  : 2021-04-29 08:47:36
 */

const nav = document.querySelector("nav");
const btnScroll = document.querySelector("#js-btn-scroll");

btnScroll.addEventListener("scroll", function () {
  nav.classList.toggle("sticky", window.scrollY > 0);
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});
