<?php
include('../../Backend/conexión.php');

header('Content-Type: application/json');

if (isset($_GET['cedula']) && !empty($_GET['cedula'])) {
    $cedula = trim($_GET['cedula']);

    $query = "SELECT nombre_completo FROM empleados WHERE cedula_identidad = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $cedula);
    
    try {
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $empleado = $result->fetch_assoc();
            echo json_encode(['nombre_completo' => $empleado['nombre_completo']]);
        } else {
            echo json_encode(['nombre_completo' => null]);
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Error en la consulta']);
    }
    
    $stmt->close();
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Cédula no proporcionada']);
}

$conn->close();
?>