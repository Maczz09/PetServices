// Función para rellenar el modal de edición con datos del producto seleccionado
function fillEditModal(data) {
    document.querySelector('#edit-id').value = data.id_producto;
    document.querySelector('#edit-nombre').value = data.nombre_producto;
    document.querySelector('#edit-descripcion').value = data.descripcion;
    document.querySelector('#edit-precio').value = data.precio;
    document.querySelector('#edit-descuento').value = data.descuento;
    document.querySelector('#edit-categoria').value = data.id_categoria;
    document.querySelector('#edit-activo').checked = data.activo == 1;
}

// Función para filtrar productos en la tabla con base en la búsqueda del usuario
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('buscar');
    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');

        rows.forEach(function(row) {
            const productName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            row.style.display = productName.includes(query) ? '' : 'none';
        });
    });
});
