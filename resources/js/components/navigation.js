const linksContiner = document.querySelector("#linksContainer");
const left = document.querySelector("#left");
const right = document.querySelector("#right");

left.addEventListener("click", function () {
    linksContiner.scrollTo({
        left: linksContiner.scrollLeft - Math.floor(linksContiner.clientWidth / 2),
        top: 0,
        behavior: "smooth"
    });
});

right.addEventListener("click", function () {
    linksContiner.scrollTo({
        left: linksContiner.scrollLeft + Math.floor(linksContiner.clientWidth / 2),
        top: 0,
        behavior: "smooth"
    });
});