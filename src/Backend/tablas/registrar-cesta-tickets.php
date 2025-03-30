<?php
include('../conexión.php'); // Asegúrate de que la ruta sea correcta
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Verificar que los campos esenciales estén presentes
if (
    isset($_POST['cedula_identidad']) &&
    isset($_POST['salario_base']) &&
    isset($_POST['faltas']) &&
    isset($_POST['cesta_tickets']) &&
    isset($_POST['salario_neto']) &&
    isset($_POST['fecha_pago'])
) {
    // Obtener y sanitizar los datos
    $cedula_identidad = $conn->real_escape_string($_POST['cedula_identidad']);
    $salario_base = floatval($_POST['salario_base']);
    $faltas = intval($_POST['faltas']);
    $cesta_tickets = floatval($_POST['cesta_tickets']);
    $salario_neto = floatval($_POST['salario_neto']);
    $fecha_pago = $conn->real_escape_string($_POST['fecha_pago']);

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
        $query_pago = "INSERT INTO pagos (empleado_id, salario_base, faltas, cesta_tickets, salario_neto, fecha_pago) 
                       VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_pago = $conn->prepare($query_pago);
        $stmt_pago->bind_param("idddds", $empleado_id, $salario_base, $faltas, $cesta_tickets, $salario_neto, $fecha_pago);
        
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
