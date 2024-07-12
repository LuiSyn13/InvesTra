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

document.addEventListener('DOMContentLoaded', (event) => {
    var modal = document.getElementById("myModal2");

    var img = document.getElementById("ayudaImg2");
    img.onclick = function () {
        if (modal.style.display === "none" || modal.style.display === "") {
            modal.style.display = "block";
        } else {
            modal.style.display = "none";
        }
    }

    modal.onclick = function () {
        modal.style.display = "none";
    }
});

document.addEventListener('DOMContentLoaded', (event) => {
    var modal = document.getElementById("myModal3");

    var img = document.getElementById("ayudaImg3");
    img.onclick = function () {
        if (modal.style.display === "none" || modal.style.display === "") {
            modal.style.display = "block";
        } else {
            modal.style.display = "none";
        }
    }

    modal.onclick = function () {
        modal.style.display = "none";
    }
});

function cancelar() {
    var key = event.keyCode;

    if (key === 13) {
        event.preventDefault();
    }
}