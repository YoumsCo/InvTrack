import Typed from 'typed.js';

document.querySelector("#eye").addEventListener("click", function () {
    const password = document.querySelector("#password");
    if (password.type === "password") {
        password.type = "text";
        this.classList.replace("fa-eye", "fa-eye-slash");
    }
    else {
        password.type = "password";
        this.classList.replace("fa-eye-slash", "fa-eye");
    }
});

const typed = new Typed('#text', {
    strings: ['Connectez-vous avec votre nom', 'Votre mot de passe', "...^500 Authentifiez-vous"],
    typeSpeed: 50,
});