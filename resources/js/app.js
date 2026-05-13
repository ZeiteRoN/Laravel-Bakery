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

window.addToCart = function(productId) {
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: 1
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Show success message
            showNotification('Product added to cart!', 'success');
            // Update cart counter if it exists
            updateCartCounter();
        } else {
            showNotification('Failed to add product to cart', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('An error occurred', 'error');
    });
}

window.updateCartCounter = function() {
    fetch('/cart/counter')
        .then(response => response.json())
        .then(data => {
            const counter = document.getElementById('cart-counter');
            if (counter && data.count > 0) {
                counter.textContent = data.count;
                counter.classList.remove('hidden');
            } else if (counter) {
                counter.classList.add('hidden');
            }
        })
        .catch(error => console.error('Error:', error));
}

window.showNotification = function(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 p-4 rounded-lg text-white z-50 ${
        type === 'success' ? 'bg-green-500' : 
        type === 'error' ? 'bg-red-500' : 'bg-blue-500'
    }`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.remove();
    }, 3000);
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

// Initialize cart counter on page load
document.addEventListener('DOMContentLoaded', function() {
    updateCartCounter();
});

window.Alpine = Alpine;

Alpine.start();
