<?php

  include('../../Backend/auth/autenticación.php')

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="../../css/output.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/webfont/tabler-icons-outline.css">
    <link rel="icon" href="../../assets/Img/file.png">
    <title>Tablero Admin - Sistema de gestión de empleado</title>
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
          href="tablero-empleados.php"
          class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-100"
        >
        <i class="ti ti-layout-dashboard" style="font-size: 25px;"></i>
          <span class="ms-3">Tablero</span>
        </a>
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
          <span class="flex-1 ms-3 whitespace-nowrap">Cerrar Sesión</span>
        </a>
      </li>
      
    </ul>
  </div>
</aside>

    <section class="p-4 sm:ml-64" id="section">
      <div
        class="p-4  mt-14"
      >
        <div class="grid grid-cols-3 gap-4 mb-4">
          <div
            class="flex flex-start justify-start flex-col p-[10px] h-24 rounded bg-white border border-gray-200 text-gray-700 font-medium"
          >
            <div class="w-[100%] flex items-center justify-between">
               <p class="">Total de empleados</p>
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
          
              </div>
              <p class="font-bold" id="empleados">cargando..</p>
               
               








          </div>
  
          <div
            class="flex flex-start justify-start flex-col p-[10px] h-24 rounded bg-white border border-gray-200 text-gray-700 font-medium"
          >
            <div class="w-[100%] flex items-center justify-between">
               <p class="">Empleados activos</p>
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
               </svg>
            </div>
            <p class="font-bold text-green-500" id="empleados-activos">cargando..</p>
          </div>
          
          <div
            class="flex flex-start justify-start flex-col p-[10px] h-24 rounded bg-white border border-gray-200 text-gray-700 font-medium"
          >
            <div class="w-[100%] flex items-center justify-between">
               <p class="">Empleados inactivos</p>
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
               </svg>
            </div>
            <p class="font-bold text-red-500" id="empleados-inactivos">cargando..</p>
          </div>
        </div>
     
        <div class="grid grid-cols-2 gap-4 mb-4">
          <div
          class="flex items-center justify-center rounded bg-white border border-gray-200 h-[500px] p-[10px]" id="chart-container"
        >
          <p class="text-2xl text-gray-400 dark:text-gray-500">
            
          </p>
        </div>
          <div
            class="flex items-center justify-center rounded bg-white border border-gray-200 h-[500px] p-[10px]" id="main"
          >
            <p class="text-2xl text-gray-400 dark:text-gray-500">
              
            </p>
          </div>
        
          
        
        </div>
        </div>


    </section>
    <script src="../../assets/js/graficas.js"></script>
    <script src="../../assets/js/index.js"></script>
    <script type="module" src="../../assets/js/flowbite.js" id="scripts"></script>
 

  
  </body>
</html>