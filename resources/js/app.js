import './bootstrap';

import Alpine from 'alpinejs';

window.editProductModal = function(id, name, price, weight, height, stock) {
    const modal = document.getElementById('editModal');

    if (!modal) {
        return;
    }

    modal.classList.remove('hidden');

    document.getElementById('editName').value = name;
    document.getElementById('editPrice').value = price;
    document.getElementById('editWeight').value = weight;
    document.getElementById('editHeight').value = height;
    document.getElementById('editStock').value = stock;
    document.getElementById('editForm').action = '/product/' + id;
}

window.deleteProductModal = function(id) {
    const modal = document.getElementById('deleteModal');

    if (!modal) {
        return;
    }

    modal.classList.remove('hidden');
    document.getElementById('deleteForm').action = '/product/' + id;
}

window.closeModal = function(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.add('hidden');
    }
}

window.onclick = function(event) {
    if (event.target.id === 'editModal' || event.target.id === 'deleteModal') {
        event.target.classList.add('hidden');
    }
}

document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const editModal = document.getElementById('editModal');
        const deleteModal = document.getElementById('deleteModal');

        if (editModal && !editModal.classList.contains('hidden')) {
            editModal.classList.add('hidden');
        }
        if (deleteModal && !deleteModal.classList.contains('hidden')) {
            deleteModal.classList.add('hidden');
        }
    }
});

window.Alpine = Alpine;

Alpine.start();
