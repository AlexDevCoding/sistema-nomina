<?php
include('../../Backend/conexión.php');

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "SELECT p.*, e.nombre_completo 
        FROM pagos p
        JOIN empleados e ON p.empleado_id = e.id
        ORDER BY p.fecha_pago DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo '<tr><td colspan="6">Error en la consulta: ' . mysqli_error($conn) . '</td></tr>';
    exit;
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row["nombre_completo"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["salario_base"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["faltas"]) . '</td>';
        echo '<td>$' . number_format($row["descuento_faltas"], 2) . '</td>';
        echo '<td>$' . number_format($row["cesta_tickets"], 2) . '</td>';
        echo '<td>$' . number_format($row["salario_neto"], 2) . '</td>';
        echo '<td>' . date('Y/m/d', strtotime($row["fecha_pago"])) . '</td>';
        echo '<td class="celda">';
        echo '<div class="flex items-center gap-4">';
        
   
        
        echo '<button 
                onclick="mostrarModalEliminar(' . htmlspecialchars($row['id']) . ')" 
                class="eliminar"
                data-modal-target="popup-modal" 
                data-modal-toggle="popup-modal">
                <i class="ti ti-trash"></i>
              </button>';
        
        echo '</div>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="6">No se encontraron registros de pagos.</td></tr>';
}

mysqli_close($conn);
?>

<!-- Modal de confirmación para eliminar pagos -->
<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
    <div class="relative p-4 bg-white rounded-lg shadow-lg w-full max-w-md mx-auto">
        <button type="button" class="absolute left-[90%] text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center" data-modal-hide="popup-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
        <div class="text-center">
            <div class="flex justify-center items-center mb-4">
                <svg class="text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
            </div>
            <h3 class="mb-5 text-lg font-normal text-gray-500">¿Estás seguro de que deseas eliminar este pago?</h3>
            <div class="flex justify-center gap-4">
                <button id="btnConfirmarEliminar" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Si estoy seguro
                </button>
                <button id="btnCancelarEliminar" data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    No, cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/js/eliminar-pago.js"></script>
