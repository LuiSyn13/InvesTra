document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('.nav_options a');
    const currentUrl = window.location.href;

    navLinks.forEach(link => {
        if (currentUrl.includes(link.getAttribute('href'))) {
            link.classList.add('selected');
        }
    });
})