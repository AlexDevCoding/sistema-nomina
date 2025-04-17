<?php
header('Content-Type: application/json');
include '../conexión.php'; 

function ejecutarConsulta($conn, $query) {
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo json_encode(['error' => 'Error en la consulta: ' . mysqli_error($conn)]);
        exit;
    }
    return $result;
}

// Consulta de cantidad de empleados por departamento
$query = "SELECT departamento, COUNT(*) as total FROM empleados GROUP BY departamento";
$result = ejecutarConsulta($conn, $query);

// Consulta de total de empleados
$totalEmpleadosQuery = "SELECT COUNT(*) as total FROM empleados";
$totalResult = ejecutarConsulta($conn, $totalEmpleadosQuery);
$totalEmpleados = mysqli_fetch_assoc($totalResult)['total'];

// Consulta de cantidad de empleados activos
$empleadosActivosQuery = "SELECT COUNT(*) as total FROM empleados WHERE estado = 'Activo'";
$empleadosActivosResult = ejecutarConsulta($conn, $empleadosActivosQuery);
$empleadosActivos = mysqli_fetch_assoc($empleadosActivosResult)['total'];

// Consulta de cantidad de empleados inactivos
$empleadosInactivosQuery = "SELECT COUNT(*) as total FROM empleados WHERE estado = 'Inactivo'";
$empleadosInactivosResult = ejecutarConsulta($conn, $empleadosInactivosQuery);
$empleadosInactivos = mysqli_fetch_assoc($empleadosInactivosResult)['total'];

// Consulta para obtener la distribución por puesto
$puestosQuery = "SELECT puesto, COUNT(*) as total FROM empleados GROUP BY puesto";
$puestosResult = ejecutarConsulta($conn, $puestosQuery);

$departamentos = [];
$totales = [];
$puestos = [];
$totalesPuestos = [];

// Almacenar los resultados por departamento
while ($row = mysqli_fetch_assoc($result)) {
    $departamentos[] = $row['departamento']; 
    $totales[] = (int)$row['total']; 
}

// Almacenar los resultados por puesto
while ($row = mysqli_fetch_assoc($puestosResult)) {
    $puestos[] = $row['puesto'];
    $totalesPuestos[] = (int)$row['total'];
}

// Devolver todos los datos en formato JSON
echo json_encode([
    'departamentos' => $departamentos,
    'totales' => $totales,
    'totalEmpleados' => $totalEmpleados,
    'empleadosActivos' => $empleadosActivos,
    'empleadosInactivos' => $empleadosInactivos,
    'puestos' => $puestos,
    'totalesPuestos' => $totalesPuestos
]);
?>

