<?php

  include('../../Backend/auth/autenticación.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cesta Tickets</title>
  <link href="../../css/output.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/webfont/tabler-icons-outline.css">
  <link rel="icon" href="../../assets/Img/file.png">
</head>

<body class="bg-white">

<nav
    class="fixed top-0 z-50 w-full bg-white border-b border-gray-200" id="barra-de-navegacion"
  >
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button
            data-drawer-target="logo-sidebar"
            data-drawer-toggle="logo-sidebar"
            aria-controls="logo-sidebar"
            type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          >
            <span class="sr-only">Open sidebar</span>
            <svg
              class="w-6 h-6"
              aria-hidden="true"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                clip-rule="evenodd"
                fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
              ></path>
            </svg>
          </button>
          <a href=" " class="flex ms-2 md:me-24">
            <img
              src="../../assets/Img/file (2).jpg"
              class="h-[55px] me-3"
              alt="INDESSA"
            />
            <span
              class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-gray-800"
              ></span
            >
          </a>
        </div>
        
      </div>
    </div>
  </nav>

  <aside
  id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
  aria-label="Sidebar"
>
  <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-100 leading-8">
    
    <ul class="space-y-2 font-medium">
      <li>
        <a
          href="tablero-admin.php"
          class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100"
        >
        <i class="ti ti-layout-dashboard" style="font-size: 25px;"></i>
          <span class="ms-3">Tablero</span>
        </a>
      </li>
      <li>
        <a
          href="#"
          class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100" 
          aria-controls="dropdown-example" data-collapse-toggle="dropdown-example"
        >
        <i class="ti ti-users" style="font-size: 25px;"></i>
          <span class="flex-1 ms-3 whitespace-nowrap">Empleados</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
         </svg>
        
         
        </a>
        <ul id="dropdown-example" class="hidden py-2 space-y-2">
         
          <li>
             <a href="lista-empleados.php" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Lista de Empleados</a>
          </li>
          
          <li>
            <a href="cesta-tickets.php" class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Cesta de tickets</a>
          </li>


    </ul>
      </li>
      

   
 

      <li>
        <a
          href="reportes.php"
          class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100"
        >
        <i class="ti ti-report-search" style="font-size: 25px;"></i>
          <span class="flex-1 ms-3 whitespace-nowrap">Reportes</span>
        </a>
      </li>

      <li>
        <a
          href="bitacora-usuarios.php"
          class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100"
        >
      
        <i class="ti ti-users-group" style="font-size: 25px;"></i>
          <span class="flex-1 ms-3 whitespace-nowrap">Bitacora de usuarios</span>
        </a>
      </li>

      <li>
        <a
          href="bases-datos.php"
          class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100"
        >
          <i class="ti ti-database" style="font-size: 25px;"></i>
          <span class="flex-1 ms-3 whitespace-nowrap">Base De Datos</span>
        </a>
      </li>


      <li>
        <a
          href="manual-usuario.php"
          class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100"
        >
        <i class="ti ti-help-octagon" style="font-size: 25px;"></i>
          <span class="flex-1 ms-3 whitespace-nowrap">Manual de usuario</span>
        </a>
      </li>



      <li>
        <a
          href="../../Backend/logout.php"
          class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100"
        >
        <i class="ti ti-logout" style="font-size: 25px;"></i>
          <span class="flex-1 ms-3 whitespace-nowrap">Cerrar Sección</span>
        </a>
      </li>
      
    </ul>
  </div>
</aside>

  <section class="p-4 sm:ml-64 mt-10" id="section">
    <div class="flex relative   rounded  h-10 mt-[15px] ">
      <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
          <a href="#"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#1e54ff] dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              viewBox="0 0 20 20">
              <path
                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            Tablero
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 9 4-4-4-4" />
            </svg>
            <span
              class="ms-1 text-sm font-medium text-gray-700 cursor-default hover:text-[#1e54ff] md:ms-2 dark:text-gray-400 dark:hover:text-white">Empleados</span>
          </div>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 9 4-4-4-4" />
            </svg>
            <span class="cursor-default ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Lista de
              Empleados</span>
          </div>
        </li>
      </ol>
    </div>

    <div class="encabezado flex justify-between items-center w-[90%] text-gray-800">

      <h1 class=" text-[28px]">Cesta Tickets</h1>

      <button class="bg-white text-gray-800 
            border border-gray-300 
            font-medium overflow-hidden relative 
            px-4 py-2 rounded-md hover:bg-gray-100 
             hover:border-b active:opacity-75 outline-none duration-300 group" id="defaultModalButton" data-modal-target="defaultModal"
        data-modal-toggle="defaultModal">
        <span class="bg-gray-400 
              shadow-gray-400 absolute -top-[150%] 
              left-0 inline-flex w-80 h-[5px] rounded-md 
              opacity-50 group-hover:top-[150%] duration-500 shadow-[0_0_10px_10px_rgba(0,0,0,0.3)]"></span>
        Añadir Pago
      </button>


      <!-- Main modal -->
      <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
              <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                Nuevo Pago
              </h3>
              <button type="button"
                class="text-gray-400 bg-transparent  rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  hover:bg-gray-100 "
                data-modal-toggle="defaultModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Cerrar Modal</span>
              </button>
            </div>
            <!-- Modal body -->
            <form action="../../Backend/tablas/calculo-nomina.php" method="POST" id="formulario-registro">
  <div class="grid grid-cols-2 gap-4 mb-4">
    <!-- Campos que se mantienen -->
    <div>
      <label for="name" class="block mb-2 text-sm font-medium text-gray-800">Nombre Completo</label>
      <input type="text" name="nombre_completo" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar nombre completo" required>
    </div>
    <div>
      <label for="cedula_identidad" class="block mb-2 text-sm font-medium text-gray-800">Cédula de Identidad</label>
      <input type="text" name="cedula_identidad" id="cedula_identidad" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar cédula" pattern="\d{8}" title="La cédula debe contener 8 dígitos" required>
    </div>

    <!-- Nuevos campos -->
    <div>
      <label for="unidad_valor" class="block mb-2 text-sm font-medium text-gray-800">Unidad de Valor</label>
      <input type="number" name="unidad_valor" id="unidad_valor" step="0.01" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar Unidad de Valor" required>
    </div>
    <div>
      <label for="dias_laborados" class="block mb-2 text-sm font-medium text-gray-800">Días Laborados</label>
      <input type="number" name="dias_laborados" id="dias_laborados" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar días laborados" min="0" required>
    </div>
    <div>
      <label for="variable_multiplicacion" class="block mb-2 text-sm font-medium text-gray-800">Variable de Multiplicación</label>
      <input type="number" name="variable_multiplicacion" id="variable_multiplicacion" step="0.01" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar variable" required>
    </div>
    <div>
      <label for="num_faltas" class="block mb-2 text-sm font-medium text-gray-800">Número de Faltas</label>
      <input type="number" name="num_faltas" id="num_faltas" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar número de faltas" min="0" value="0">
    </div>
    <div>
      <label for="costo_falta" class="block mb-2 text-sm font-medium text-gray-800">Costo por Falta</label>
      <input type="number" name="costo_falta" id="costo_falta" step="0.01" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar costo por falta" min="0" value="0">
    </div>
    <div>
      <label for="bono" class="block mb-2 text-sm font-medium text-gray-800">Bono</label>
      <input type="number" name="bono" id="bono" step="0.01" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar bono" min="0" value="0">
    </div>
    <div>
      <label for="jabon" class="block mb-2 text-sm font-medium text-gray-800">Jabón (Descuento)</label>
      <input type="number" name="jabon" id="jabon" step="0.01" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar descuento por jabón" min="0" value="0">
    </div>
    <div>
      <label for="anticipo" class="block mb-2 text-sm font-medium text-gray-800">Anticipo</label>
      <input type="number" name="anticipo" id="anticipo" step="0.01" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar anticipo" min="0" value="0">
    </div>
    <div>
      <label for="gasto_gas" class="block mb-2 text-sm font-medium text-gray-800">Gasto de Gas</label>
      <input type="number" name="gasto_gas" id="gasto_gas" step="0.01" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Ingresar gasto de gas" min="0" value="0">
    </div>
  </div>

  <button type="submit" class="text-white bg-blue-700 hover:bg-[#235dff] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
    Calcular y Guardar
  </button>
</form>
          </div>

        
        </div>
      </div>
    </div>



    <div class="p-[30px] border-none rounded-lg mt-8 w-[90%] bg-white">




      <table id="pagination-table" class="">

        <thead>

          <tr>

            <th>Nombre Completo</th>
            <th>Salario Base</th>
            <th>Faltas</th>
            <th>Descuento de Faltas</th>
            <th>Cesta Tickets</th>
            <th>Salario Neto</th>
            <th>Fecha de Pago</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="empleados-table">
  
        <?php include '../../Backend/tablas/obtener-pagos.php'; ?>
        <!-- añadir tabla de tickets -->


        </tbody>
      </table>








    </div>



    <div id="popup-modal-success" tabindex="-1" 
        data-modal-target="popup-modal-success"
        data-modal-toggle="popup-modal-success"
        class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
        <div class="relative p-4 bg-white rounded-lg shadow-lg w-full max-w-md mx-auto">
            <button type="button" 
                data-modal-hide="popup-modal-success"
                class="absolute left-[90%] text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="text-center">
                <div class="flex justify-center items-center mb-4">
                    <svg class="text-green-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                    </svg>
                </div>
                <h3 class="mb-5 text-lg font-normal text-gray-500">¡El Pago ha sido registrado exitosamente!</h3>
                <div class="flex justify-center gap-4">
                    <button data-modal-hide="popup-modal-success" id="btnConfirmarEditar" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="popup-modal-warning" tabindex="-1"
        data-modal-target="popup-modal-warning"
        data-modal-toggle="popup-modal-warning" 
        class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
        <div class="relative p-4 bg-white rounded-lg shadow-lg w-full max-w-md mx-auto">
            <button type="button" 
                data-modal-hide="popup-modal-warning"
                class="absolute left-[90%] text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Cerrar modal</span>
            </button>
            <div class="text-center">
                <div class="flex justify-center items-center mb-4">
                    <svg class="text-yellow-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                    </svg>
                </div>
                <h3 class="mb-5 text-lg font-normal text-gray-500">¡Este empleado ya se encuentra registrado en esta fecha!</h3>
                <div class="flex justify-center gap-4">
                    <button data-modal-hide="popup-modal-warning" id="btnCerrarExistente" type="button" class="text-white bg-yellow-600 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>
  </section>

  <script src="../../assets/js/tables.js"></script>
  <script src="../../assets/js/empleados.js" id="scripts"></script>
  <script src="../../assets/js/añadir-pago.js" id="scripts"></script>
  <script type="module" src="../../assets/js/flowbite.js" id="scripts"></script>
  <script src="../../assets/js/buscador.js" id="scripts"></script>
  <!-- <script src="js/calculos-nomina.js" id="scripts"></script> -->
 



</body>

</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.getElementById('formulario-registro');
    const submitButton = formulario.querySelector('button[type="submit"]');
    
    // Crear la mini calculadora
    const calculadora = document.createElement('div');
    calculadora.classList.add('bg-gradient-to-r', 'from-blue-50', 'to-indigo-50', 'p-3', 'rounded-lg', 'shadow-sm', 'border', 'border-blue-100', 'mb-4');
    calculadora.innerHTML = `
        <div class="flex items-center justify-between mb-2">
            <h4 class="text-xs font-semibold text-blue-900 uppercase tracking-wider">Calculadora</h4>
            <i class="ti ti-calculator text-blue-500" style="font-size: 16px;"></i>
        </div>
        <div class="grid grid-cols-2 gap-x-6 gap-y-1 text-xs">
            <div class="flex justify-between">
                <span class="text-gray-600">Salario Base:</span>
                <span id="calc-salario-base" class="font-medium text-blue-700">0.00 Bs</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Descuento Faltas:</span>
                <span id="calc-descuento-faltas" class="font-medium text-red-600">0.00 Bs</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Cesta Tickets:</span>
                <span id="calc-cesta-tickets" class="font-medium text-green-600">0.00 Bs</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600">Deducciones:</span>
                <span id="calc-deducciones" class="font-medium text-red-600">0.00 Bs</span>
            </div>
        </div>
        <div class="mt-2 pt-2 border-t border-blue-100">
            <div class="flex justify-between items-center">
                <span class="text-xs font-semibold text-gray-700">Salario Neto:</span>
                <span id="calc-salario-neto" class="font-bold text-sm text-blue-800">0.00 Bs</span>
            </div>
        </div>
    `;
    
    // Insertar antes del botón de envío
    submitButton.before(calculadora);
    
    // Obtener referencias a los campos
    const unidadValorInput = document.getElementById('unidad_valor');
    const diasLaboradosInput = document.getElementById('dias_laborados');
    const variableMultiplicacionInput = document.getElementById('variable_multiplicacion');
    const numFaltasInput = document.getElementById('num_faltas');
    const costoFaltaInput = document.getElementById('costo_falta');
    const bonoInput = document.getElementById('bono');
    const jabonInput = document.getElementById('jabon');
    const anticipoInput = document.getElementById('anticipo');
    const gastoGasInput = document.getElementById('gasto_gas');
    
    // Función para calcular y actualizar valores
    function calcularValores() {
        // Obtener valores actuales
        const unidadValor = parseFloat(unidadValorInput.value) || 0;
        const diasLaborados = parseInt(diasLaboradosInput.value) || 0;
        const variableMultiplicacion = parseFloat(variableMultiplicacionInput.value) || 0;
        const numFaltas = parseInt(numFaltasInput.value) || 0;
        const costoFalta = parseFloat(costoFaltaInput.value) || 0;
        const bono = parseFloat(bonoInput.value) || 0;
        const jabon = parseFloat(jabonInput.value) || 0;
        const anticipo = parseFloat(anticipoInput.value) || 0;
        const gastoGas = parseFloat(gastoGasInput.value) || 0;
        
        // Calcular según la lógica
        const salarioBase = unidadValor * variableMultiplicacion;
        
        let descuentoFaltas = 0;
        if (numFaltas > 0) {
            if (costoFalta > 0) {
                descuentoFaltas = numFaltas * costoFalta;
            } else {
                const valorDia = salarioBase / 30;
                descuentoFaltas = numFaltas * valorDia;
            }
        }
        
        const cestaTickets = diasLaborados * unidadValor;
        const deducciones = anticipo + gastoGas + jabon;
        const salarioNeto = salarioBase - descuentoFaltas + cestaTickets + bono - deducciones;
        
        // Actualizar elementos en la calculadora
        document.getElementById('calc-salario-base').textContent = salarioBase.toFixed(2) + ' Bs';
        document.getElementById('calc-descuento-faltas').textContent = descuentoFaltas.toFixed(2) + ' Bs';
        document.getElementById('calc-cesta-tickets').textContent = cestaTickets.toFixed(2) + ' Bs';
        document.getElementById('calc-deducciones').textContent = deducciones.toFixed(2) + ' Bs';
        document.getElementById('calc-salario-neto').textContent = salarioNeto.toFixed(2) + ' Bs';
    }
    
    // Asignar eventos input a todos los campos relevantes
    [unidadValorInput, diasLaboradosInput, variableMultiplicacionInput, 
     numFaltasInput, costoFaltaInput, bonoInput, jabonInput, 
     anticipoInput, gastoGasInput].forEach(input => {
        if (input) {
            input.addEventListener('input', calcularValores);
        }
    });
    
    // Calcular inicialmente
    calcularValores();
    
    // Resto del código existente para el manejo del formulario
    if (formulario) {
        formulario.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            try {
                const formData = new FormData(this);
                const response = await fetch('../../Backend/tablas/calculo-nomina.php', {
                    method: 'POST',
                    body: formData
                });
                
                const data = await response.json();
                
                // Cerrar el modal de registro
                const defaultModal = document.getElementById('defaultModal');
                if (defaultModal) {
                    defaultModal.classList.add('hidden');
                    // Eliminar el backdrop del modal
                    const backdrop = document.querySelector('.bg-gray-900');
                    if (backdrop) {
                        backdrop.remove();
                    }
                }

                if (data.status === 'success') {
                    // Mostrar modal de éxito
                    const modalExito = document.getElementById('popup-modal-success');
                    if (modalExito) {
                        modalExito.classList.remove('hidden');
                    }
                } else {
                    // Mostrar modal de advertencia
                    const modalWarning = document.getElementById('popup-modal-warning');
                    if (modalWarning) {
                        modalWarning.classList.remove('hidden');
                    }
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Error al procesar la solicitud. Por favor, intente nuevamente.');
            }
        });
    }
    
    // Manejadores para cerrar modales con limpieza
    document.querySelectorAll('[data-modal-hide]').forEach(button => {
        button.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal-hide');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                
                // Eliminar cualquier backdrop o elementos residuales
                document.querySelectorAll('.bg-gray-900, .bg-black').forEach(el => {
                    el.remove();
                });
                
                // Restaurar el scroll
                document.body.style.overflow = '';
                
                if (modalId === 'popup-modal-success') {
                    // Recargar la página después de un pequeño retraso para asegurar limpieza
                    setTimeout(() => {
                        window.location.href = window.location.pathname;
                    }, 100);
                }
            }
        });
    });
});
</script>