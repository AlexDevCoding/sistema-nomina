<?php
include('../../conexión.php');

header('Content-Type: application/json');

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $conn->connect_error]);
    exit;
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    $conn->begin_transaction();
    
    try {
        // Eliminar pagos relacionados
        // Nota: No es necesario eliminar explícitamente los pagos si hay ON DELETE CASCADE
        // pero se deja por seguridad
        $sql_pagos = "DELETE FROM pagos WHERE empleado_id = ?";
        $stmt_pagos = $conn->prepare($sql_pagos);
        
        if (!$stmt_pagos) {
            throw new Exception('Error en la preparación de eliminación de pagos: ' . $conn->error);
        }
        
        $stmt_pagos->bind_param("i", $id);
        $stmt_pagos->execute();
        $stmt_pagos->close();
        
        // Eliminar empleado
        $sql_empleado = "DELETE FROM empleados WHERE id = ?";
        $stmt_empleado = $conn->prepare($sql_empleado);
        
        if (!$stmt_empleado) {
            throw new Exception('Error en la preparación de eliminación de empleado: ' . $conn->error);
        }
        
        $stmt_empleado->bind_param("i", $id);
        
        if (!$stmt_empleado->execute()) {
            throw new Exception('Error al eliminar empleado: ' . $stmt_empleado->error);
        }
        
        if ($stmt_empleado->affected_rows > 0) {
            $conn->commit();
            echo json_encode(['success' => true, 'message' => 'Empleado y sus registros relacionados eliminados correctamente']);
        } else {
            throw new Exception('No se encontró el empleado');
        }
        
        $stmt_empleado->close();
        
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
    
} else {
    echo json_encode(['success' => false, 'message' => 'ID no proporcionado']);
}

$conn->close();
?>