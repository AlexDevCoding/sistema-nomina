document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.getElementById('formulario-permiso');
    
    if (formulario) {
        formulario.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            try {
                const formData = new FormData(this);
                const response = await fetch('../../Backend/tablas/calculo-nomina.php', {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                // Cerrar el modal de registro
                const defaultModal = document.getElementById('defaultModal');
                if (defaultModal) {
                    defaultModal.classList.add('hidden');
                }

                if (data.status === 'success') {
                    // Mostrar modal de éxito
                    const modalExito = document.getElementById('popup-modal-success');
                    if (modalExito) {
                        modalExito.classList.remove('hidden');
                    }
                } else {
                    // Mostrar modal de advertencia
                    const modalWarning = document.getElementById('popup-modal-warning');
                    if (modalWarning) {
                        modalWarning.classList.remove('hidden');
                    }
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
                if (modalId === 'popup-modal-success') {
                    location.reload();
                }
            }
        });
    });
});