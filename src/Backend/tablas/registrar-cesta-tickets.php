<?php
include('../conexión.php'); // Asegúrate de que la ruta sea correcta
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Verificar que los campos esenciales estén presentes
if (
    isset($_POST['nombre_completo']) &&
    isset($_POST['cedula_identidad']) &&
    isset($_POST['salario_base']) &&
    isset($_POST['faltas']) &&
    isset($_POST['fecha_pago'])
) {
    $nombre_completo = $conn->real_escape_string($_POST['nombre_completo']);
    $cedula_identidad = $conn->real_escape_string($_POST['cedula_identidad']);
    $salario_base = floatval($_POST['salario_base']);
    $faltas = intval($_POST['faltas']);
    $fecha_pago = $conn->real_escape_string($_POST['fecha_pago']);

    // Cálculos
    $descuento_faltas = $faltas * ($salario_base / 30); // Asumiendo 30 días laborales
    $cesta_tickets = 30 * 0.10 * $salario_base; // 10% del salario base por 30 días
    $bono = 5 * ($salario_base / 30); // Bono fijo por 5 días
    $jabon = 5 * ($salario_base / 30); // Valor fijo por 5 días
    $deducciones = $descuento_faltas;
    $salario_neto = $salario_base + $cesta_tickets + $bono + $jabon - $deducciones;

    // Verificar si el empleado existe
    $query_check = "SELECT id FROM empleados WHERE cedula_identidad = ?";
    $stmt_check = $conn->prepare($query_check);
    $stmt_check->bind_param("s", $cedula_identidad);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $empleado_id = $row['id'];

        // Insertar el registro de pago
        $query_pago = "INSERT INTO pagos (empleado_id, nombre_completo, cedula_identidad, salario_base, faltas, descuento_faltas, cesta_tickets, bono, jabon, deducciones, salario_neto, fecha_pago) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_pago = $conn->prepare($query_pago);
        $stmt_pago->bind_param("issdidddddss", $empleado_id, $nombre_completo, $cedula_identidad, $salario_base, $faltas, $descuento_faltas, $cesta_tickets, $bono, $jabon, $deducciones, $salario_neto, $fecha_pago);

        if ($stmt_pago->execute()) {
            echo json_encode(['success' => true, 'message' => 'Pago registrado exitosamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al registrar el pago: ' . $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Empleado no encontrado. Verifique la cédula de identidad.']);
    }

    // Cerrar las conexiones
    if (isset($stmt_check)) $stmt_check->close();
    if (isset($stmt_pago)) $stmt_pago->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Error: Verifique los datos ingresados']);
}
?>
