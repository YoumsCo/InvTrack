const closeSide = document.querySelector("#close-side");
const openSide = document.querySelector("#open-side");

const toggleSide = (show = false, load = false) => {
    const side = document.querySelector("#side-container");
    const sideLogo = document.querySelector("#side-logo");
    const sideLinkText = document.querySelectorAll(".side-link-text");
    const sideFooterText = document.querySelector("#side-footer-text");
    const dispear = document.querySelectorAll(".disapear");

    if (!show) {

        side.classList.replace("w-50", "w-14");
        sideLogo.classList.add("hidden");
        closeSide.classList.add("hidden");
        sideLinkText.forEach(child => {
            child.classList.add("hidden");
        });
        sideFooterText.classList.replace("flex", "hidden");
        openSide.classList.remove("hidden");
        dispear.forEach(child => {
            child.classList.add("hidden");
        });

        if (!load) {
            document.cookie = `toggle-side=hide; epxires=${new Date(2026, 12, 31)}; path=/; sameSite=strict`;
        }
        return;
    }

    side.classList.replace("w-14", "w-50");
    sideLogo.classList.remove("hidden");
    closeSide.classList.remove("hidden");
    sideLinkText.forEach(child => {
        child.classList.remove("hidden");
    });
    sideFooterText.classList.replace("hidden", "flex");
    openSide.classList.add("hidden");
    dispear.forEach(child => {
        child.classList.remove("hidden");
    });

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

const handleTheme = (e) => {
    if (e.currentTarget.querySelector(".fa-solid").classList.contains("fa-moon")) {
        e.currentTarget.querySelector(".fa-solid").classList.replace("fa-moon", "fa-sun");
        e.currentTarget.querySelector("span").innerHTML = "Clair";
        document.querySelector("html").classList.remove("dark");
        document.cookie = `theme=clair; expires=${new Date(2026, 12, 31)}; path=/; sameSite=strict`;
    }
    else {
        e.currentTarget.querySelector(".fa-solid").classList.replace("fa-sun", "fa-moon");
        e.currentTarget.querySelector("span").innerHTML = "Sombre";
        document.querySelector("html").classList.add("dark");
        document.cookie = `theme=sombre; expires=${new Date(2026, 12, 31)}; path=/; sameSite=strict`;
    }
}

window.addEventListener("load", function () {
    const cookies = document.cookie.split(";");
    for (let i = 0; i < cookies.length; i++) {
        const [cookieName, cookieValue] = cookies[i].split("=");
        if (cookieName.trim() === "theme" && cookieValue.trim() === "sombre") {
            document.querySelector("#theme").querySelector(".fa-solid").classList.replace("fa-sun", "fa-moon");
            document.querySelector("#theme").querySelector("span").innerHTML = "Sombre";
            document.querySelector("html").classList.add("dark");
        }
        else if (cookieName.trim() === "theme" && cookieValue.trim() === "clair") {
            document.querySelector("#theme").querySelector(".fa-solid").classList.replace("fa-moon", "fa-sun");
            document.querySelector("#theme").querySelector("span").innerHTML = "Clair";
            document.querySelector("html").classList.remove("dark");
        }
    }
});

document.querySelector("#theme").addEventListener("click", function (e) {
    handleTheme(e);
});