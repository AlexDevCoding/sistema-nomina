<?php
$servername = "localhost"; 
$username = "root";     
$password = "";  
$database = "sistema";   

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos...<br>";

// Verificar si la columna 'variable' existe
$check_column = "SHOW COLUMNS FROM pagos LIKE 'variable'";
$result_check = $conn->query($check_column);

if ($result_check && $result_check->num_rows > 0) {
    // Si existe, renombrarla
    $alter_query = "ALTER TABLE pagos CHANGE COLUMN `variable` `variable_multiplicacion` decimal(10,2) DEFAULT NULL";
    if ($conn->query($alter_query) === TRUE) {
        echo "Columna 'variable' renombrada a 'variable_multiplicacion' exitosamente.<br>";
    } else {
        echo "Error al renombrar la columna: " . $conn->error . "<br>";
    }
} else {
    // Si no existe, verificar si variable_multiplicacion ya existe
    $check_new_column = "SHOW COLUMNS FROM pagos LIKE 'variable_multiplicacion'";
    $result_new_check = $conn->query($check_new_column);
    
    if (!$result_new_check || $result_new_check->num_rows == 0) {
        // Si no existe, crearla
        $add_query = "ALTER TABLE pagos ADD COLUMN `variable_multiplicacion` decimal(10,2) DEFAULT NULL";
        if ($conn->query($add_query) === TRUE) {
            echo "Columna 'variable_multiplicacion' creada exitosamente.<br>";
        } else {
            echo "Error al crear la columna: " . $conn->error . "<br>";
        }
    } else {
        echo "La columna 'variable_multiplicacion' ya existe.<br>";
    }
}

echo "También verificaremos si la tabla pagos existe...<br>";
$check_table = "SHOW TABLES LIKE 'pagos'";
$result_table = $conn->query($check_table);

if (!$result_table || $result_table->num_rows == 0) {
    echo "La tabla 'pagos' no existe. Creando la tabla...<br>";
    
    $create_table = "CREATE TABLE IF NOT EXISTS `pagos` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `empleado_id` int(11) NOT NULL,
        `cedula_identidad` varchar(20) NOT NULL,
        `salario_base` decimal(10,2) NOT NULL,
        `faltas` int(11) DEFAULT 0,
        `descuento_faltas` decimal(10,2) DEFAULT 0.00,
        `cesta_tickets` decimal(10,2) DEFAULT 0.00,
        `bono` decimal(10,2) DEFAULT 0.00,
        `jabon` decimal(10,2) DEFAULT 0.00,
        `deducciones` decimal(10,2) DEFAULT 0.00,
        `salario_neto` decimal(10,2) NOT NULL,
        `fecha_pago` date NOT NULL,
        `unidad_valor` decimal(10,2) DEFAULT NULL,
        `dias_laborados` int(11) DEFAULT NULL,
        `variable_multiplicacion` decimal(10,2) DEFAULT NULL,
        `multiplicacion_anticipo` decimal(10,2) DEFAULT NULL,
        `gasto_gas` decimal(10,2) DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `empleados_id` (`empleado_id`),
        KEY `cedula_identidad` (`cedula_identidad`),
        KEY `fecha_pago` (`fecha_pago`),
        CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
    
    if ($conn->query($create_table) === TRUE) {
        echo "Tabla 'pagos' creada exitosamente.<br>";
    } else {
        echo "Error al crear la tabla 'pagos': " . $conn->error . "<br>";
    }
} else {
    echo "La tabla 'pagos' ya existe.<br>";
}

$conn->close();
echo "Proceso completado.";
?> 