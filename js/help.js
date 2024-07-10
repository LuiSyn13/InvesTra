document.addEventListener('DOMContentLoaded', (event) => {
    // Obtén el modal
    var modal = document.getElementById("myModal");

    // Obtén la imagen y asigna el evento de clic
    var img = document.getElementById("ayudaImg");
    img.onclick = function () {
        if (modal.style.display === "none" || modal.style.display === "") {
            modal.style.display = "block";
        } else {
            modal.style.display = "none";
        }
    }

    // Cierra el modal cuando se hace clic en el contenido del modal
    modal.onclick = function () {
        modal.style.display = "none";
    }

    
});