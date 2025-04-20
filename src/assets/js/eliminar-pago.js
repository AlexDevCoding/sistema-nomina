// Función para mostrar el modal de confirmación de eliminación
function mostrarModalEliminar(id) {
    // Obtenemos el elemento del modal
    const targetEl = document.getElementById('popup-modal');
    
    // Verificamos si flowbite está disponible
    if (window.flowbite && window.flowbite.Modal) {
        const modal = new window.flowbite.Modal(targetEl);
        // Mostramos el modal usando la API de Flowbite
        modal.show();
    } else {
        // Alternativa si flowbite no está disponible
        targetEl.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
        // Agregamos un backdrop
        const backdrop = document.createElement('div');
        backdrop.className = 'bg-gray-900 bg-opacity-50 fixed inset-0 z-40';
        document.body.appendChild(backdrop);
    }
    
    // Configuramos el botón de confirmar para que ejecute la eliminación
    const btnConfirmar = document.getElementById('btnConfirmarEliminar');
    if (btnConfirmar) {
        // Eliminamos listeners previos para evitar duplicados
        const nuevoBtn = btnConfirmar.cloneNode(true);
        btnConfirmar.parentNode.replaceChild(nuevoBtn, btnConfirmar);
        
        // Agregamos el nuevo listener
        nuevoBtn.addEventListener('click', async function() {
            try {
                // Desactivamos el botón mientras se procesa
                nuevoBtn.disabled = true;
                nuevoBtn.innerHTML = 'Eliminando...';
                
                // Realizamos la petición para eliminar el pago
                const response = await fetch(`../../Backend/tablas/actions/eliminar-pago.php?id=${id}`, {
                    method: 'GET'
                });
                
                const data = await response.json();
                
                if (response.ok && data.success) {
                    // Cerramos el modal
                    cerrarModal();
                    
                    // Recargamos la página para mostrar los cambios
                    setTimeout(() => {
                        location.reload();
                    }, 100);
                } else {
                    throw new Error(data.message || 'Error al eliminar el pago');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Hubo un error al eliminar el pago: ' + error.message);
                
                // Restauramos el botón
                nuevoBtn.disabled = false;
                nuevoBtn.innerHTML = 'Sí, eliminar';
                
                // Cerramos el modal en caso de error
                cerrarModal();
            }
        });
    }
    
    // Configuramos el botón de cancelar
    const btnCancelar = document.getElementById('btnCancelarEliminar');
    if (btnCancelar) {
        // Eliminamos listeners previos para evitar duplicados
        const nuevoCancelar = btnCancelar.cloneNode(true);
        btnCancelar.parentNode.replaceChild(nuevoCancelar, btnCancelar);
        
        // Agregamos el nuevo listener
        nuevoCancelar.addEventListener('click', cerrarModal);
    }
}

// Función para cerrar el modal (funciona con o sin flowbite)
function cerrarModal() {
    const targetEl = document.getElementById('popup-modal');
    
    if (window.flowbite && window.flowbite.Modal) {
        const modal = new window.flowbite.Modal(targetEl);
        modal.hide();
    } else {
        // Alternativa si flowbite no está disponible
        targetEl.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
    
    // Eliminar cualquier backdrop o elementos residuales
    document.querySelectorAll('.bg-gray-900, .bg-black').forEach(el => {
        el.remove();
    });
    
    // Restaurar el scroll
    document.body.style.overflow = '';
}

// Configuramos los botones para cerrar el modal
document.addEventListener('DOMContentLoaded', function() {
    // Botones para cancelar o cerrar el modal
    const botonesCloseModal = document.querySelectorAll('[data-modal-hide="popup-modal"]');
    botonesCloseModal.forEach(boton => {
        boton.addEventListener('click', cerrarModal);
    });
});