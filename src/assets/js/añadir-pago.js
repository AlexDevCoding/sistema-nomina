document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.getElementById('formulario-registro');
    
    if (formulario) {
        formulario.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            try {
                const formData = new FormData(this);
                const response = await fetch('../../Backend/tablas/registrar-cesta-tickets.php', {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                // Primero verificamos la respuesta antes de cerrar el modal
                if (data.success) {
                    // Cerrar el modal de registro
                    const defaultModal = document.getElementById('defaultModal');
                    if (defaultModal) {
                        defaultModal.classList.add('hidden');
                    }

                    // Mostrar modal de éxito
                    const modalExito = document.getElementById('popup-modal-success');
                    if (modalExito) {
                        modalExito.classList.remove('hidden');
                        // Recargar la página después de 2 segundos
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    }
                } else {
                    // Mostrar modal de advertencia con el mensaje específico
                    const modalWarning = document.getElementById('popup-modal-warning');
                    if (modalWarning) {
                        // Actualizar el mensaje de advertencia
                        const mensajeWarning = modalWarning.querySelector('.text-gray-500');
                        if (mensajeWarning) {
                            mensajeWarning.textContent = data.message;
                        }
                        modalWarning.classList.remove('hidden');
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                // Mostrar modal de error
                const modalWarning = document.getElementById('popup-modal-warning');
                if (modalWarning) {
                    const mensajeWarning = modalWarning.querySelector('.text-gray-500');
                    if (mensajeWarning) {
                        mensajeWarning.textContent = 'Error al procesar la solicitud';
                    }
                    modalWarning.classList.remove('hidden');
                }
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
            }
        });
    });
});