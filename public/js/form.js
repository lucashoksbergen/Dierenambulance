window.addEventListener("load", function () {
    const form = this.document.querySelector("form");
    if (form) form.reset();
});

const kindSelect = document.getElementById("kind");
const otherAnimalInput = document.getElementById("otherkind");
const otherAnimalText = document.getElementById("otherlabel");
const otherAnimalSpan = document.getElementById("animalspan");

kindSelect.addEventListener("change", function () {
    if (kindSelect.value === "Other") {
        otherAnimalInput.disabled = false;
        otherAnimalInput.required = true;
        otherAnimalText.style.color = "black";
        otherAnimalSpan.innerHTML = "*";
    } else {
        otherAnimalInput.disabled = true;
        otherAnimalInput.required = false;
        otherAnimalInput.value = "";
        otherAnimalText.style.color = "gray";
        otherAnimalSpan.innerHTML = "";
    }
});
