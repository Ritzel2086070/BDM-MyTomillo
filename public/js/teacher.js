cursos = [];
function filterCursos() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const filteredUsersCursos = cursos.filter(curso => {
        return curso.titulo.toLowerCase().includes(searchTerm);
    });
    fillContainer(filteredUsersCursos);
}
function filterCursos2() {
    const searchTerm = document.getElementById('searchInput2').value.toLowerCase();
    const filteredUsersCursos = cursos.filter(curso => {
        return curso.titulo.toLowerCase().includes(searchTerm);
    });
    fillContainer2(filteredUsersCursos);
}


function fillContainer(data) {
    const contenedor = document.getElementById('contenedorCursos');
    contenedor.innerHTML = '';

    data.forEach((curso, index) => {
    const row = document.createElement('div');
    row.className = 'row ml-0 mr-0';
    row.style.backgroundColor = '#130924';

    const col = document.createElement('div');
    col.className = 'col-12 d-flex justify-content-start align-items-center d-flex bd-highlight';

    const label = document.createElement('label');
    label.className = 'd-flex bulgy-checkboxes justify-content-start align-items-center p-2 bd-highlight';
    label.style.padding = '0rem';
    label.style.width = '2.21rem';

    const input = document.createElement('input');
    input.type = 'checkbox';
    input.name = 'options';

    const span = document.createElement('span');
    span.className = 'checkbox';
    span.style.margin = '0rem';

    label.appendChild(input);
    label.appendChild(span);

    const button = document.createElement('button');
    button.type = 'button';
    button.className = 'btn level p-2 flex-grow-1 bd-highlight';
    button.dataset.toggle = 'collapse';
    button.dataset.target = `#lesson${index + 1}`;
    button.innerHTML = `<p class="flex-grow-1 pl-4">${curso.titulo}</p>`;

    const profileCourse = document.createElement('div');
    profileCourse.className = 'profile-course d-flex justify-content-end ml-auto bd-highlight';

    const a = document.createElement('a');
    a.className = 'categoria p-0';
    a.style.height = '50%';
    a.innerHTML = 'Editar';
    a.onclick = function() {
        const form = document.createElement('form');
        form.action = '/editar_curso';
        form.method = 'POST';
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id';
        input.value = curso.ID_curso;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    };

    profileCourse.appendChild(a);

    const profileCourse2 = document.createElement('div');
    profileCourse2.className = 'profile-course d-flex align-items-center ml-auto bd-highlight';

    const a2 = document.createElement('a');
    a2.className = 'mx-2 pl-5';
    a2.style.height = '50%';
    a2.innerHTML = 'Borrar';
    a2.onclick = function() {
        const form = document.createElement('form');
        form.action = '/borrar_curso';
        form.method = 'POST';
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id';
        input.value = curso.ID_curso;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    };

    profileCourse2.appendChild(a2);

    col.appendChild(label);
    col.appendChild(button);
    col.appendChild(profileCourse);
    col.appendChild(profileCourse2);

    row.appendChild(col);
    contenedor.appendChild(row);

    /*
    <div class="row ml-0 mr-0" style="background-color: #130924;">
        <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
            <label class="d-flex bulgy-checkboxes justify-content-start align-items-center p-2 bd-highlight" style="padding: 0rem; width: 2.21rem;">
                <input type="checkbox" name="options"/>
                <span class="checkbox" style="margin: 0rem;"></span>
            </label>
            <button type="button" class="btn level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson1">
                <p class="flex-grow-1 pl-4">Aprende a crear tu web desde cero con HTML y CSS</p>
            </button>
            <div class="profile-course d-flex justify-content-end ml-auto bd-highlight">
                <a href="/editar_curso" class="categoria p-0" style="height: 50%;">Editar</a>
            </div>
            <div class="profile-course d-flex align-items-center ml-auto bd-highlight">
                <a onclick="borrarCurso()" class="mx-2 pl-5" style="height: 1.5rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    */

    const collapse = document.createElement('div');
    collapse.id = `lesson${index + 1}`;
    collapse.className = 'collapse';

    const row1 = document.createElement('div');
    row1.className = 'row d-flex bd-highlight';

    const p1 = document.createElement('p');
    p1.className = 'text p-0 ml-3 bd-highlight';
    p1.innerHTML = 'Categoría: ';

    const p2 = document.createElement('p');
    p2.className = 'data p-0 ml-2 bd-highlight';
    p2.innerHTML = curso.categoria;

    row1.appendChild(p1);
    row1.appendChild(p2);

    const row2 = document.createElement('div');
    row2.className = 'row d-flex bd-highlight';

    const p3 = document.createElement('p');
    p3.className = 'text p-0 ml-3 bd-highlight';
    p3.innerHTML = 'Alumnos inscritos: ';

    const p4 = document.createElement('p');
    p4.className = 'data p-0 ml-2 bd-highlight';
    p4.innerHTML = curso.n_estudiantes;

    row2.appendChild(p3);
    row2.appendChild(p4);

    const row3 = document.createElement('div');
    row3.className = 'row d-flex bd-highlight';

    const p5 = document.createElement('p');
    p5.className = 'text p-0 ml-3 bd-highlight';
    p5.innerHTML = 'Promedio que ha cursado cada alumno:';

    const p6 = document.createElement('p');
    p6.className = 'data p-0 ml-2 bd-highlight';
    p6.innerHTML = curso.promedio;

    row3.appendChild(p5);
    row3.appendChild(p6);

    const row4 = document.createElement('div');
    row4.className = 'row d-flex bd-highlight';

    const p7 = document.createElement('p');
    p7.className = 'text p-0 ml-3 bd-highlight';
    p7.innerHTML = 'Ingresos generados:';

    const p8 = document.createElement('p');
    p8.className = 'data p-0 ml-2 bd-highlight';
    p8.innerHTML = `$${curso.total_pagado} MXN`;

    row4.appendChild(p7);
    row4.appendChild(p8);

    collapse.appendChild(row1);
    collapse.appendChild(row2);
    collapse.appendChild(row3);
    collapse.appendChild(row4);

    contenedor.appendChild(collapse);

    /*
    <div id="lesson1" class="collapse">
        <div class="row d-flex bd-highlight">
            <p class="text p-0 ml-3 bd-highlight">Categoría: </p>
            <p class="data p-0 ml-2 bd-highlight">Web</p>
        </div>
        <div class="row d-flex bd-highlight">
            <p class="text p-0 ml-3 bd-highlight">Alumnos inscritos: </p>
            <p class="data p-0 ml-2 bd-highlight">75</p>
        </div>
        <div class="row d-flex bd-highlight">
            <p class="text p-0 ml-3 bd-highlight">Promedio que ha cursado cada alumno:</p>
            <p class="data p-0 ml-2 bd-highlight">60</p>
        </div>
        <div class="row d-flex bd-highlight">
            <p class="text p-0 ml-3 bd-highlight">Ingresos generados:</p>
            <p class="data p-0 ml-2 bd-highlight">$20,000.00 MXN</p>
        </div>
    </div>
    */
    });
}

function fillContainer2(data) {
    const contenedor = document.getElementById('contenedorCursos2');
    contenedor.innerHTML = '';

    let currentCursoID = null;
    data.forEach((row, index) => {
        if (row.ID_curso !== currentCursoID) {
            currentCursoID = row.ID_curso;

            const row1 = document.createElement('div');
            row1.className = 'row ml-0 mr-0';
            row1.style.backgroundColor = '#130924';

            const col1 = document.createElement('div');
            col1.className = 'col-12 d-flex justify-content-start align-items-center d-flex bd-highlight';

            const label1 = document.createElement('label');
            label1.className = 'd-flex bulgy-checkboxes justify-content-start align-items-center p-2 bd-highlight';
            label1.style.padding = '0rem';
            label1.style.width = '2.21rem';

            const input1 = document.createElement('input');
            input1.type = 'checkbox';
            input1.name = 'options';

            const span1 = document.createElement('span');
            span1.className = 'checkbox';
            span1.style.margin = '0rem';

            label1.appendChild(input1);
            label1.appendChild(span1);

            const button1 = document.createElement('button');
            button1.type = 'button';
            button1.className = 'btn level p-2 flex-grow-1 bd-highlight';
            button1.dataset.toggle = 'collapse';
            button1.dataset.target = `#lesson${row.ID_curso}`;
            button1.innerHTML = `<p class="flex-grow-1 pl-4">${row.titulo}</p>`;
            
            const profileCourse1 = document.createElement('div');
            profileCourse1.className = 'profile-course d-flex justify-content-end ml-auto bd-highlight';

            const a1 = document.createElement('a');
            a1.className = 'categoria p-0';
            a1.style.height = '50%';
            a1.innerHTML = 'Editar';
            a1.onclick = function() {
                const form = document.createElement('form');
                form.action = '/editar_curso';
                form.method = 'POST';
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'id';
                input.value = row.ID_curso;
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            };

            profileCourse1.appendChild(a1);

            const profileCourse2 = document.createElement('div');
            profileCourse2.className = 'profile-course d-flex align-items-center ml-auto bd-highlight';

            const a2 = document.createElement('a');
            a2.className = 'mx-2 pl-5';
            a2.style.height = '50%';
            a2.innerHTML = 'Borrar';
            a2.onclick = function() {
                const form = document.createElement('form');
                form.action = '/borrar_curso';
                form.method = 'POST';
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'id';
                input.value = row.ID_curso;
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            };

            profileCourse2.appendChild(a2);

            col1.appendChild(label1);
            col1.appendChild(button1);
            col1.appendChild(profileCourse1);
            col1.appendChild(profileCourse2);

            row1.appendChild(col1);
            contenedor.appendChild(row1);

            const collapse = document.createElement('div');
            collapse.id = `lesson${row.ID_curso}`;
            collapse.className = 'collapse pl-2';

            const table = document.createElement('table');
            table.className = 'table table-striped';

            const thead = document.createElement('thead');
            const tr = document.createElement('tr');

            const th1 = document.createElement('th');
            th1.scope = 'col';
            th1.innerHTML = 'Alumno';

            const th2 = document.createElement('th');
            th2.scope = 'col';
            th2.innerHTML = 'Inscripción';
            
            const th3 = document.createElement('th');
            th3.scope = 'col';
            th3.innerHTML = 'Nivel de avance';

            const th4 = document.createElement('th');
            th4.scope = 'col';
            th4.innerHTML = 'Pago';

            const th5 = document.createElement('th');
            th5.scope = 'col';
            th5.innerHTML = 'Forma de pago';

            const th6 = document.createElement('th');
            th6.scope = 'col';
            th6.innerHTML = 'Generar diploma';

            tr.appendChild(th1);
            tr.appendChild(th2);
            tr.appendChild(th3);
            tr.appendChild(th4);
            tr.appendChild(th5);
            tr.appendChild(th6);

            thead.appendChild(tr);
            table.appendChild(thead);

            const tbody = document.createElement('tbody');
            tbody.id = `tbody${row.ID_curso}`;
            table.appendChild(tbody);

            collapse.appendChild(table);
            contenedor.appendChild(collapse);

            if (row.tipo_pago !== null){
                const tr2 = document.createElement('tr');

                const td1 = document.createElement('td');
                td1.innerHTML = row.nombres + ' ' + row.apellido_paterno + ' ' + row.apellido_materno;

                const td2 = document.createElement('td');
                td2.innerHTML = formatDate(row.f_inscripcion);

                const td3 = document.createElement('td');
                td3.className = 'd-flex bd-highlight justify-content-center';
                const div = document.createElement('div');
                div.className = 'progress mr-2';
                div.style.width = '80%';
                const div2 = document.createElement('div');
                div2.className = 'progress-bar';
                div2.role = 'progressbar';
                div2.style.width = parseInt(row.progreso) + '%';
                div2.ariaValuenow = parseInt(row.progreso);
                div2.ariaValuemin = '0';
                div2.ariaValuemax = '100';
                div.appendChild(div2);
                td3.appendChild(div);

                const td4 = document.createElement('td');
                td4.innerHTML = `$${row.total_pagado} MXN`;

                const td5 = document.createElement('td');
                if(row.tipo_pago == '1') {
                    td5.innerHTML = 'Completo';
                } else {
                    td5.innerHTML = 'Por nivel';
                }

                const td6 = document.createElement('td');

                const button = document.createElement('button');
                button.className = 'btn sub-btn btn-block m-0';
                button.style.width = '90%';
                if(row.terminado == 1){
                    button.disabled = false;
                } else {
                    button.disabled = true;
                }
                button.innerHTML = 'Generar diploma';

                td6.appendChild(button);

                tr2.appendChild(td1);
                tr2.appendChild(td2);
                tr2.appendChild(td3);
                tr2.appendChild(td4);
                tr2.appendChild(td5);
                tr2.appendChild(td6);

                tbody.appendChild(tr2);
            }
            /*
            <div class="row ml-0 mr-0" style="background-color: #130924;">
                <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
                    <label class="d-flex bulgy-checkboxes justify-content-start align-items-center p-2 bd-highlight" style="padding: 0rem; width: 2.21rem;">
                        <input type="checkbox" name="options"/>
                        <span class="checkbox" style="margin: 0rem;"></span>
                    </label>
                    <button type="button" class="btn level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson10">
                        <p class="flex-grow-1 pl-4">Aprende a crear tu web desde cero con HTML y CSS</p>
                    </button>
                    <div class="profile-course d-flex justify-content-end ml-auto bd-highlight">
                        <a href="" class="categoria p-0" style="height: 50%;">Editar</a>
                    </div>
                    <div class="profile-course d-flex align-items-center ml-auto bd-highlight">
                        <a href="" class="mx-2 pl-5" style="height: 1.5rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div id="lesson10" class="collapse pl-2">

                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Alumno</th>
                        <th scope="col">Inscripción</th>
                        <th scope="col">Nivel de avance</th>
                        <th scope="col">Pago</th>
                        <th scope="col">Forma de pago</th>
                        <th scope="col">Generar diploma</th>
                        </tr>
                    </thead>
                    
                </table>
            </div>
            */
        } else {
            const tbody = document.getElementById(`tbody${row.ID_curso}`);

            const tr = document.createElement('tr');

            const td1 = document.createElement('td');
            td1.innerHTML = row.nombres + ' ' + row.apellido_paterno + ' ' + row.apellido_materno;

            const td2 = document.createElement('td');
            td2.innerHTML = formatDate(row.f_inscripcion);

            const td3 = document.createElement('td');
            td3.className = 'd-flex bd-highlight justify-content-center';
            const div = document.createElement('div');
            div.className = 'progress mr-2';
            div.style.width = '80%';
            const div2 = document.createElement('div');
            div2.className = 'progress-bar';
            div2.role = 'progressbar';
            div2.style.width = parseInt(row.progreso) + '%';
            div2.ariaValuenow = parseInt(row.progreso);
            div2.ariaValuemin = '0';
            div2.ariaValuemax = '100';
            div.appendChild(div2);
            td3.appendChild(div);

            const td4 = document.createElement('td');
            td4.innerHTML = `$${row.total_pagado} MXN`;

            const td5 = document.createElement('td');
            if(row.tipo_pago === '1') {
                td5.innerHTML = 'Completo';
            } else {
                td5.innerHTML = 'Por nivel';
            }

            const td6 = document.createElement('td');

            const button = document.createElement('button');
            button.className = 'btn sub-btn btn-block m-0';
            button.style.width = '90%';
            if(row.terminado == 1){
                button.disabled = false;
            } else {
                button.disabled = true;
            }
            button.innerHTML = 'Generar diploma';

            td6.appendChild(button);

            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
            tr.appendChild(td5);
            tr.appendChild(td6);

            tbody.appendChild(tr);


            /*
                <tr>
                <td>Heber Abiel Perez Jimenez</td>
                <td>24/12/2023</td>
                <td class="d-flex bd-highlight justify-content-center">
                    <div class="progress mr-2" style="width: 80%;">
                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    75%
                </td>
                <td>$500.00 MXN</td>
                <td>Efectivo</td>
                <td>
                    <button class="btn sub-btn btn-block m-0" style="width: 90%;" disabled>Generar diploma</button>
                </td>
                </tr>
                <tr>
                <td>Marla Judith Estrada Valdez</td>
                <td>24/12/2023</td>
                <td class="d-flex bd-highlight justify-content-center">
                    <div class="progress mr-2" style="width: 80%;">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    100%
                </td>
                <td>$500.00 MXN</td>
                <td>Efectivo</td>
                <td>
                    <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="createDegree()">Generar diploma</button>
                </td>
                </tr>
                <tr>
                <td>Carlos Daniel Pinkus Martinez</td>
                <td>24/12/2023</td>
                <td class="d-flex bd-highlight justify-content-center">
                    <div class="progress mr-2" style="width: 80%;">
                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    75%
                </td>
                <td>$500.00 MXN</td>
                <td>Efectivo</td>
                <td>
                    <button class="btn sub-btn btn-block m-0" style="width: 90%;" disabled>Generar diploma</button>
                </td>
                </tr>
            */
        }
    });
}

function formatDate(dateString) {
    const date = new Date(dateString);
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-based
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
}

function changeFilterBy(filter) {
    fetch('/teacherCursos', {
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
function changeFilterBy2(filter) {
    fetch('/teacherCursosAlumnos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ filterBy: filter })
    })
    .then(response => response.json())
    .then(data => {
        cursos = data;
        fillContainer2(data);
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', function() {
    changeFilterBy('todos');
    changeFilterBy2('todos');
    document.getElementById('startDate').addEventListener('change', handleDateChange);
    document.getElementById('endDate').addEventListener('change', handleDateChange);
    document.getElementById('startDate2').addEventListener('change', handleDateChange2);
    document.getElementById('endDate2').addEventListener('change', handleDateChange2);
});

function handleDateChange() {
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    
    if (startDate && endDate) {
        const dateRange = `${startDate}_${endDate}`;
        changeFilterBy(dateRange);
    }
}

function handleDateChange2() {
    const startDate = document.getElementById('startDate2').value;
    const endDate = document.getElementById('endDate2').value;
    
    if (startDate && endDate) {
        const dateRange = `${startDate}_${endDate}`;
        changeFilterBy2(dateRange);
    }
}

function changeTipoPago2(tipo) {
    const p2 = document.getElementById('TotalIngresos2');
    fetch('/teacherIngresos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ tipo_pago: tipo })
    })
    .then(response => response.json())
    .then(data => {
        if(!data.total){
            p2.innerHTML = `$0 MXN`;
        } else {
            p2.innerHTML = `$${data.total} MXN`;
        }
    })
    .catch(error => console.error('Error:', error));
}

function changeTipoPago1(tipo) {
    const p2 = document.getElementById('TotalIngresos1');
    fetch('/teacherIngresos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ tipo_pago: tipo })
    })
    .then(response => response.json())
    .then(data => {
        if(!data.total){
            p2.innerHTML = `$0 MXN`;
        } else {
            p2.innerHTML = `$${data.total} MXN`;
        }
    })
    .catch(error => console.error('Error:', error));
}


function createDegree(){
    Swal.fire({
        color: '#ccc',
        background: '#2D2D2D',
        title: "Entregar diploma",
        text: "Al haber concluído su curso, el alumno puede recibir un diploma",
        imageUrl:"DiplomaBDM.png",
        imageWidth: 400,
        imageHeight: 300,
        imageAlt: "Diploma",
        customClass: {
            confirmButton: 'confirm-button-class',
            title: 'title-class',
        }
    });
}