var dom1 = document.getElementById('chart-container');
var myChart1 = echarts.init(dom1, null, {
  renderer: 'canvas',
  useDirtyRect: false
});

var dom2 = document.getElementById('main');
var graficaIngreso = echarts.init(dom2, null, {
  renderer: 'canvas',
  useDirtyRect: false
});

fetch('../../Backend/graficas/index.php')
  .then(response => response.json()) 
  .then(data => {
    const datos = document.querySelector('#empleados');
    const datosActivos = document.querySelector('#empleados-activos');
    const datosInactivos = document.querySelector('#empleados-inactivos');
    
    const totalEmpleados = data.totalEmpleados;
    const empleadosActivos = data.empleadosActivos;
    const empleadosInactivos = data.empleadosInactivos;

    datos.textContent = `${totalEmpleados}`;
    
    if (datosActivos) {
      datosActivos.textContent = `${empleadosActivos}`;
    }
    
    if (datosInactivos) {
      datosInactivos.textContent = `${empleadosInactivos}`;
    }
    
    var option1 = {
      title: {
        text: 'Distribución de Empleados por Departamento',
        top: 'top',
        left: 'center',
        textStyle: {
          color: '#475569',
          fontSize: 20,
          fontWeight: 'bold'
        },
        padding: [15, 0, 0, 0]
      },
      xAxis: {
        type: 'category',
        data: data.departamentos,
        axisLabel: {
          interval: 0, 
          rotate: 30, 
          fontSize: 12, 
          color: '#475569', 
          formatter: function (value) {
            return value.length > 10 ? value.substring(0, 10) + '...' : value;
          }
        },
        axisLine: {
          lineStyle: {
            color: '#a1a1aa' 
          }
        }
      },
      yAxis: {
        type: 'value',
        axisLabel: {
          fontSize: 12, 
          color: '#475569' 
        },
        axisLine: {
          lineStyle: {
            color: '#a1a1aa' 
          }
        }
      },
      series: [
        {
          data: data.totales,
          type: 'bar',
          color: '#a1a1aa',
          label: {
            show: true,
            position: 'top', 
            fontSize: 12,
            color: '#475569' 
          },
          itemStyle: {
            emphasis: {
              color: '#64748b'
            },
            borderColor: '#e2e8f0', 
            borderWidth: 1, 
            shadowColor: 'rgba(0, 0, 0, 0.1)', 
            shadowBlur: 10 
          },
          animationDuration: 1000 
        }
      ],
      tooltip: {
        trigger: 'axis',
        backgroundColor: '#f8fafc', 
        borderColor: '#e2e8f0', 
        borderWidth: 1,
        textStyle: {
          color: '#475569'
        },
        formatter: function (params) {
          var name = params[0].name;
          var value = params[0].value;
          return `<strong style="color: #475569;">${name}</strong>: ${value} empleados`; 
        }
      },
      grid: {
        left: '10%', 
        right: '10%',
        bottom: '15%',
        top: '20%'
      }
    };

    if (option1 && typeof option1 === 'object') {
      myChart1.setOption(option1);
    }

    // Gráfica de empleados activos vs inactivos
    var opcionesEmpleadosActivos = {
      title: {
        text: 'Empleados Activos vs Inactivos',
        left: 'center',
        textStyle: {
          color: '#475569',
          fontSize: 20,
          fontWeight: 'bold'
        },
        padding: [15, 0, 0, 0]
      },
      tooltip: {
        trigger: 'item',
        backgroundColor: '#f8fafc',
        borderColor: '#e2e8f0',
        borderWidth: 1,
        textStyle: {
          color: '#475569'
        },
        formatter: '{b}: {c} empleados ({d}%)'
      },
      series: [{
        type: 'pie',
        radius: '50%',
        data: [
          { value: data.empleadosActivos, name: 'Activos' },
          { value: data.empleadosInactivos, name: 'Inactivos' }
        ],
        label: {
          color: '#475569',
          fontSize: 14,
          formatter: '{b}: {c} ({d}%)'
        },
        color: ['#22c55e', '#ef4444'],
        itemStyle: {
          emphasis: {
            shadowBlur: 10,
            shadowOffsetX: 0,
            shadowColor: 'rgba(0, 0, 0, 0.1)'
          }
        }
      }],
      grid: {
        left: '10%', 
        right: '10%',
        bottom: '15%',
        top: '20%'
      }
    };

    graficaIngreso.setOption(opcionesEmpleadosActivos);

    window.addEventListener('resize', () => {
      myChart1.resize();
      graficaIngreso.resize(); 
    });
  })
  .catch(error => {
    console.error('Error al obtener los datos:', error); 
  });
