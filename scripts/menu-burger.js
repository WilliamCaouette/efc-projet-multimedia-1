/**
 * Menu Burger
 * @author N.Prevel
 *
 * Created at     : 2021-04-25 19:32:12
 * Last modified  : 2021-05-13 14:35:45
 */

const btnBurger = document.querySelector(".fa-bars");
const btnCancel = document.querySelector(".btn-cancel");
const navigation = document.querySelector("nav");

btnBurger.addEventListener("click", (evt) => {
  navigation.classList.add("nav-appear");
  navigation.style.display = "block";
});

btnCancel.addEventListener("click", (evt) => {
  navigation.classList.remove("nav-appear");
  navigation.style.display = "none";
});
