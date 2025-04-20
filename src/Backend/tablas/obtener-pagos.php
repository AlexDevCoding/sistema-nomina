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
