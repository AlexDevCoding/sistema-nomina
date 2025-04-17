<?php
session_start();
include '../../Backend/conexión.php'; // Asegúrate de que este archivo define correctamente la conexión a la base de datos

// Verificar si $pdo está definido
if (!isset($pdo)) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=nombre_base_datos', 'usuario', 'contraseña');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error al conectar con la base de datos: " . $e->getMessage());
    }
}

// Variable para almacenar datos del empleado
$empleado = null;
$total_a_pagar = null; // Inicializar variable para el total a pagar
$deducciones = null; // Inicializar variable para las deducciones

// Para almacenar la lista de empleados
$empleados_lista = [];

try {
    // Consultar todos los empleados
    $stmt = $pdo->prepare("SELECT id, nombre, apellido FROM empleados");
    $stmt->execute();
    $empleados_lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener la lista de empleados: " . $e->getMessage();
}

if (isset($_POST['empleado_id'])) {
    $empleado_id = intval($_POST['empleado_id']);
    
    // Consultar datos del empleado seleccionado
    try {
        $stmt = $pdo->prepare("SELECT nombre, apellido FROM empleados WHERE id = ?");
        $stmt->execute([$empleado_id]);
        $empleado = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener datos del empleado: " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['unidad_valor'])) {
    // Validaciones de entrada
    $unidad_valor = !empty($_POST['unidad_valor']) ? floatval($_POST['unidad_valor']) : null;
    $dias_laborados = !empty($_POST['dias_laborados']) ? intval($_POST['dias_laborados']) : null;
    $faltas = isset($_POST['faltas']) ? $_POST['faltas'] : null;
    $anticipo = !empty($_POST['anticipo']) ? floatval($_POST['anticipo']) : 0.0;
    $gasto_gas = !empty($_POST['gasto_gas']) ? floatval($_POST['gasto_gas']) : 0.0;
    $empleado_id = !empty($_POST['empleado_id']) ? intval($_POST['empleado_id']) : null;

    if ($unidad_valor !== null && $dias_laborados !== null && $empleado_id !== null) {
        $descuento_faltas = $faltas * ($unidad_valor / 30);
        $cesta_tickets = $dias_laborados * 0.10 * $unidad_valor;
        $bono = 5 * ($unidad_valor / 30);
        $jabon = 5 * ($unidad_valor / 30);
        $deducciones = $anticipo + $gasto_gas + $descuento_faltas;
        $total_a_pagar = $cesta_tickets + $bono + $jabon - $deducciones;

        // Guardar en la base de datos
        try {
            $stmt = $pdo->prepare("INSERT INTO nominas (empleado_id, unidad_valor, dias_laborados, faltas, anticipo, gasto_gas, total_a_pagar) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$empleado_id, $unidad_valor, $dias_laborados, $faltas, $anticipo, $gasto_gas, $total_a_pagar]);
        } catch (PDOException $e) {
            echo "Error al guardar los datos: " . $e->getMessage();
        }
    } else {
        $error_message = "Por favor complete todos los campos requeridos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cálculo de Nómina</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/sweetalert.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="NavLateral full-width">
        <div class="NavLateral-content full-width">
            <header class="NavLateral-title full-width center-align">
                Cálculo de Nómina
            </header>
            <div class="NavLateral-Nav">
                <ul class="full-width">
                    <li><a href="home.php" class="waves-effect waves-light">inicio</a></li>
                </ul>
            </div>  
        </div>  
    </section>

    <section class="ContentPage full-width">
        <div class="container">
            <form action="" method="post" class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <select name="empleado_id" required>
                            <option value="" disabled selected>Seleccionar empleado...</option>
                            <?php foreach ($empleados_lista as $emp): ?>
                                <option value="<?php echo htmlspecialchars($emp['id']); ?>"><?php echo htmlspecialchars($emp['nombre'] . ' ' . $emp['apellido']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label>ID Empleado:</label>
                    </div>
                </div>

                <?php if ($empleado): ?>
                    <h5>Empleado: <?php echo htmlspecialchars($empleado['nombre'] . ' ' . $empleado['apellido']); ?></h5>
                <?php else: ?>
                    <h5>Empleado no encontrado</h5>
                <?php endif; ?>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="number" name="unidad_valor" step="0.01" required>
                        <label>Unidad de Valor:</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="number" name="dias_laborados" required>
                        <label>Días Laborados:</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="number" name="variable_multiplicacion" step="0.01" required>
                        <label>Variable de Multiplicación:</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="faltas">
                            <option value="no">No</option>
                            <option value="si">Sí</option>
                        </select>
                        <label>¿El trabajador ha faltado?</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="number" name="anticipo" step="0.01" value="0">
                        <label>Anticipo:</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="number" name="gasto_gas" step="0.01" value="0">
                        <label>Gasto de Gas:</label>
                    </div>
                </div>

                <button type="submit" class="btn waves-effect waves-light">Calcular Nómina</button>
            </form>

            <?php if (isset($error_message)): ?>
                <h2 class="red-text">Error:</h2>
                <p><?php echo htmlspecialchars($error_message); ?></p>
            <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $total_a_pagar !== null): ?>
                <h3>Resultado:</h3>
                <p>Total Cesta Ticket: <?php echo number_format($cesta_tickets, 2); ?></p>
                <p>Bono: <?php echo number_format($bono, 2); ?></p>
                <p>Jabón: <?php echo number_format($jabon, 2); ?></p>
                <h4>Deducciones:</h4>
                <p>- Anticipo: <?php echo number_format($anticipo, 2); ?></p>
                <p>- Gasto de Gas: <?php echo number_format($gasto_gas, 2); ?></p>
                <p>Total Deducciones: <?php echo number_format($deducciones, 2); ?></p>
                <h4>Total a Pagar: <?php echo number_format($total_a_pagar, 2); ?></h4>
            <?php endif; ?>

            <a href="home.php" class="btn waves-effect waves-light">Regresar</a>
        </div>
    </section>

    <!-- Sweet Alert JS -->
    <script src="js/sweetalert.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-2.2.0.min.js"><\/script>')</script>
    
    <!-- Materialize JS -->
    <script src="js/materialize.min.js"></script>
    
    <!-- Malihu jQuery custom content scroller JS -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    
    <!-- MaterialDark JS -->
    <script src="js/main.js"></script>
</body>
</html>
