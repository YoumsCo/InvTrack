const filterContainer = document.querySelector("#filterContainer");
const right = document.querySelector("#filter-right");
const left = document.querySelector("#filter-left");

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