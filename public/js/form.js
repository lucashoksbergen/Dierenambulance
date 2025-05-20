window.addEventListener("load", function () {
    const form = this.document.querySelector("form");
    if (form) form.reset();
});

function toggleOtherField() {
    const radios = document.querySelectorAll('input[name="type"]');
    const otherInput = document.getElementById("otherkind");

    let selected = null;
    radios.forEach((radio) => {
        if (radio.checked) {
            selected = radio.value;
        }
    });

    if (selected === "other") {
        otherInput.disabled = false;
    } else {
        otherInput.disabled = true;
    }
}

window.addEventListener("DOMContentLoaded", toggleOtherField);
