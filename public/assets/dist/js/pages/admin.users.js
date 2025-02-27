function showPopupEdit(route, row) {
    const modal = document.getElementById("dialog-form-edit-popup")

    const form = modal.querySelector("form")
    form.setAttribute('action', route);

    form.querySelector('[name="name"]').value = row.name;
    form.querySelector('[name="email"]').value = row.email;
    let roleSelect = form.querySelector('[name="role_id"]');
    let statusSelect = form.querySelector('[name="status"]');

    roleSelect.value = row.role_id;
    roleSelect.dispatchEvent(new Event('change'));

    statusSelect.value = row.status;
    statusSelect.dispatchEvent(new Event('change'));
}
