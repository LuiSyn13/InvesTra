const btnAbrirModal = document.querySelectorAll("#btn-abrir-modal");
const btnCerrarModal = document.querySelector("#btn-cerrar-modal");
const modal = document.querySelector("#modal");
const modalBackground = document.querySelector("#modal-background");
const modalNomproyecto = document.querySelector("#modal-nomproyecto");

btnAbrirModal.forEach(btn => {
    btn.addEventListener("click", (event) => {
        const iptPro = document.getElementById("idproject");
        const iptRev = document.getElementById("idrevision");
        const nomproyecto = event.target.getAttribute("data-nomproyecto");
        const idproyecto = event.target.getAttribute("data-idproyecto");
        const idrevision = event.target.getAttribute("data-idrevision");
        console.log(idproyecto);
        modalNomproyecto.textContent = nomproyecto;
        iptPro.value = idproyecto;
        iptRev.value = idrevision;
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
