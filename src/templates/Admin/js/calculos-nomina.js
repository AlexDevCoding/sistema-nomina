// Función para calcular la nómina
function calcularNomina() {
    // Obtener valores de los campos
    const salarioBase = parseFloat(document.getElementById("salario_base").value) || 0;
    const faltas = parseInt(document.getElementById("faltas").value) || 0;

    // Realizar cálculos
    const descuentoFaltas = salarioBase * 0.05 * faltas;
    const cestaTickets = salarioBase * 0.25;
    const salarioNeto = salarioBase - descuentoFaltas + cestaTickets;

    // Actualizar campos con los resultados
    document.getElementById("cesta_tickets").value = cestaTickets.toFixed(2);
    document.getElementById("salario_neto").value = salarioNeto.toFixed(2);
}

// Agregar event listeners a los campos que disparan el cálculo
document.addEventListener('DOMContentLoaded', function() {
    const salarioInput = document.getElementById("salario_base");
    const faltasInput = document.getElementById("faltas");

    salarioInput.addEventListener('input', calcularNomina);
    faltasInput.addEventListener('input', calcularNomina);

    // Realizar cálculo inicial
    calcularNomina();
}); 