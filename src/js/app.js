document.addEventListener('DOMContentLoaded', function () {
    iniciarApp(); 
 });

function iniciarApp() {
    console.log('Iniciando app...');
    consultarApiCitas();
}

async function consultarApiCitas() {
    try {
        const url = '/api/citas';
        const resultado = await fetch(url);
        const citas = await resultado.json();
        console.log(citas);
        mostrarCitas(citas);
    } catch (error) {
        console.log(error);
    }
}

function mostrarCitas(citas){
   const tbody = document.querySelector('#tbody-citas');
   tbody.innerHTML = ''; // Limpiar el tbody antes de agregar las filas

   citas.forEach(cita => {
       const { id, estudiante, medico, programa, especialidad, fecha, hora, estado } = cita;

       const citaRow = document.createElement('TR');
       citaRow.classList.add('tr');
       citaRow.dataset.idCita = id;
       
       const citaEstudiante = document.createElement('TD');
       citaEstudiante.classList.add('td');
       citaEstudiante.textContent = estudiante.nombre;

       const citaPrograma = document.createElement('TD');
       citaPrograma.classList.add('td');
       citaPrograma.textContent = programa.nombre;

       const citaMedico = document.createElement('TD');
       citaMedico.classList.add('td');
       citaMedico.textContent = medico.nombre;

       const citaEspecialidad = document.createElement('TD');
       citaEspecialidad.classList.add('td');
       citaEspecialidad.textContent = especialidad.nombre;

       const citaFecha = document.createElement('TD');
       citaFecha.classList.add('td');
       citaFecha.textContent = fecha;

       const citaHora = document.createElement('TD');
       citaHora.classList.add('td');
       citaHora.textContent = hora;

       const citaEstado = document.createElement('TD');
       citaEstado.classList.add('td');
       if(estado == 1){
           citaEstado.classList.add('pendiente');
           citaEstado.textContent = 'pendiente';
       }else if(estado == 2){
           citaEstado.classList.add('atendida');
           citaEstado.textContent = 'atendida';
        }else if(estado == 3){
            citaEstado.classList.add('cancelada');
            citaEstado.textContent = 'cancelada';
        }

        const citaAcciones = document.createElement('TD');
        citaAcciones.classList.add('td');
        // Crear el formulario dinámicamente
        const formEliminar = document.createElement('FORM');
        formEliminar.method = 'POST';
        formEliminar.action = '/api/citas/eliminar';

        // Crear el input hidden para el ID de la cita
        const inputId = document.createElement('INPUT');
        inputId.type = 'hidden';
        inputId.name = 'id';
        inputId.value = cita.id;

        // Crear el botón de eliminar
        const btnEliminar = document.createElement('BUTTON');
        btnEliminar.textContent = 'Eliminar';
        btnEliminar.classList.add('btn-eliminar');
        btnEliminar.type = 'submit';
        btnEliminar.onclick = eliminarCita;

       citaRow.appendChild(citaEstudiante);
       citaRow.appendChild(citaPrograma);
       citaRow.appendChild(citaMedico);
       citaRow.appendChild(citaEspecialidad);
       citaRow.appendChild(citaFecha);
       citaRow.appendChild(citaHora);
       citaRow.appendChild(citaEstado);
       formEliminar.appendChild(inputId);
       formEliminar.appendChild(btnEliminar);

       // Agregar el formulario a la celda de acciones
       citaAcciones.appendChild(formEliminar);
       citaRow.appendChild(citaAcciones);

       tbody.appendChild(citaRow);
   });
}

function eliminarCita(event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

    const btnEliminar = event.target.closest('button');
    const citaRow = btnEliminar.closest('tr');
    const citaId = citaRow.dataset.idCita;

    // Eliminar la cita del DOM
    citaRow.remove();

    // Eliminar la cita del backend
    fetch(`/api/citas/eliminar`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: citaId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Cita eliminada correctamente');
        } else {
            console.error('Error al eliminar la cita:', data.message);
        }
    })
    .catch(error => {
        console.error('Error al eliminar la cita:', error);
    });
}