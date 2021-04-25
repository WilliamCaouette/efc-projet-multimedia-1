/**
 * Menu Burger
 * @author N.Prevel
 *
 * Created at     : 2021-04-25 19:32:12
 * Last modified  : 2021-04-25 19:45:23
 */

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