const closeSide = document.querySelector("#close-side");
const openSide = document.querySelector("#open-side");

const toggleSide = (show = false, load = false) => {
    if (!show) {
        const side = document.querySelector("#side-container");
        const sideLogo = document.querySelector("#side-logo");
        const sideLinkText = document.querySelectorAll(".side-link-text");
        const sideFooterText = document.querySelector("#side-footer-text");

        side.classList.replace("w-50", "w-14");
        sideLogo.classList.add("hidden");
        closeSide.classList.add("hidden");
        sideLinkText.forEach(child => {
            child.classList.add("hidden");
        });
        sideFooterText.classList.replace("flex", "hidden");
        openSide.classList.remove("hidden");

        if (!load) {
            document.cookie = `toggle-side=hide; epxires=${new Date(2026, 12, 31)}; path=/; sameSite=strict`;
        }
        return;
    }
    const side = document.querySelector("#side-container");
    const sideLogo = document.querySelector("#side-logo");
    const sideLinkText = document.querySelectorAll(".side-link-text");
    const sideFooterText = document.querySelector("#side-footer-text");

    side.classList.replace("w-14", "w-50");
    sideLogo.classList.remove("hidden");
    closeSide.classList.remove("hidden");
    sideLinkText.forEach(child => {
        child.classList.remove("hidden");
    });
    sideFooterText.classList.replace("hidden", "flex");
    openSide.classList.add("hidden");

    if (!load) {
        document.cookie = `toggle-side=show; epxires=${new Date(2026, 12, 31)}; path=/; sameSite=strict`;
    }
}

closeSide.addEventListener("click", function () {
    toggleSide();
});

openSide.addEventListener("click", function () {
    toggleSide(true);
});

window.addEventListener("load", function () {
    if (document.cookie) {
        const cookies = document.cookie.split(";");
        for (let i = 0; i < cookies.length; i++) {
            const [cookieName, cookieValue] = cookies[i].split("=");
            if (cookieName.trim() === "toggle-side" && cookieValue.trim() === "show") {
                setTimeout(() => {
                    toggleSide(true, true);
                }, 1500);
            }
            else if (cookieName.trim() === "toggle-side" && cookieValue.trim() === "hide") {
                setTimeout(() => {
                    toggleSide(false, true);
                }, 1500);
            }
        }
    }
});