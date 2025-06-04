import Typed from 'typed.js';

document.querySelector("#eye").addEventListener("click", function () {
    const password = document.querySelector("#password");
    if(password.type === "password") {
        password.type = "text";
        this.classList.replace("fa-eye", "fa-eye-slash");
    }
    else {
        password.type = "password";
        this.classList.replace("fa-eye-slash", "fa-eye");
    }
});

const typed = new Typed('#text', {
    strings: ['Entrez votre matricule', 'Votre mot de passe', "Confirmez-le", "^500 Changez votre mot de passe"],
    typeSpeed: 50,
});