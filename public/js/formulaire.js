// const inputs = document.querySelectorAll(".contact-input");
// const toggleBtn = document.querySelector(".theme-toggle");
// const allElements = document.querySelectorAll("*");
//
// toggleBtn.addEventListener("click", () => {
//     document.body.classList.toggle("dark");
//
//     allElements.forEach((el) => {
//         el.classList.add("transition");
//         setTimeout(() => {
//             el.classList.remove("transition");
//         }, 1000);
//     });
// });
//
// inputs.forEach((ipt) => {
//     ipt.addEventListener("focus", () => {
//         ipt.parentNode.classList.add("focus");
//         ipt.parentNode.classList.add("not-empty");
//     });
//     ipt.addEventListener("blur", () => {
//         if (ipt.value == "") {
//             ipt.parentNode.classList.remove("not-empty");
//         }
//         ipt.parentNode.classList.remove("focus");
//     });
// });
// Sélectionner tous les inputs de type color
document.querySelectorAll('input[type="color"]').forEach((colorInput) => {
    // Écouteur d'événement pour le changement de couleur
    colorInput.addEventListener('input', (event) => {
        // Mettre à jour la valeur de l'input pour refléter la couleur choisie
        colorInput.value = event.target.value;
    });
});
