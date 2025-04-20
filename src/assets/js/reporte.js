function inicializarSelectores() {
    // Esta función ya no es necesaria pero la mantenemos por compatibilidad
}

async function generarPDF() {
    try {
        const tipoReporte = 'empleados';

        const response = await fetch(`../../Backend/reports/obtener-reportes.php?tipo_reporte=${tipoReporte}`);
        const data = await response.json();

        if (data.error) {
            alert(data.error);
            return;
        }

        if (data.mensaje) {
            alert(data.mensaje);
            return;
        }

        if (!Array.isArray(data)) {
            console.error('Los datos recibidos no son un array:', data);
            alert("Error en el formato de datos recibidos");
            return;
        }

        const { jsPDF } = window.jspdf;
        if (!jsPDF) {
            console.error('jsPDF no está definido');
            alert("Error: librería PDF no cargada correctamente");
            return;
        }

        const doc = new jsPDF({
            orientation: 'landscape',
            unit: 'mm',
            format: 'a4'
        });

        doc.setFillColor(0, 51, 153);
        doc.rect(0, 0, 297, 25, 'F');
        doc.setFont('helvetica', 'bold');
        doc.setFontSize(20);
        doc.setTextColor(255, 255, 255);
        doc.text(`Reporte de EMPLEADOS`, 15, 15);

        doc.setFont('helvetica', 'normal');
        doc.setFontSize(12);
        doc.setTextColor(80, 80, 80);
        doc.text(`Reporte completo`, 15, 35);
        doc.text(`Fecha de generación: ${new Date().toLocaleDateString()}`, 15, 42);

        if (data.length > 0) {
            let y = 55;
            generarTablaEmpleados(doc, data, y);
        }

        const nombreArchivo = `Reporte_Empleados_${new Date().toISOString().split('T')[0]}.pdf`;
        doc.save(nombreArchivo);

    } catch (error) {
        console.error('Error detallado:', error);
        alert("Error al generar el reporte: " + error.message);
    }
}

function generarTablaEmpleados(doc, data, startY) {
    const headers = ['Nombre', 'Cédula', 'Puesto', 'Departamento', 'Ingreso', 'Estado'];
    const columnWidths = [60, 35, 50, 50, 40, 42];
    generarTablaGenerica(doc, data, headers, columnWidths, startY);
}

function generarTablaGenerica(doc, data, headers, columnWidths, startY) {
    let y = startY;
    let currentX = 15;

    doc.setFillColor(240, 240, 240);
    doc.rect(10, y - 7, 277, 10, 'F');
    doc.setFont('helvetica', 'bold');
    doc.setTextColor(60, 60, 60);
    doc.setFontSize(10);

    headers.forEach((header, index) => {
        doc.text(header.toUpperCase(), currentX, y);
        currentX += columnWidths[index];
    });

    doc.setFont('helvetica', 'normal');
    doc.setTextColor(0, 0, 0);
    y += 10;

    data.forEach((row, rowIndex) => {
        if (y > 180) {
            doc.addPage();
            y = 30;
        }

        if (rowIndex % 2 === 0) {
            doc.setFillColor(249, 249, 249);
            doc.rect(10, y - 7, 277, 10, 'F');
        }

        currentX = 15;
        Object.values(row).forEach((value, index) => {
            let texto = String(value);
            if (texto.length > 25) {
                texto = texto.substring(0, 22) + '...';
            }
            doc.text(texto, currentX, y);
            currentX += columnWidths[index];
        });
        y += 10;
    });
}

document.addEventListener('DOMContentLoaded', inicializarSelectores);