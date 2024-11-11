
function fillContainer(data) {
    const contenedor = document.getElementById('container');
    contenedor.innerHTML = '';

    data.forEach((curso) => {

        const src = `/cursoImagen?id=${curso.ID_curso}`;

        const col = document.createElement('div');
        col.classList.add('col', 'mb-4');
        col.innerHTML = `
            <div class="card curso h-100 m-auto" onclick="toClass()">
                <img src="${src}" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <p>${curso.n_estudiantes} estudiantes</p>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <p>${curso.calificacion}</p>
                            <img class="estrella" src="images/estrella.png">
                        </div>
                    </div>
                    <h6>${curso.titulo}</h6>
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <p>Por ${curso.nombres + " " + curso.apellido_paterno + " " + curso.apellido_materno }</p>
                        </div>
                        <div class="col precio justify-content-end">
                            $${curso.precio}
                        </div>
                    </div>
                </div>
            </div>
        `;
        contenedor.appendChild(col);
    });
}

function changeFilterBy(filter) {
    document.getElementById('searched-for').innerHTML = "Todos los cursos";
    fetch('/dashboardCursos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ filterBy: filter })
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        fillContainer(data);
    })
    .catch(error => console.error('Error:', error));
}
function searchByType(type, query) {
    document.getElementById('searched-for').innerHTML = "Resultados de búsqueda en " + type + ": " + query;
    fetch('/dashboardCursosBusqueda', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ searchType: type, searchQuery: query })
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        fillContainer(data);
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', function() {
    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    const searchType = urlParams.get('type');
    const searchQuery = urlParams.get('query');

    if (searchType && searchQuery) {
        searchByType(searchType, searchQuery);
    } else {
        changeFilterBy('todos');
    }
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
