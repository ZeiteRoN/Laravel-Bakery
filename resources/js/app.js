import './bootstrap';

import Alpine from 'alpinejs';

window.editProductModal = function(id, name, price, weight, height, stock) {
    const modal = document.getElementById('editModal');

    if (!modal) {
        console.error('Modal not found');
        return;
    }

    modal.style.display = 'block';

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
        console.error('Modal not found');
        return;
    }

    modal.style.display = 'block';
    document.getElementById('deleteForm').action = '/product/' + id;
}

window.Alpine = Alpine;

Alpine.start();
