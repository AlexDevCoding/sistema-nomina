<?php
include('../../conexión.php');

ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = array();
    
    $id = $_GET['id'];
    $nombre_completo = isset($_POST['nombre_completo']) ? $_POST['nombre_completo'] : '';
    $cedula_identidad = isset($_POST['cedula_identidad']) ? $_POST['cedula_identidad'] : '';
    $unidad_valor = $_POST['unidad_valor'];
    $dias_laborados = $_POST['dias_laborados'];
    $variable_multiplicacion = $_POST['variable_multiplicacion'];
    $num_faltas = $_POST['num_faltas'];
    $costo_falta = $_POST['costo_falta'];
    $bono = $_POST['bono'];
    $jabon = $_POST['jabon'];
    $anticipo = $_POST['anticipo'];
    $gasto_gas = $_POST['gasto_gas'];
    
    $salario_base = $unidad_valor * $variable_multiplicacion;
    
    $descuento_faltas = 0;
    if ($num_faltas > 0) {
        if ($costo_falta > 0) {
            $descuento_faltas = $num_faltas * $costo_falta;
        } else {
            $valor_dia = $salario_base / 30;
            $descuento_faltas = $num_faltas * $valor_dia;
        }
    }
    
    $cesta_tickets = $dias_laborados * $unidad_valor;
    $deducciones = $anticipo + $jabon + $gasto_gas;
    $salario_neto = $salario_base - $descuento_faltas + $cesta_tickets + $bono - $deducciones;

    try {
        $sql = "UPDATE pagos 
                SET faltas = ?, descuento_faltas = ?, 
                    salario_base = ?, cesta_tickets = ?, 
                    bono = ?, jabon = ?, anticipo = ?, gasto_gas = ?,
                    deducciones = ?, salario_neto = ?,
                    unidad_valor = ?, dias_laborados = ?, variable_multiplicacion = ?, costo_falta = ?
                WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('dddddddddddddi', 
            $num_faltas, $descuento_faltas, 
            $salario_base, $cesta_tickets, 
            $bono, $jabon, $anticipo, $gasto_gas,
            $deducciones, $salario_neto,
            $unidad_valor, $dias_laborados, $variable_multiplicacion, $costo_falta,
            $id);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Pago actualizado correctamente";
        } else {
            $response['success'] = false;
            $response['message'] = "Error: " . $conn->error;
        }

        $stmt->close();
    } catch (Exception $e) {
        $response['success'] = false;
        $response['message'] = "Error de excepción: " . $e->getMessage();
    }

    ob_end_clean();
    
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-Type: application/json; charset=utf-8');
    
    echo json_encode($response);
    exit;
}
?>