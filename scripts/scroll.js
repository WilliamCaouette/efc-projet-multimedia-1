/**
 * Scroll
 *
 * @summary short description for the file
 * @author N.Prevel
 *
 * Created at     : 2021-04-25 19:47:46
 * Last modified  : 2021-04-29 08:32:22
 */

// Le nav se situe dans le header.php

const navigation = document.querySelector("nav");
const btnScroll = document.querySelector("#js-btn-scroll");

// remplacer windows par le bouton, pour que le clic force la page à remonter

btnScroll.addEventListener("scroll", function () {
  navigation.classList.toggle("sticky", window.scrollY > 0);
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});
