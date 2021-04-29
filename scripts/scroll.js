/**
 * Scroll à partir d'un bouton dans la page
 *
 * @author N.Prevel
 *
 * Created at     : 2021-04-25 19:47:46
 * Last modified  : 2021-04-29 09:06:25
 */

const btnScroll = document.querySelector("#js-btn-scroll");

btnScroll.addEventListener("click", scroll);

function scroll() {
  console.log("scroll");
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}
