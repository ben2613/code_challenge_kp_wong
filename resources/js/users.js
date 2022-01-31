var confirmDeleteModal = document.getElementById('confirmDeleteModal')
var confirmDeleteModalInst = bootstrap.Modal.getOrCreateInstance(confirmDeleteModal)
var returnModal = document.getElementById('returnModal')
var returnModalInst = bootstrap.Modal.getOrCreateInstance(returnModal)
confirmDeleteModal.addEventListener('show.bs.modal', function(e) {
    var button = e.relatedTarget
    var username = button.dataset.username
    confirmDeleteModal.querySelector('.modal-username').textContent = username
    this.dataset.username = username
    this.dataset.href = button.dataset.href
})
window.usersConfirmDelete = function() {
    confirmDeleteModalInst.hide()
    axios.delete(confirmDeleteModal.dataset.href).then((res) => {
        returnModal.querySelector('.return-message').textContent = res.data.message
        returnModalInst.show()
    })
}
returnModal.addEventListener('hide.bs.modal', function(e) {
    location.reload()
})
