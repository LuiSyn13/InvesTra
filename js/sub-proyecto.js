document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.content-form-alimentar a');

    navLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

            navLinks.forEach(nav => nav.querySelector('.content-form-opalimentar').classList.remove('selected'));
            this.querySelector('.content-form-opalimentar').classList.add('selected');

            const targetId = this.getAttribute('href').substring(1);
            console.log(`Navegando a: ${targetId}`);
        });
    });
});
