document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('acceptButton').addEventListener('click', function () {
        showModal();
    });
});

function showModal() {
    var modal = document.getElementById("confirmationModal");
    modal.style.display = "block";

    setTimeout(function () {
        modal.style.display = "none";
        document.getElementById("dataForm").submit();
    }, 500);
}