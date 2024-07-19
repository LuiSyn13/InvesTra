const export_project= document.getElementById("export-project")
const submenu_export = document.getElementById("submenu-export")

export_project.addEventListener('click', () => {
    if(submenu_export.classList.contains("options-export-off")) {
        submenu_export.classList.remove("options-export-off")
        submenu_export.classList.add("options-export-on")
    } else {
        submenu_export.classList.remove("options-export-on")
        submenu_export.classList.add("options-export-off")
    }
})

document.addEventListener('click', () => {
    if(!export_project.contains(event.target) && !submenu_export.contains(event.target)) {
        submenu_export.classList.remove("options-export-on")
        submenu_export.classList.add("options-export-off")
    }
})


document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-options-project a');
    const currentUrl = window.location.href;

    navLinks.forEach(link => {
        if (currentUrl.includes(link.getAttribute('href'))) {
            link.classList.add('selected');
        }
    });
});