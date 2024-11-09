window.onload = function() {
    let checkbox = document.getElementById('checkbox-gratis');
    let precioInput = document.getElementById('inputPrecio');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            precioInput.value = 0;
            precioInput.readOnly = true;
        } else {
            precioInput.readOnly = false;
        }
    });

    document.getElementById('file').addEventListener('change', function(event) {
        const file = event.target.files[0];
    
        if (!file) {
            alertCustom("Por favor, selecciona una imagen.");
            return;
        }
    
        const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!validImageTypes.includes(file.type)) {
            alertCustom("Solo se permiten imágenes en formato JPG o PNG.");
            event.target.value = '';
            return;
        }
    
        const img = new Image();
        img.src = URL.createObjectURL(file);
    
        img.onload = function() {
            const width = img.width;
            const height = img.height;
    
            if (width !== 300 || height !== 200) {
                alertCustom("La imagen debe ser de 300x200 píxeles.");
                event.target.value = '';
                return;
            }
        };
    
        img.onerror = function() {
            alertCustom("Error al cargar la imagen.");
            event.target.value = '';
        };

        document.getElementById('preview-image').src = URL.createObjectURL(file);
    });

    document.getElementById('addAprendizajeBtn').addEventListener('click', function() {
        const newAprendizaje = document.createElement('input');
        newAprendizaje.type = 'text';
        newAprendizaje.name = 'aprendizajes[]';  // Use [] to submit as an array
        newAprendizaje.classList.add('form-control', 'mt-2');
        newAprendizaje.placeholder = 'Lección concreta que aprenderá el alumno. Ejemplo: “Crear tu propia página”';
    
        const aprendizajesContainer = document.getElementById('aprendizajesContainer');
        aprendizajesContainer.appendChild(newAprendizaje);
    });

    //TO DO : no hay coso para eliminar aprendizajes
    document.getElementById('NumNiveles').addEventListener('change', function() {
        const numNiveles = parseInt(this.value);
        const nivelesContainer = document.getElementById('levels-container');
        nivelesContainer.innerHTML = '';

        const header = document.createElement('div');
        header.classList.add('header', 'd-flex', 'flex-wrap', 'justify-content-between');
        const headerTitle = document.createElement('p');
        headerTitle.textContent = numNiveles + ' Niveles';

        header.appendChild(headerTitle);
        nivelesContainer.appendChild(header);

        for (let i = 1; i <= numNiveles; i++) {
            const row = document.createElement('div');
            row.classList.add('row', 'ml-0', 'mr-0');
            row.style.backgroundColor = '#130924';

            const col = document.createElement('div');
            col.classList.add('col-12', 'd-flex', 'justify-content-start', 'align-items-center', 'd-flex', 'bd-highlight');
            
            const button = document.createElement('button');
            button.type = 'button';
            button.classList.add('btn', 'btn-block', 'level', 'p-2', 'flex-grow-1', 'bd-highlight');
            button.dataset.toggle = 'collapse';
            button.dataset.target = '#lesson' + i;

            const p = document.createElement('p');
            p.classList.add('flex-grow-1', 'pl-4');
            p.textContent = 'Nivel ' + i;

            const nombreNivelInput = document.createElement('input');
            nombreNivelInput.type = 'hidden';
            nombreNivelInput.name = `NombreNivel[]`;
            nivelesContainer.appendChild(nombreNivelInput);

            const precioNivelInput = document.createElement('input');
            precioNivelInput.type = 'hidden';
            precioNivelInput.name = `PrecioNivel[]`;
            nivelesContainer.appendChild(precioNivelInput);

            if(localStorage.getItem(`NombreNivel_${i}`)){
                p.textContent = localStorage.getItem(`NombreNivel_${i}`);
                nombreNivelInput.value = localStorage.getItem(`NombreNivel_${i}`);
                precioNivelInput.value = localStorage.getItem(`PrecioNivel_${i}`);

            }
            

            button.appendChild(p);

            const profileCourse = document.createElement('div');
            profileCourse.classList.add('profile-course', 'd-flex', 'justify-content-end', 'ml-auto', 'bd-highlight');

            const edit = document.createElement('a');
            edit.href = '/nueva_clase';
            edit.classList.add('categoria', 'p-0');
            edit.style.height = '50%';
            edit.textContent = 'Editar';
            edit.onclick = function() {
                localStorage.setItem('nombreCurso', $("#inputNombreCurso").val().trim());
                localStorage.setItem('selectedCategory', document.getElementById('categoryDropdown').textContent);
                localStorage.setItem('precio', $("#inputPrecio").val().trim());
                localStorage.setItem('descripcion', $("#inputDescripcion").val().trim());
                localStorage.setItem('numNiveles', numNiveles);
                const aprendizajesInputs = document.querySelectorAll("input[name='aprendizajes[]']");
                let aprendizajes = [];
                aprendizajesInputs.forEach(input => {
                    aprendizajes.push(input.value.trim());
                });
                localStorage.setItem('aprendizajes', JSON.stringify(aprendizajes));
            
                localStorage.setItem('nivel', i);
            
                if(document.getElementById('ID_cur')){
                    localStorage.setItem('ID_cur', document.getElementById('ID_cur').value);
                }
                window.location.href = '/nueva_clase';
            };
            

            profileCourse.appendChild(edit);

            const profileCourse2 = document.createElement('div');
            profileCourse2.classList.add('profile-course', 'd-flex', 'align-items-center', 'ml-auto', 'bd-highlight');

            const trash = document.createElement('a');
            trash.href = '';
            trash.classList.add('mx-2', 'pl-5');
            trash.style.height = '1.5rem';

            const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
            svg.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
            svg.setAttribute('width', '16');
            svg.setAttribute('height', '16');
            svg.setAttribute('fill', '#86BD7B');
            svg.classList.add('bi', 'bi-trash3');
            svg.setAttribute('viewBox', '0 0 16 16');

            const path = document.createElement('path');
            path.setAttribute('d', 'M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5');
            svg.appendChild(path);
            trash.appendChild(svg);
            profileCourse2.appendChild(trash);

            col.appendChild(button);
            col.appendChild(profileCourse);
            col.appendChild(profileCourse2);
            row.appendChild(col);
            nivelesContainer.appendChild(row);

            /*
            <div class="row ml-0 mr-0" style="background-color: #130924;">
                <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
                    <button type="button" class="btn btn-block level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson10">
                        <p class="flex-grow-1 pl-4">HTML</p>
                    </button>
                    <div class="profile-course d-flex justify-content-end ml-auto bd-highlight">
                        <a href="/nueva_clase" class="categoria p-0" style="height: 50%;">Editar</a>
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
            */

            const lesson = document.createElement('div');
            lesson.id = 'lesson' + i;
            lesson.classList.add('collapse', 'pl-2');

            const table = document.createElement('table');
            table.classList.add('table', 'table-striped');

            const thead = document.createElement('thead');
            const tr = document.createElement('tr');
            const th = document.createElement('th');
            th.textContent = 'Clases del nivel';
            th.scope = 'col';
            tr.appendChild(th);
            thead.appendChild(tr);

            const numClasesNivelInput = document.createElement('input');
            numClasesNivelInput.type = 'hidden';
            numClasesNivelInput.name = `NumClasesNivel[]`;
            nivelesContainer.appendChild(numClasesNivelInput);

            if(localStorage.getItem(`NumClasesNivel_${i}`)){
                numClasesNivelInput.value = localStorage.getItem(`NumClasesNivel_${i}`);

                const tbody = document.createElement('tbody');

                const classNames = JSON.parse(localStorage.getItem(`Nivel_${i}_Clases`));
                const classDescriptions = JSON.parse(localStorage.getItem(`Nivel_${i}_Descripciones`));
                const compressedVideos = JSON.parse(localStorage.getItem(`Nivel_${i}_CompressedVideos`));
                for (let j = 0; j < classNames.length; j++) {
                    const nivelClasesInput = document.createElement('input');
                    nivelClasesInput.type = 'hidden';
                    nivelClasesInput.name = `Clases[]`;
                    nivelClasesInput.value = classNames[j];
                    nivelesContainer.appendChild(nivelClasesInput);
                    const nivelDescripcionesInput = document.createElement('input');
                    nivelDescripcionesInput.type = 'hidden';
                    nivelDescripcionesInput.name = `Descripciones[]`;
                    nivelDescripcionesInput.value = classDescriptions[j];
                    nivelesContainer.appendChild(nivelDescripcionesInput);
                    const nivelCompressedVideosInput = document.createElement('input');
                    nivelCompressedVideosInput.type = 'hidden';
                    nivelCompressedVideosInput.name = `CompressedVideos[]`;
                    nivelCompressedVideosInput.value = compressedVideos[j];
                    nivelesContainer.appendChild(nivelCompressedVideosInput);

                    const tr = document.createElement('tr');
                    const td = document.createElement('td');

                    td.textContent = classNames[j];

                    tr.appendChild(td);
                    tbody.appendChild(tr);
                }

                table.appendChild(tbody);
                
            }

            table.appendChild(thead);
            lesson.appendChild(table);
            nivelesContainer.appendChild(lesson);

            /*
            <div id="lesson10" class="collapse pl-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Clases del nivel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fundamentos y bases de HTML</td>
                        </tr>
                        <tr>
                            <td>Aplicación de las etiquetas de HTML</td>
                        </tr>                                      
                    </tbody>
                </table>
            </div>
                */
        }
    });
    

    if (localStorage.getItem('nombreCurso')) {
        $("#inputNombreCurso").val(localStorage.getItem('nombreCurso'));
    }

    if (localStorage.getItem('precio')) {
        $("#inputPrecio").val(localStorage.getItem('precio'));
    }

    if (localStorage.getItem('descripcion')) {
        $("#inputDescripcion").val(localStorage.getItem('descripcion'));
    }

    if (localStorage.getItem('aprendizajes')) {
        const aprendizajes = JSON.parse(localStorage.getItem('aprendizajes'));
        const aprendizajesContainer = document.getElementById('aprendizajesContainer');

        aprendizajes.forEach(aprendizaje => {
            const newAprendizaje = document.createElement('input');
            newAprendizaje.type = 'text';
            newAprendizaje.name = 'aprendizajes[]';  // Use [] to submit as an array
            newAprendizaje.classList.add('form-control', 'mt-2');
            newAprendizaje.placeholder = 'Lección concreta que aprenderá el alumno. Ejemplo: “Crear tu propia página”';
            newAprendizaje.value = aprendizaje;
            
            aprendizajesContainer.appendChild(newAprendizaje);
        });
    }

    if (localStorage.getItem('numNiveles')) {
        document.getElementById('NumNiveles').value = localStorage.getItem('numNiveles');
        document.getElementById('NumNiveles').dispatchEvent(new Event('change'));
    }

    
    
};
function validacionCurso(){
    let alert = "";
    let maxSize = 64 * 1024; // 64 KB for BLOB

    if ($("#file").get(0).files.length === 0) {
        alert += "Seleccione una imagen\n";
    } else {
        let file = $("#file").get(0).files[0];
        if (file.size > maxSize) {
            alert += "El archivo es demasiado grande. El tamaño máximo es de 64 KB.\n";
        }
    }

    if($("#inputNombreCurso").val().trim() == ""){
        alert += "Ingrese el nombre del curso\n";
    }
    if($("#inputNombreCurso").val().trim().length > 100){
        alert += "El nombre del curso no debe exceder los 100 caracteres\n";
    }

    var selectedCategory = document.getElementById('categoryDropdown').textContent;
    var defaultText = "Seleccione categoría del nuevo curso";
    if (selectedCategory === defaultText) {
        alert += "Seleccione una categoría válida\n";
    }
    const precio = parseFloat($("#inputPrecio").val().trim());
    if(isNaN(precio) || precio === ""){
        alert += "Ingrese el precio del curso\n";
    }
    if(precio < 0){
        alert += "El precio del curso no puede ser negativo\n";
    }
    if(precio > 100000){
        alert += "El precio del curso no puede ser mayor a 100,000\n";
    }

    const aprendizajesInputs = document.querySelectorAll("input[name='aprendizajes[]']");
    
    aprendizajesInputs.forEach((input, index) => {
        if (input.value.trim() === "") {
            alert += `Ingrese el aprendizaje #${index + 1}\n`;
        }
    });

    if($("#inputDescripcion").val().trim() == ""){
        alert += "Ingrese la descripción del curso\n";
    }
    if($("#inputDescripcion").val().trim().length > 65535){
        alert += "La descripción del curso no debe exceder los 65,535 caracteres\n";
    }

    if(alert != ""){
        alertCustom(alert);
        return false;
    }
    return true;
}