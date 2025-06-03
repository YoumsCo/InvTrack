document.querySelector("#close").addEventListener("click", function () {
    this.closest("#alert").classList.add("hidden");
});