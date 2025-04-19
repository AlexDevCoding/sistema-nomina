<?php
include('../conexión.php');

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Habilitar la visualización de errores para depuración
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario con validación
    $nombre_completo = isset($_POST['nombre_completo']) ? mysqli_real_escape_string($conn, $_POST['nombre_completo']) : '';
    $cedula_identidad = isset($_POST['cedula_identidad']) ? mysqli_real_escape_string($conn, $_POST['cedula_identidad']) : '';
    $unidad_valor = isset($_POST['unidad_valor']) ? floatval($_POST['unidad_valor']) : 0;
    $dias_laborados = isset($_POST['dias_laborados']) ? intval($_POST['dias_laborados']) : 0;
    $variable_multiplicacion = isset($_POST['variable_multiplicacion']) ? floatval($_POST['variable_multiplicacion']) : 0;
    
    // Nuevos campos
    $num_faltas = isset($_POST['num_faltas']) ? intval($_POST['num_faltas']) : 0;
    $costo_falta = isset($_POST['costo_falta']) ? floatval($_POST['costo_falta']) : 0;
    $bono = isset($_POST['bono']) ? floatval($_POST['bono']) : 0;
    $jabon = isset($_POST['jabon']) ? floatval($_POST['jabon']) : 0;
    
    // Campos existentes
    $anticipo = isset($_POST['anticipo']) ? floatval($_POST['anticipo']) : 0;
    $gasto_gas = isset($_POST['gasto_gas']) ? floatval($_POST['gasto_gas']) : 0;
    $fecha_pago = date('Y-m-d'); // Fecha actual

    // Calcular valores
    $salario_base = $unidad_valor * $variable_multiplicacion;
    
    // Calcular descuento por faltas
    $descuento_faltas = 0;
    if ($num_faltas > 0) {
        if ($costo_falta > 0) {
            // Si se especificó un costo por falta, usar ese valor
            $descuento_faltas = $num_faltas * $costo_falta;
        } else {
            // Calcular el valor de un día y usar eso como descuento por falta
            $valor_dia = $salario_base / 30;
            $descuento_faltas = $num_faltas * $valor_dia;
        }
    }
    
    $cesta_tickets = $dias_laborados * $unidad_valor;
    // Incluir jabón en deducciones
    $deducciones = $anticipo + $gasto_gas + $jabon;
    // Incluir bono en el cálculo del salario neto
    $salario_neto = $salario_base - $descuento_faltas + $cesta_tickets + $bono - $deducciones;

    // Buscar el empleado por cédula
    $sql_check = "SELECT id FROM empleados WHERE cedula_identidad = '$cedula_identidad'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        // El empleado existe, obtener su ID
        $row = mysqli_fetch_assoc($result_check);
        $empleado_id = $row['id'];

        // Verificar si ya tiene un pago en la misma fecha
        $sql_check_payment = "SELECT id FROM pagos WHERE empleado_id = '$empleado_id' AND fecha_pago = '$fecha_pago'";
        $result_check_payment = mysqli_query($conn, $sql_check_payment);

        if (mysqli_num_rows($result_check_payment) > 0) {
            // Ya existe un pago en esta fecha, enviar respuesta
            echo json_encode([
                'status' => 'warning',
                'message' => 'Este empleado ya tiene un pago registrado para esta fecha'
            ]);
            exit;
        }

        // Insertar el pago en la base de datos - Actualizado para incluir los nuevos campos
        $sql_insert = "INSERT INTO pagos (empleado_id, nombre_completo, cedula_identidad, salario_base, faltas, 
                      descuento_faltas, cesta_tickets, bono, jabon, deducciones, salario_neto, fecha_pago) 
                      VALUES ('$empleado_id', '$nombre_completo', '$cedula_identidad', '$salario_base', '$num_faltas', 
                      '$descuento_faltas', '$cesta_tickets', '$bono', '$jabon', '$deducciones', '$salario_neto', '$fecha_pago')";

        if (mysqli_query($conn, $sql_insert)) {
            // Obtener el ID del pago insertado
            $pago_id = mysqli_insert_id($conn);
            
            // Devolver los datos calculados para mostrar en el modal
            echo json_encode([
                'status' => 'success',
                'message' => 'Pago registrado correctamente',
                'id' => $pago_id,
                'datos' => [
                    'nombre_completo' => $nombre_completo,
                    'cedula_identidad' => $cedula_identidad,
                    'salario_base' => $salario_base,
                    'faltas' => $num_faltas,
                    'descuento_faltas' => $descuento_faltas,
                    'cesta_tickets' => $cesta_tickets,
                    'bono' => $bono,
                    'jabon' => $jabon,
                    'anticipo' => $anticipo,
                    'gasto_gas' => $gasto_gas,
                    'deducciones' => $deducciones,
                    'salario_neto' => $salario_neto,
                    'fecha_pago' => $fecha_pago,
                    'dias_laborados' => $dias_laborados
                ]
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Error al registrar el pago: ' . mysqli_error($conn)
            ]);
        }
    } else {
        // El empleado no existe
        echo json_encode([
            'status' => 'error',
            'message' => 'El empleado con esta cédula no existe en el sistema'
        ]);
    }

    // Cerrar la conexión
    mysqli_close($conn);
    exit;
}

// Si no es una solicitud POST, redirigir a la página principal
header("Location: ../../templates/Admin/cesta-tickets.php");
exit;
?>
