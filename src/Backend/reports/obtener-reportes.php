<?php
include '../conexión.php';
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);

try {
    $tipo_reporte = $_GET['tipo_reporte'] ?? '';

    if (empty($tipo_reporte)) {
        throw new Exception("Parámetros incompletos");
    }

    $sql = "";
    switch ($tipo_reporte) {
        case "empleados":
            $sql = "SELECT nombre_completo, cedula_identidad, puesto, departamento, fecha_ingreso, estado 
                   FROM empleados";
            break;
            
        default:
            throw new Exception("Tipo de reporte no válido");
    }

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    if (empty($data)) {
        echo json_encode(["mensaje" => "No hay datos disponibles"]);
    } else {
        echo json_encode($data);
    }

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>