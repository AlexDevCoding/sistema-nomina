document.getElementById('cedula_identidad').addEventListener('input', function() {
    const cedula = this.value.trim();
    const nombreInput = document.getElementById('name');
    
    if (cedula.length > 0) {
        fetch(`../../Backend/tablas/busca-empleado.php?cedula=${cedula}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
                return response.json();
            })
            .then(data => {
                if (data && data.nombre_completo) {
                    nombreInput.value = data.nombre_completo;
                    nombreInput.disabled = true;
                } else {
                    nombreInput.value = '';
                    nombreInput.disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                nombreInput.value = '';
                nombreInput.disabled = false;
            });
    } else {
        nombreInput.value = '';
        nombreInput.disabled = false;
    }
});
