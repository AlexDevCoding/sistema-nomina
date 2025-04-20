<?php

include('../../Backend/auth/autenticación.php')

  ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../css/output.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../assets/webfont/tabler-icons-outline.css">
  <link rel="icon" href="../../assets/Img/file.png">
  <title>Manual de usuario</title>
</head>

<body class="bg-white">
  <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200" id="barra-de-navegacion">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
            type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
              </path>
            </svg>
          </button>
          <a href=" " class="flex ms-2 md:me-24">
            <img src="../../assets/Img/file (2).jpg" class="h-[55px] me-3" alt="INDESSA" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-gray-800"></span>
          </a>
        </div>

      </div>
    </div>
  </nav>

  <aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-100 leading-8">

      <ul class="space-y-2 font-medium">
        <li>
          <a href="tablero-admin.php" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100">
            <i class="ti ti-layout-dashboard" style="font-size: 25px;"></i>
            <span class="ms-3">Tablero</span>
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100"
            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
            <i class="ti ti-users" style="font-size: 25px;"></i>
            <span class="flex-1 ms-3 whitespace-nowrap">Empleados</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
            </svg>


          </a>
          <ul id="dropdown-example" class="hidden py-2 space-y-2">

            <li>
              <a href="lista-empleados.php"
                class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Lista
                de Empleados</a>
            </li>

            <li>
              <a href="cesta-tickets.php"
                class="flex items-center w-full p-2 text-gray-700 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Cesta
                de tickets</a>
            </li>


          </ul>
        </li>





        <li>
          <a href="reportes.php" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100">
            <i class="ti ti-report-search" style="font-size: 25px;"></i>
            <span class="flex-1 ms-3 whitespace-nowrap">Reportes</span>
          </a>
        </li>

        <li>
          <a href="bitacora-usuarios.php" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100">

            <i class="ti ti-users-group" style="font-size: 25px;"></i>
            <span class="flex-1 ms-3 whitespace-nowrap">Bitacora de usuarios</span>
          </a>
        </li>

        <li>
          <a href="bases-datos.php" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100">
            <i class="ti ti-database" style="font-size: 25px;"></i>
            <span class="flex-1 ms-3 whitespace-nowrap">Base De Datos</span>
          </a>
        </li>


        <li>
          <a href="manual-usuario.php" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100">
            <i class="ti ti-help-octagon" style="font-size: 25px;"></i>
            <span class="flex-1 ms-3 whitespace-nowrap">Manual de usuario</span>
          </a>
        </li>



        <li>
          <a href="../../Backend/logout.php" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100">
            <i class="ti ti-logout" style="font-size: 25px;"></i>
            <span class="flex-1 ms-3 whitespace-nowrap">Cerrar Sección</span>
          </a>
        </li>

      </ul>
    </div>
  </aside>


  <section class="p-4 sm:ml-64 mt-10" id="section">


    <div class="p-[30px] pl-[100px] pr-[100px]  border-none  rounded-lg  mt-8 w-[90%] bg-white">

      <h1 class="text-gray-800 text-center text-2xl font-bold">Manual de usuario</h1>
      <div class="w-full">

        <button id="boton-imprimir" onclick="imprimirSeccion()" type="button" class="text-white bg-blue-700 
        hover:bg-[#235dff] focus:ring-4 
        focus:ring-blue-300 font-medium rounded-lg 
        text-sm px-5 py-2.5 me-2 mb-2  
        ">Imprimir Manual de Usuario</button>

      </div>
      <h2 class="text-gray-800 text-left text-xl  font-bold mt-4">INGRESO – SISTEMA DE GESTIÓN</h2>
      <p class="text-gray-600 text-sm mt-2 text-justify">
        Para comenzar, debe iniciar sesión utilizando el usuario y la clave previamente registrados. Una vez
        introducidos los datos, podrás acceder al sistema de gestión.
      </p>

      <img src="../../assets/Img/Iniciar Sección.jpg" alt="" class="border-solid border-4 rounded-lg mt-4 ">


      <h2 class="text-gray-800 text-left text-xl  font-bold mt-2">TABLERO – INICIO</h2>
      <p class="text-gray-600 text-sm mt-2 text-justify">
        El Tablero de inicio incluye un menú lateral con funciones como tablero principal, gestión de empleados,
        estadísticas, reportes, bitácora de usuarios, base de datos, manual de usuario y cerrar sesión.
      </p>

      <img src="../../assets/Img/Tablero.jpg" alt="" class="border-solid border-4 rounded-lg mt-4 ">

      <h2 class="text-gray-800 text-left text-xl  font-bold mt-2">REGISTRO – EMPLEADO</h2>
      <p class="text-gray-600 text-sm mt-2 text-justify ">
        En el menú, se encuentra la opción de agregar nuevos empleados. Para completar este formulario de registro, es
        necesario proporcionar la siguiente información:
      </p>

      <ul class="text-gray-600 text-left text-sm mt-2">
        <li class="text-gray-600"><strong>Nombre Completo:</strong> Ingrese el nombre del empleado.</li>
        <li class="text-gray-600"><strong>Cédula:</strong> Ingrese la cédula del empleado.</li>
        <li class="text-gray-600"><strong>Departamento:</strong> Seleccione el departamento al que pertenece el
          empleado.</li>
        <li class="text-gray-600"><strong>Puesto:</strong> Ingrese el puesto del empleado.</li>
        <li class="text-gray-600"><strong>Fecha de Ingreso:</strong> Ingrese la fecha de ingreso del empleado.</li>
        <li class="text-gray-600"><strong>Fecha de Nacimiento:</strong> Ingrese la fecha de nacimiento del empleado.
        </li>
        <li class="text-gray-600"><strong>Teléfono:</strong> Ingrese el teléfono del empleado.</li>
    
        <li class="text-gray-600"><strong>Estado:</strong> Seleccione el estado del empleado (activo o inactivo).</li>
      </ul>

      <img src="../../assets/Img/Registro-empleado.jpg" alt="" class="border-solid border-4 rounded-lg mt-4 ">


      <h2 class="text-gray-800 text-left text-xl  font-bold mt-2">LISTA – EMPLEADOS</h2>
      <p class="text-gray-600 text-sm mt-2 text-justify">
        En la sección de lista de empleados del sistema de gestión, se pueden consultar y gestionar los datos de los
        empleados registrados. Esta interfaz presenta una tabla detallada que incluye información como el nombre
        completo, la cédula de identidad, el puesto de trabajo, el departamento, la fecha de ingreso, el estado laboral
        (Activo o Inactivo) y el teléfono. Además, cada fila cuenta con una columna de "Acciones", que permite editar o
        eliminar fácilmente la información de un empleado. También se incluyen opciones de búsqueda y control sobre la
        cantidad de registros visibles por página, optimizando así la navegación y gestión del personal. En la parte
        superior derecha se encuentra el botón "Añadir Empleado", que permite registrar manualmente los empleados,
        asegurando un control eficiente y organizado del personal.
      </p>



    
      

      <img src="../../assets/Img/Lista-empleados.jpg" alt="" class="border-solid border-4 rounded-lg mt-4 ">

      <h2 class="text-gray-800 text-left text-xl  font-bold mt-2">CÁLCULO – NOMINA</h2>
      <p class="text-gray-600 text-sm mt-2 text-justify ">
        En el menú "Empleados", se encuentra la opción "Cesta de tickets" donde puede calcular la nómina de los empleados. Para completar este formulario de registro, es
        necesario proporcionar la siguiente información:
      </p>

      <ul class="text-gray-600 text-left text-sm mt-2">
        <li class="text-gray-600"><strong>Nombre Completo:</strong> Ingrese el nombre completo del empleado.</li>
        <li class="text-gray-600"><strong>Cédula de Identidad:</strong> Ingrese la cédula del empleado (debe contener 8 dígitos).</li>
        <li class="text-gray-600"><strong>Unidad de Valor:</strong> Ingrese el valor unitario base para los cálculos.</li>
        <li class="text-gray-600"><strong>Días Laborados:</strong> Ingrese la cantidad de días que el empleado trabajó en el período.</li>
        <li class="text-gray-600"><strong>Variable de Multiplicación:</strong> Ingrese el factor multiplicador para calcular el salario base.</li>
        <li class="text-gray-600"><strong>Número de Faltas:</strong> Ingrese la cantidad de días de inasistencia (si aplica).</li>
        <li class="text-gray-600"><strong>Costo por Falta:</strong> Ingrese el valor monetario a descontar por cada falta (opcional).</li>
        <li class="text-gray-600"><strong>Bono:</strong> Ingrese cualquier monto adicional como incentivo (si aplica).</li>
        <li class="text-gray-600"><strong>Jabón (Descuento):</strong> Ingrese el monto a descontar por concepto de jabón (si aplica).</li>
        <li class="text-gray-600"><strong>Anticipo:</strong> Ingrese el monto de anticipos otorgados que deben descontarse (si aplica).</li>
        <li class="text-gray-600"><strong>Gasto de Gas:</strong> Ingrese el monto a descontar por concepto de gas (si aplica).</li>
      </ul>

      <h3 class="text-gray-800 text-left text-lg font-semibold mt-4">Cálculos Automáticos</h3>
      <p class="text-gray-600 text-sm mt-2 text-justify">
        El sistema realiza automáticamente los siguientes cálculos:
      </p>

      <ul class="text-gray-600 text-left text-sm mt-2">
        <li class="text-gray-600"><strong>Salario Base:</strong> Unidad de Valor × Variable de Multiplicación</li>
        <li class="text-gray-600"><strong>Cesta Tickets:</strong> Días Laborados × Unidad de Valor</li>
        <li class="text-gray-600"><strong>Descuento por Faltas:</strong> Número de Faltas × Costo por Falta (o valor diario calculado)</li>
        <li class="text-gray-600"><strong>Total Deducciones:</strong> Suma de Jabón + Anticipo + Gasto de Gas</li>
        <li class="text-gray-600"><strong>Salario Neto:</strong> Salario Base - Descuento por Faltas + Cesta Tickets + Bono - Total Deducciones</li>
      </ul>

      <img src="../../assets/Img/Registrar-pago.jpg" alt="" class="border-solid border-4 rounded-lg mt-4 ">


      <h2 class="text-gray-800 text-left text-xl  font-bold mt-2">LISTA – PAGOS</h2>
      <p class="text-gray-600 text-sm mt-2 text-justify">
        En la sección de lista de pagos del sistema de gestión, se pueden consultar y gestionar los registros de los
        pagos realizados a los empleados. Esta interfaz presenta una tabla detallada que incluye información como el nombre
        completo del empleado, salario base, faltas, descuento de faltas, cesta tickets, salario neto y la fecha de pago.
        Cada registro cuenta con una columna de "Acciones", que permite ver el detalle o eliminar el pago según sea necesario.
      </p>
      
      <p class="text-gray-600 text-sm mt-2 text-justify">
        La tabla ofrece funcionalidades de búsqueda para localizar pagos específicos y control sobre la cantidad 
        de registros visibles por página, facilitando así la navegación y gestión de los pagos. En la parte
        superior derecha se encuentra el botón "Añadir Pago", que permite registrar nuevos pagos a los empleados,
        lo que contribuye a mantener un control eficiente y organizado de la nómina.
      </p>



    
      

      <img src="../../assets/Img/Lista-CestaTickets.jpg" alt="" class="border-solid border-4 rounded-lg mt-4 ">



      <h2 class="text-gray-800 text-left text-xl  font-bold mt-2">REPORTES – EMPLEADOS</h2>
      <ul class="text-gray-600 text-left text-sm mt-2">
        <li class="text-gray-600 text-justify "><strong>Reportes de Empleados: </strong> Este panel dispone de un menú
          desplegable que permite seleccionar un período, como "Mensual", y cuenta con un botón denominado "Generar
          Reporte", el cual permite obtener un informe detallado sobre el personal registrado.</li>
      

      </ul>

      <img src="../../assets/Img/Reportes-empleados.jpg" alt="" class="border-solid border-4 rounded-lg mt-4 ">


      <h2 class="text-gray-800 text-left text-xl  font-bold mt-2">RESPALDO DE LA BASE DE DATOS</h2>
      <p class="text-gray-600  text-sm mt-2 text-justify">
        En el menú, Respaldo se realizará una copia de seguridad de la base de datos.
        Al presionar 'Descargar Base de datos', se generará la copia de seguridad.

      </p>



      <img src="../../assets/Img/Respaldo.jpg" alt="" class="border-solid border-4 rounded-lg mt-4 ">

      <h2 class="text-gray-800 text-left text-xl  font-bold mt-2">BITÁCORA DE USUARIOS</h2>
      <p class="text-gray-600 text-sm mt-2 text-justify">
        La sección Bitácora De Usuarios del sistema proporciona una interfaz organizada y funcional que permite la
        consulta y gestión de los registros de los usuarios mediante una tabla principal que presenta información clave
        como el ID del usuario, el rol, la fecha de registro, el nombre y apellido, y el nombre de usuario, además de
        incluir una columna de acciones con botones diseñados para editar o eliminar registros directamente, en la parte
        superior derecha se encuentra el botón "Añadir Usuario", el cual facilita el registro manual de nuevos usuarios
        e incluye la configuración de una contraseña durante el proceso de registro, mientras que en la parte superior
        de la tabla se dispone de un campo de búsqueda que permite filtrar los registros según criterios específicos y
        un menú desplegable que ajusta la cantidad de entradas visibles, garantizando así un control eficiente y
        organizado de los usuarios registrados y ofreciendo herramientas prácticas para la gestión administrativa.

      </p>



      <img src="../../assets/Img/Bitacora-usuarios.jpg" alt="" class="border-solid border-4 rounded-lg mt-4 ">




    </div>

  </section>

  <script type="module" src="../../assets/js/flowbite.js" id="scripts"></script>
  <script>
    function imprimirSeccion() {
      // Clonar el contenido de la sección para manipularlo
      const seccion = document.querySelector('#section').cloneNode(true);

      // Remover el botón de imprimir del contenido clonado
      const botonImprimir = seccion.querySelector('#boton-imprimir');
      if (botonImprimir) {
        botonImprimir.remove();
      }

      // Ajustar el tamaño de las imágenes
      const imagenes = seccion.querySelectorAll('img');
      imagenes.forEach(img => {
        img.style.width = '100%'; // Ajusta el tamaño al 50% del original
        img.style.height = 'auto'; // Mantiene la proporción de aspecto
      });

      // Crear la ventana de impresión con el contenido modificado
      const ventanaImpresion = window.open('', '', 'height=600,width=800');
      ventanaImpresion.document.write('<html><head><title>Imprimir Manual de Usuario</title>');
      ventanaImpresion.document.write('</head><body>');
      ventanaImpresion.document.write(seccion.innerHTML);
      ventanaImpresion.document.write('</body></html>');
      ventanaImpresion.document.close();
      ventanaImpresion.print();
    }
  </script>
</body>

</html>