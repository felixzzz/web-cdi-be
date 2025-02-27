window.onload = function () {
    document.documentElement.classList.remove("dark");
    localStorage.theme = "light";
}

function showLogout() {
    document.getElementById("show-logout").click()
}

function showPopupDelete(route) {
    const modal = document.getElementById("dialog-form-delete-popup")

    const form = modal.querySelector("form")
    form.setAttribute('action', route);
}
