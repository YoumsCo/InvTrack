import Typed from 'typed.js';

const typed = new Typed('#text', {
    strings: ['Entrez son nom', 'Son prénom', "Sa date de naissance", "^500 Modifiez-le"],
    typeSpeed: 50,
});

const step = document.querySelector("#step");

document.querySelector("#back").addEventListener("click", function () {
    step.scrollTo({
        left: step.scrollLeft - step.clientWidth,
        behavior: "smooth"
    });
});
document.querySelector("#back-to-first").addEventListener("click", function () {
    step.scrollTo({
        left: 0,
        behavior: "smooth"
    });
});
document.querySelector("#next").addEventListener("click", function () {
    step.scrollTo({
        left: step.scrollLeft + step.clientWidth,
        behavior: "smooth"
    });
});
document.querySelector("#next-to-second").addEventListener("click", function () {
    step.scrollTo({
        left: step.scrollLeft + step.clientWidth,
        behavior: "smooth"
    });
});