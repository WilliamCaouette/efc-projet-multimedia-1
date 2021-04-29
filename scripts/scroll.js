/**
 * Scroll à partir d'un bouton dans la page
 *
 * @author N.Prevel
 *
 * Created at     : 2021-04-25 19:47:46
 * Last modified  : 2021-04-29 09:00:41
 */

const nav = document.querySelector("nav");
const btnScroll = document.querySelector("#js-btn-scroll");

btnScroll.addEventListener("click", function () {
  console.log("scroll");
  let offsetPosition = elementPosition + window.pageYOffset;
  window.scrollTo({
    top: offsetPosition,
    behavior: "smooth",
  });
});
