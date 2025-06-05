import Typed from 'typed.js';

const typed = new Typed('#text', {
    strings: ["Entrez son matricule,", 'Entrez son nom,', 'Son téléphone,', "...^500 Modifier-le"],
    typeSpeed: 50,
});

const step = document.querySelector("#step");

document.querySelector("#back").addEventListener("click", function () {
    step.scrollTo({
        left: step.scrollLeft - step.clientWidth,
        behavior: "smooth"
    });
});
document.querySelector("#next").addEventListener("click", function () {
    step.scrollTo({
        left: step.scrollLeft + step.clientWidth,
        behavior: "smooth"
    });
});