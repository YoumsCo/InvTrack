const filterContainer = document.querySelector("#filterContainer");
const right = document.querySelector("#filter-right");
const left = document.querySelector("#filter-left");
const top = document.querySelector("#top");
const container = document.querySelector("#container");

left.addEventListener("click", function () {
    filterContainer.scrollTo({
        left: filterContainer.scrollLeft - Math.floor(filterContainer.clientWidth / 2),
        top: 0,
        behavior: "smooth"
    });
});

right.addEventListener("click", function () {
    filterContainer.scrollTo({
        left: filterContainer.scrollLeft + Math.floor(filterContainer.clientWidth / 2),
        top: 0,
        behavior: "smooth"
    });
});

top.addEventListener("click", function () {
    container.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    });
});

const checkScroll = () => {
    if (container.scrollTop > container.clientHeight) {
        top.classList.replace("hidden", "fixed");
    }
    else {
        top.classList.replace("fixed", "hidden");
    }
}

container.addEventListener("scroll", function () {
    checkScroll();
    sessionStorage.setItem("scroll", this.scrollTop);
});

window.addEventListener("load", function () {
    checkScroll();

    if (sessionStorage.getItem("scroll")) {
        setTimeout(() => {
            container.scrollTo({
                left: 0,
                top: sessionStorage.getItem("scroll"),
                behavior: "smooth"
            });
        }, 1000);
    }
});