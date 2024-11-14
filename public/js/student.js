cursos = [];

document.addEventListener('DOMContentLoaded', function() {
    changeFilterBy('todos');
    document.getElementById('startDate').addEventListener('change', handleDateChange);
    document.getElementById('endDate').addEventListener('change', handleDateChange);
});

function handleDateChange() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    
    if (startDate && endDate) {
        const dateRange = `${startDate}_${endDate}`;
        changeFilterBy(dateRange);
    }
}

function changeFilterBy(filter) {
    fetch('/studentCursos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ filterBy: filter })
    })
    .then(response => response.json())
    .then(data => {
        cursos = data;
        fillContainer(data);
    })
    .catch(error => console.error('Error:', error));
}

function fillContainer(data) {
    const contenedor = document.getElementById('contenedorCursos');
    contenedor.innerHTML = '';

    data.forEach((curso, index) => {
        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'btn level';
        button.dataset.toggle = 'collapse';
        button.dataset.target = `#lesson${index}`;
        button.innerHTML = `
            <div class="row profile-course d-flex justify-content-between"> 
                <p class="flex-grow-1 bd-highlight">${curso.titulo}</p>
                <p class="pr-2 bd-highlight categoria">Categoría:</p>
                <p class="bd-highlight mr-4">${curso.categoria}</p>
            </div>
        `;
        contenedor.appendChild(button);

        const collapse = document.createElement('div');
        collapse.id = `lesson${index}`;
        collapse.className = 'collapse';
        collapse.innerHTML = `
            <div class="row d-flex bd-highlight">
                <p class="text p-0 ml-3 bd-highlight">Progreso del curso: </p>
                <p class="data p-0 ml-2 bd-highlight"><strong>${curso.progreso}%</strong></p>
                <p class="ml-auto p-0 mr-5 bd-highlight"><strong>${curso.terminado ? 'Completado' : 'En progreso'}</strong></p>
            </div>
            <div class="row">
                <div class="progress ml-3" style="width: 93%;">
                    <div class="progress-bar" role="progressbar" style="width: ${curso.progreso}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="row d-flex bd-highlight mt-2">
                <p class="text p-0 ml-3 bd-highlight">Fecha de inscripción: </p>
                <p class="data p-0 ml-2 bd-highlight">${formatDate(curso.f_inscripcion)}</p>
            </div>
            <div class="row d-flex bd-highlight">
                <p class="text p-0 ml-3 bd-highlight">${curso.terminado ? 'Fecha de terminación:' : 'Última fecha de ingreso:'}</p>
                <p class="data p-0 ml-2 bd-highlight">${curso.terminado ? formatDate(curso.f_completado) : formatDate(curso.f_ultimasesion) }</p>
            </div>
            ${curso.terminado ?
            `<div class="row d-flex bd-highlight">
                <a class="text p-0 ml-3 bd-highlight" onclick="seeDegree(${curso.ID_curso},${curso.ID_estudiante})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                    </svg>
                    Ver diploma</a>
            </div>
            ` : 
            ``
            }
            <a onclick="toClass(${curso.ID_curso})">Ver Curso</a>
        `;
        contenedor.appendChild(collapse);
    
    });
}

function formatDate(dateString) {
    if (!dateString) return '';
    const date = new Date(dateString);
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-based
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
}

function seeDegree(ID_curso, ID_estudiante) {
    try {
        fetch('/diplomas/diploma_' + ID_curso + '_' + ID_estudiante + '.pdf')
        .then(response => {
            if (!response.ok) {
                if (response.status === 404) {
                    alertCustom('El docente no ha generado el diploma. Por favor, contacte al docente.');
                } else {
                    alertCustom('Hubo un error al intentar obtener el diploma.');
                }
                throw new Error('File not found');
            }
            return response.blob();
        })
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            window.open(url);
        })
        .catch(error => {
            console.error('Error fetching PDF:', error);
        });
    } catch (error) {
        alertCustom('Hubo un problema al solicitar el diploma. Intenta nuevamente más tarde.');
    }
}
