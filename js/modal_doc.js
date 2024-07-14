const btnAbrirModal = document.querySelectorAll("#btn-abrir-modal");
const btnCerrarModal = document.querySelector("#btn-cerrar-modal");
const modal = document.querySelector("#modal");
const modalBackground = document.querySelector("#modal-background");
const modalNomproyecto = document.querySelector("#modal-nomproyecto");

btnAbrirModal.forEach(btn => {
    btn.addEventListener("click", (event) => {
        const nomproyecto = event.target.getAttribute("data-nomproyecto");
        modalNomproyecto.textContent = nomproyecto;
        modal.style.display = "block";
        modalBackground.style.display = "block";
    });
});

btnCerrarModal.addEventListener("click", () => {
    modal.style.display = "none";
    modalBackground.style.display = "none";
});

modalBackground.addEventListener("click", () => {
    modal.style.display = "none";
    modalBackground.style.display = "none";
});
