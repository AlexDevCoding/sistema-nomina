document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.getElementById('formulario-registro');
    
    // Inicializar los modales de Flowbite
    const modals = ['añadir-empleado', 'empleado-existente'];
    modals.forEach(modalId => {
        const modal = document.getElementById(modalId);
        if (modal) {
            // Agregar atributos necesarios para Flowbite
            const targetButtons = document.querySelectorAll(`[data-modal-hide="${modalId}"]`);
            targetButtons.forEach(button => {
                button.setAttribute('data-modal-target', modalId);
                button.setAttribute('data-modal-toggle', modalId);
            });
        }
    });
    
    if (formulario) {
        formulario.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            try {
                const formData = new FormData(this);
                const response = await fetch('../../Backend/añadir-empleado.php', {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                // Cerrar el modal de registro
                const defaultModal = document.getElementById('defaultModal');
                if (defaultModal) {
                    defaultModal.classList.add('hidden');
                    // Eliminar el backdrop al cerrar el modal
                    document.querySelectorAll('.bg-gray-900').forEach(el => el.remove());
                }

                if (data.success) {
                    // Mostrar modal de éxito
                    const modalExito = document.getElementById('añadir-empleado');
                    if (modalExito) {
                        modalExito.classList.remove('hidden');
                    }
                } else if (data.error_type === 'duplicate') {
                    // Mostrar modal de empleado existente
                    const modalWarning = document.getElementById('empleado-existente');
                    if (modalWarning) {
                        modalWarning.classList.remove('hidden');
                    }
                } else {
                    // Mostrar mensaje de error general
                    alert('Error: ' + data.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error al procesar la solicitud. Por favor, intente nuevamente.');
            }
        });
    }

    // Manejadores para cerrar modales
    document.querySelectorAll('[data-modal-hide]').forEach(button => {
        button.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal-hide');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                // Eliminar cualquier backdrop que pueda haber quedado
                document.querySelectorAll('.bg-gray-900').forEach(el => el.remove());
                
                // Recargar la página al cerrar cualquiera de los modales de respuesta
                if (modalId === 'añadir-empleado' || modalId === 'empleado-existente') {
                    location.reload();
                }
            }
        });
    });
    
    // Gestionar el cierre de modal con ESC o clic fuera del modal
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            cerrarTodosLosModales();
        }
    });
    
    // Función para cerrar todos los modales y limpiar backdrops
    function cerrarTodosLosModales() {
        const modales = ['defaultModal', 'añadir-empleado', 'empleado-existente'];
        modales.forEach(id => {
            const modal = document.getElementById(id);
            if (modal) {
                modal.classList.add('hidden');
            }
        });
        // Eliminar todos los backdrops
        document.querySelectorAll('.bg-gray-900').forEach(el => el.remove());
        
        // Recargar la página cuando se cierran los modales
        location.reload();
    }
    
    // Detectar clics fuera de los modales
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('bg-gray-900') || 
            (e.target.classList.contains('bg-black') && e.target.classList.contains('bg-opacity-50'))) {
            cerrarTodosLosModales();
        }
    });
    
    // Agregar evento específico para el botón de cerrar en el modal de empleado existente
    const btnCerrarExistente = document.getElementById('btnCerrarExistente');
    if (btnCerrarExistente) {
        btnCerrarExistente.addEventListener('click', function() {
            document.getElementById('empleado-existente').classList.add('hidden');
            // Eliminar backdrops
            document.querySelectorAll('.bg-gray-900').forEach(el => el.remove());
            // Recargar la página
            location.reload();
        });
    }
});