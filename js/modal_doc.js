/* MODAL REVISION*/

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

/* MODAL ELIMINACION */

const btnAbrirModal2 = document.querySelectorAll("#btn-abrir-modal2");
const btnCerrarModal2 = document.querySelector("#btn-cerrar-modal2");
const modal2 = document.querySelector("#modal2");
const modalBackground2 = document.querySelector("#modal-background2");
const modalNomproyecto2 = document.querySelector("#modal-nomproyecto2");

btnAbrirModal2.forEach(btn => {
    btn.addEventListener("click", (event) => {
        const iptPro = document.getElementById("idproject2");
        const nomproyecto2 = event.target.getAttribute("data-nomproyecto2");
        const idproyecto2 = event.target.getAttribute("data-idproyecto2");
        console.log(idproyecto2);
        modalNomproyecto2.textContent = nomproyecto2;
        iptPro.value = idproyecto2;
        modal2.style.display = "block";
        modalBackground2.style.display = "block";

    });
});

btnCerrarModal2.addEventListener("click", () => {
    modal2.style.display = "none";
    modalBackground2.style.display = "none";
});

modalBackground2.addEventListener("click", () => {
    modal2.style.display = "none";
    modalBackground2.style.display = "none";
});
