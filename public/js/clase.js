const maxVideoSize = 16 * 1024 * 1024; // 16MB

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

    if (localStorage.getItem('nivel')) {
        document.getElementById('nNivel').textContent = "Nivel " + localStorage.getItem('nivel');
    }

    document.getElementById('NumNiveles').addEventListener('change', function() {
        const numClases = parseInt(this.value);
        const clasesContainer = document.getElementById('levels-container');
        clasesContainer.innerHTML = '';

        const header = document.createElement('div');
        header.classList.add('header', 'd-flex', 'flex-wrap', 'justify-content-between');
        const headerTitle = document.createElement('p');
        headerTitle.classList.add('pl-4');
        headerTitle.textContent = numClases + ' Clases';

        header.appendChild(headerTitle);
        clasesContainer.appendChild(header);

        for (let i = 1; i <= numClases; i++) {
            const clase = document.createElement('div');
            clase.classList.add('row', 'ml-0', 'mr-0');
            clase.style.backgroundColor = '#130924';

            const col = document.createElement('div');
            col.classList.add('col-12', 'd-flex', 'justify-content-start', 'align-items-center', 'd-flex', 'bd-highlight');

            const button = document.createElement('button');
            button.classList.add('btn', 'btn-block', 'level', 'p-2', 'flex-grow-1', 'bd-highlight');
            button.dataset.toggle = 'collapse';
            button.type = 'button';
            button.dataset.target = '#lesson' + i;

            const p = document.createElement('p');
            p.classList.add('flex-grow-1', 'pl-4');
            p.textContent = 'Clase ' + i + '.';
            button.appendChild(p);

            const profileCourse = document.createElement('div');
            profileCourse.classList.add('profile-course', 'd-flex', 'align-items-center', 'ml-auto', 'bd-highlight');

            const a = document.createElement('a');
            a.href = '';
            a.classList.add('mx-2', 'pl-5');
            a.style.height = '1.5rem';

            const svg = document.createElement('svg');
            svg.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
            svg.setAttribute('width', '16');
            svg.setAttribute('height', '16');
            svg.setAttribute('fill', '#86BD7B');
            svg.classList.add('bi', 'bi-trash3');
            svg.setAttribute('viewBox', '0 0 16 16');

            const path = document.createElement('path');
            path.setAttribute('d', 'M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5');
            svg.appendChild(path);
            a.appendChild(svg);
            profileCourse.appendChild(a);

            col.appendChild(button);
            col.appendChild(profileCourse);
            clase.appendChild(col);
            clasesContainer.appendChild(clase);

            /*<div class="row ml-0 mr-0" style="background-color: #130924;">
                <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
                    <button type="button" class="btn btn-block level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson10">
                        <p class="flex-grow-1 pl-4">Clase 1. Fundamentos y bases de HTML</p>
                    </button>
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

            const formGroup1 = document.createElement('div');
            formGroup1.classList.add('form-group', 'd-flex', 'justify-content-center', 'mt-4');

            const input1 = document.createElement('input');
            input1.style.width = '90%';
            input1.type = 'text';
            input1.classList.add('form-control');
            input1.placeholder = 'Ingrese nombre de la clase';
            input1.name = 'nombreClase[]';
            formGroup1.appendChild(input1);

            const formGroup2 = document.createElement('div');
            formGroup2.classList.add('form-group', 'd-flex', 'justify-content-center', 'mt-4', 'pr-5', 'pl-5');

            const p2 = document.createElement('p');
            p2.classList.add('col-9');
            p2.textContent = 'Seleccione un video';

            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.accept = 'video/*';
            fileInput.style.display = 'none';
            fileInput.id = 'videoFileInput';
            fileInput.name = 'videoClase[]';

            const button2 = document.createElement('button');
            button2.classList.add('btn', 'sub-btn', 'btn-block', 'col-3');
            button2.textContent = 'Subir video';
            button2.type = 'button';
            formGroup2.appendChild(p2);
            formGroup2.appendChild(button2);
            formGroup2.appendChild(fileInput);

            button2.addEventListener('click', function() {
                fileInput.click();
            });

            fileInput.addEventListener('change', function() {
                const file = fileInput.files[0];
                
                if (file) {
                    p2.textContent = file.name;
                }
            });
            

            const formGroup3 = document.createElement('div');
            formGroup3.classList.add('form-group', 'd-flex', 'justify-content-center', 'mt-4');

            const textarea = document.createElement('textarea');
            textarea.classList.add('mb-3');
            textarea.rows = 35;
            textarea.maxLength = 9000;
            textarea.style.width = '90%';
            textarea.placeholder = 'Descripción de la clase...';
            textarea.name = 'descripcionClase[]';
            formGroup3.appendChild(textarea);

            const formGroup4 = document.createElement('div');
            formGroup4.classList.add('d-flex', 'flex-row', 'bd-highlight', 'mb-3', 'justify-content-around', 'align-items-center', 'mt-4');

            const button3 = document.createElement('button');
            button3.classList.add('btn', 'sub-btn');
            button3.style.width = '25%';
            button3.type = 'button';

            const svg3 = document.createElement('svg');
            svg3.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
            svg3.setAttribute('width', '16');
            svg3.setAttribute('height', '16');
            svg3.setAttribute('fill', '#86BD7B');
            svg3.classList.add('bi', 'bi-plus-circle');
            svg3.setAttribute('viewBox', '0 0 16 16');

            const path3 = document.createElement('path');
            path3.setAttribute('d', 'M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16');
            const path4 = document.createElement('path');
            path4.setAttribute('d', 'M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4');
            svg3.appendChild(path3);
            svg3.appendChild(path4);
            button3.appendChild(svg3);
            button3.textContent = 'Agregar material';

            const button4 = document.createElement('button');
            button4.classList.add('btn', 'sub-btn');
            button4.style.width = '25%';
            button4.type = 'button';

            const svg4 = document.createElement('svg');
            svg4.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
            svg4.setAttribute('width', '16');
            svg4.setAttribute('height', '16');
            svg4.setAttribute('fill', '#86BD7B');
            svg4.classList.add('bi', 'bi-plus-circle');
            svg4.setAttribute('viewBox', '0 0 16 16');

            const path5 = document.createElement('path');
            path5.setAttribute('d', 'M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16');
            const path6 = document.createElement('path');
            path6.setAttribute('d', 'M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4');
            svg4.appendChild(path5);
            svg4.appendChild(path6);
            button4.appendChild(svg4);
            button4.textContent = 'Agregar link';

            formGroup4.appendChild(button3);
            formGroup4.appendChild(button4);

            lesson.appendChild(formGroup1);
            lesson.appendChild(formGroup2);
            lesson.appendChild(formGroup3);
            lesson.appendChild(formGroup4);
            clasesContainer.appendChild(lesson);

            /*
            <div id="lesson10" class="collapse pl-2">
                <div class="form-group d-flex justify-content-center mt-4">
                    <input style="width: 90%;" type="text" class="form-control" placeholder="Ingrese nombre de la clase">
                </div>
                <div class="form-group d-flex justify-content-center mt-4 pr-5 pl-5">
                    <p class="col-9">Nombre del video blah blah blah.mp4</p>
                    <button class="btn sub-btn btn-block col-3">Subir video</button>
                </div>
                <div class="form-group d-flex justify-content-center mt-4">
                    <textarea class="mb-3" rows="35" maxlength="9000" placeholder="Descripción de la clase..." style="width: 90%;"></textarea>
                </div>
                <div class="d-flex flex-row bd-highlight mb-3 justify-content-around align-items-center mt-4">
                    <button class="btn sub-btn" style="width: 25%">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                        Agregar material
                    </button>
                
                    <button class="btn sub-btn" style="width: 25%">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                        Agregar link
                    </button>
                </div>
            </div> */
            
        }
    });
}; 
async function validacionClase(event) {
    event.preventDefault();
    let alert = "";
    const nombresClases = document.querySelectorAll("input[name='nombreClase[]']");
    const descripcionesClases = document.querySelectorAll("textarea[name='descripcionClase[]']");
    const videoFiles = document.querySelectorAll("input[name='videoClase[]']");

    const nombreNivel = $("#inputNombreNivel").val().trim();
    if (nombreNivel === "") {
        alert += "Ingrese el nombre del nivel\n";
    }
    if (nombreNivel.length > 100) {
        alert += "El nombre del nivel no debe exceder los 100 caracteres\n";
    }

    const precio = parseFloat($("#inputPrecio").val().trim());
    if (isNaN(precio) || precio === "") {
        alert += "Ingrese el precio del nivel\n";
    }
    if (precio < 0) {
        alert += "El precio del nivel no puede ser negativo\n";
    }
    if (precio > 100000) {
        alert += "El precio del nivel no puede ser mayor a 100,000\n";
    }

    nombresClases.forEach((nombre, index) => {
        if (nombre.value.trim() === '') {
            alert += `Ingrese el nombre de la clase ${index + 1}\n`;
        }
        if (nombre.value.trim().length > 100) {
            alert += `El nombre de la clase ${index + 1} no debe exceder los 100 caracteres\n`;
        }
    });

    descripcionesClases.forEach((descripcion, index) => {
        if (descripcion.value.trim() === '') {
            alert += `Ingrese la descripción de la clase ${index + 1}\n`;
        }
        if (descripcion.value.trim().length > 65535) {
            alert += `La descripción de la clase ${index + 1} no debe exceder los 65,535 caracteres\n`;
        }
    });

    for (let i = 0; i < videoFiles.length; i++) {
        const videoFile = videoFiles[i].files[0];
        if (!videoFile) {
            alert += `Debe seleccionar un video para la clase ${i + 1}\n`;
        } else {
            try {
                const compressedData = await compressAndValidateVideo(videoFile);
                console.log('Compressed Data:', compressedData);  // Log the compressed data
            
                if (compressedData.success) {
                    const nivel = localStorage.getItem('nivel') || '1';
                    let storedVideos = JSON.parse(localStorage.getItem(`Nivel_${nivel}_CompressedVideos`) || '[]');
                    storedVideos.push(compressedData.compressedFileName); // Use compressedData.compressedFileName
                    localStorage.setItem(`Nivel_${nivel}_CompressedVideos`, JSON.stringify(storedVideos));
                } else {
                    alert += `Error al comprimir el video para la clase ${i + 1}: ${compressedData.message}\n`;
                }
            } catch (error) {
                console.error('Error during compression validation:', error);  // Log the actual error
                alert += `Error durante la compresión del video para la clase ${i + 1}\n`;
            }
            
        }
    }

    if (alert !== "") {
        alertCustom(alert);
        return false;
    }

    // Save form data to localStorage
    const nivel = localStorage.getItem('nivel') || '1';
    localStorage.setItem(`NombreNivel_${nivel}`, nombreNivel);
    localStorage.setItem(`PrecioNivel_${nivel}`, precio.toString());
    localStorage.setItem(`NumClasesNivel_${nivel}`, nombresClases.length.toString());

    localStorage.setItem(`Nivel_${nivel}_Clases`, JSON.stringify(Array.from(nombresClases).map(input => input.value.trim())));
    localStorage.setItem(`Nivel_${nivel}_Descripciones`, JSON.stringify(Array.from(descripcionesClases).map(input => input.value.trim())));

    if(localStorage.getItem('ID_cur')){
        window.location.href = '/editar_curso';
    } else {
        window.location.href = '/nuevo_curso';
    }
}

function compressAndValidateVideo(file) {
    return new Promise((resolve, reject) => {
        const formData = new FormData();
        formData.append('video', file);

        alert('Comprimiendo video. Por favor espere.');

        fetch('/compress-video', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                resolve({ success: true, compressedFileName: data.compressedFileName });
            } else {
                resolve({ success: false, message: data.message });
            }
        })
        .catch(error => {
            console.error('Error during compression:', error);
            reject({ success: false, message: 'Error during compression.' });
        });
    });
}
