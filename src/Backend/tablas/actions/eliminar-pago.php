<?php
include('../../conexión.php');

header('Content-Type: application/json');

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $conn->connect_error]);
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    try {
        // Eliminar pago
        $sql_pago = "DELETE FROM pagos WHERE id = ?";
        $stmt_pago = $conn->prepare($sql_pago);
        
        if (!$stmt_pago) {
            throw new Exception('Error en la preparación de eliminación de pago: ' . $conn->error);
        }
        
        $stmt_pago->bind_param("i", $id);
        
        if (!$stmt_pago->execute()) {
            throw new Exception('Error al eliminar pago: ' . $stmt_pago->error);
        }
        
        if ($stmt_pago->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Pago eliminado correctamente']);
        } else {
            throw new Exception('No se encontró el pago');
        }
        
        $stmt_pago->close();
        
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
    
} else {
    echo json_encode(['success' => false, 'message' => 'ID no proporcionado']);
}

$conn->close();
?>