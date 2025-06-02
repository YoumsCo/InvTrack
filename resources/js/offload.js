const stepsContainer = document.querySelector("#steps-container");

const firstStep = document.querySelector("#first-step");
const firstStepNextButton = document.querySelector("#first-step-next-button");
const firstStepSelect = document.querySelector("#first-step-select");

const secondStep = document.querySelector("#second-step");
const secondStepBackButton = document.querySelector("#second-step-back-button");


const thirdStep = document.querySelector("#third-step");
const thirdStepBackButton = document.querySelector("#third-step-back-button");

const fourthStep = document.querySelector("#fourth-step");
const fourthStepSteps = document.querySelector("#fourth-step-steps");
const fourthStepNext = document.querySelector("#fourth-step-next");
const fourthStepStepOne = document.querySelector("#fourth-step-step-one");
const fourthStepStepTwo = document.querySelector("#fourth-step-step-two");
const fourthStepBackButtonOne = document.querySelector("#fourth-step-back-button-one");
const fourthStepBackButtonTwo = document.querySelector("#fourth-step-back-button-two");

const handleSession = (toggle = true) => {
    if (toggle) {
        setTimeout(() => {
            sessionStorage.setItem("step-scroll", stepsContainer.scrollLeft);
            sessionStorage.setItem("step-selectedIndex", firstStepSelect.selectedIndex);
        }, 1000);

        return;
    }

    setTimeout(() => {
        sessionStorage.removeItem("step-scroll", stepsContainer.scrollLeft);
        sessionStorage.removeItem("step-selectedIndex", firstStepSelect.selectedIndex);
    }, 1000);
}

const handleSelectedIndex = () => {
    if (firstStepSelect.selectedIndex == 0) {
        stepsContainer.scrollTo({
            top: 0,
            left: stepsContainer.clientWidth + stepsContainer.scrollLeft,
            behavior: "smooth"
        });
    }
    else if (firstStepSelect.selectedIndex == 1) {
        stepsContainer.scrollTo({
            top: 0,
            left: (stepsContainer.clientWidth * 2) + stepsContainer.scrollLeft,
            behavior: "smooth"
        });
    }
    else if (firstStepSelect.selectedIndex == 2) {
        stepsContainer.scrollTo({
            top: 0,
            left: (stepsContainer.clientWidth * 3) + stepsContainer.scrollLeft,
            behavior: "smooth"
        });
    }

    handleSession();
}

window.addEventListener("load", function () {
    if (sessionStorage.getItem("step-scroll") && !isNaN(sessionStorage.getItem("step-scroll")) && sessionStorage.getItem("step-selectedIndex")) {
        firstStepSelect.selectedIndex = sessionStorage.getItem("step-selectedIndex");
        setTimeout(() => {
            stepsContainer.scrollTo({
                top: 0,
                left: sessionStorage.getItem("step-scroll"),
                behavior: "smooth"
            });
        }, 1000);
    }
});

window.addEventListener("resize", function () {
    if (sessionStorage.getItem("step-scroll") && !isNaN(sessionStorage.getItem("step-scroll"))) {
        setTimeout(() => {
            stepsContainer.scrollTo({
                top: 0,
                left: sessionStorage.getItem("step-scroll"),
                behavior: "smooth"
            });
        }, 1000);
    }
});

secondStepBackButton.addEventListener("click", function () {
    stepsContainer.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    });
    handleSession(false);
});

thirdStepBackButton.addEventListener("click", function () {
    stepsContainer.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    });
    handleSession(false);
});

fourthStepBackButtonOne.addEventListener("click", function () {
    stepsContainer.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    });
    handleSession(false);
});

fourthStepBackButtonTwo.addEventListener("click", function () {
    fourthStepSteps.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    });
});

fourthStepNext.addEventListener("click", function () {
    fourthStepSteps.scrollTo({
        top: 0,
        left: fourthStepSteps.scrollLeft + fourthStepSteps.clientWidth,
        behavior: "smooth"
    });
});

firstStepNextButton.addEventListener("click", function () {
    handleSelectedIndex();
});

firstStepSelect.addEventListener("change", function () {
    handleSelectedIndex();
});