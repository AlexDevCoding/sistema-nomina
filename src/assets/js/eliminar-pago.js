// Variable para almacenar el ID del pago a eliminar
let pagoIdActual = null;
let clickHandlerAdded = false; // Variable para controlar si ya se añadió el manejador de clics

// Función para mostrar el modal de confirmación de eliminación
function mostrarModalEliminar(id) {
    // Guardamos el ID del pago para usarlo más tarde
    pagoIdActual = id;
    
    // Obtenemos el elemento del modal
    const modal = document.getElementById('popup-modal');
    
    // Mostramos el modal
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');

    // Agregar manejador de clics fuera del modal solo si no se ha agregado aún
    if (!clickHandlerAdded) {
        document.addEventListener('click', handleOutsideClick);
        clickHandlerAdded = true;
    }
}

// Manejador para clics fuera del modal
function handleOutsideClick(e) {
    const modal = document.getElementById('popup-modal');
    if (!modal) return; // Si no existe el modal, no hacer nada
    
    // Si el modal está oculto, eliminar el event listener
    if (modal.classList.contains('hidden')) {
        document.removeEventListener('click', handleOutsideClick);
        clickHandlerAdded = false;
        return;
    }
    
    const modalContent = modal.querySelector('.relative');
    
    // Si el modal está visible y se hace clic fuera del contenido del modal
    if (!modal.classList.contains('hidden') && modalContent && !modalContent.contains(e.target) && e.target !== modalContent) {
        // Verificar que no se haya hecho clic en un botón que abre el modal
        if (!e.target.classList.contains('eliminar') && !e.target.closest('.eliminar')) {
            cerrarModal();
        }
    }
}

// Función para cerrar el modal
function cerrarModal() {
    const modal = document.getElementById('popup-modal');
    if (!modal) return; // Validación para evitar errores
    
    modal.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
    
    // Reestablecer el botón de confirmación si existe
    const btnConfirmar = document.getElementById('btnConfirmarEliminar');
    if (btnConfirmar) {
        btnConfirmar.disabled = false;
        btnConfirmar.innerHTML = 'Si estoy seguro';
    }
    
    // Eliminar el event listener para clics fuera del modal
    document.removeEventListener('click', handleOutsideClick);
    clickHandlerAdded = false;
    
    // Limpiar cualquier backdrop residual que pueda quedar
    const backdrops = document.querySelectorAll('.bg-black.bg-opacity-50');
    backdrops.forEach(backdrop => {
        if (backdrop !== modal) {
            backdrop.remove();
        }
    });
}

// Configurar los manejadores de eventos cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', function() {
    // Botón para confirmar la eliminación
    const btnConfirmar = document.getElementById('btnConfirmarEliminar');
    if (btnConfirmar) {
        btnConfirmar.addEventListener('click', async function() {
            if (pagoIdActual) {
                try {
                    // Desactivamos el botón mientras se procesa
                    btnConfirmar.disabled = true;
                    btnConfirmar.innerHTML = 'Eliminando...';
                    
                    // Realizamos la petición para eliminar el pago
                    const response = await fetch(`../../Backend/tablas/actions/eliminar-pago.php?id=${pagoIdActual}`, {
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
                    btnConfirmar.disabled = false;
                    btnConfirmar.innerHTML = 'Si estoy seguro';
                    
                    // Cerramos el modal en caso de error
                    cerrarModal();
                }
            }
        });
    }
    
    // Botón para cancelar la eliminación
    const btnCancelar = document.getElementById('btnCancelarEliminar');
    if (btnCancelar) {
        btnCancelar.addEventListener('click', function(e) {
            e.preventDefault();
            cerrarModal();
        });
    }
    
    // Botones con atributo data-modal-hide="popup-modal"
    const botonesCloseModal = document.querySelectorAll('[data-modal-hide="popup-modal"]');
    botonesCloseModal.forEach(boton => {
        boton.addEventListener('click', function(e) {
            e.preventDefault();
            cerrarModal();
        });
    });
});