const maxVideoSize = 16 * 1024 * 1024; // 16MB

window.onload = function() {
    let checkbox = document.getElementById('checkbox-gratis');
    let precioInput = document.getElementById('inputPrecio');

    document.getElementById('regresar').addEventListener('click', function() {
        window.history.back();
    });

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

    if(localStorage.getItem(`NumClasesNivel_${localStorage.getItem('nivel')}`)){
        document.getElementById('NumClases').value = localStorage.getItem(`NumClasesNivel_${localStorage.getItem('nivel')}`);
    }

    if(localStorage.getItem(`NombreNivel_${localStorage.getItem('nivel')}`)){
        document.getElementById('inputNombreNivel').value = localStorage.getItem(`NombreNivel_${localStorage.getItem('nivel')}`);
    }

    if(localStorage.getItem(`PrecioNivel_${localStorage.getItem('nivel')}`)){
        document.getElementById('inputPrecio').value = localStorage.getItem(`PrecioNivel_${localStorage.getItem('nivel')}`);
    }

    function loadClases(){
        let numClases = document.getElementById('NumClases').value;
        const clasesContainer = document.getElementById('levels-container');
        clasesContainer.innerHTML = '';

        const header = document.createElement('div');
        header.classList.add('header', 'd-flex', 'flex-wrap', 'justify-content-between');
        const headerTitle = document.createElement('p');
        headerTitle.classList.add('pl-4');
        headerTitle.textContent = numClases + ' Clases';

        header.appendChild(headerTitle);
        clasesContainer.appendChild(header);

        let storedClases = JSON.parse(localStorage.getItem(`Nivel_${localStorage.getItem('nivel')}_Clases`) || '[]');
        let storedDescripciones = JSON.parse(localStorage.getItem(`Nivel_${localStorage.getItem('nivel')}_Descripciones`) || '[]');
        let storedVideos = JSON.parse(localStorage.getItem(`Nivel_${localStorage.getItem('nivel')}_CompressedVideos`) || '[]');
        let storedClaseIDs = JSON.parse(localStorage.getItem(`Nivel_${localStorage.getItem('nivel')}_Clases_IDs`) || '[]');

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

            col.appendChild(button);
            clase.appendChild(col);
            clasesContainer.appendChild(clase);

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
            input1.value = storedClases[i-1] || '';
            formGroup1.appendChild(input1);

            const formGroup2 = document.createElement('div');
            formGroup2.classList.add('form-group', 'd-flex', 'justify-content-center', 'mt-4', 'pr-5', 'pl-5');

            const p2 = document.createElement('p');
            p2.classList.add('col-9');
            p2.textContent = storedVideos[i-1] || 'Seleccione un video';

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
            textarea.value = storedDescripciones[i-1] || '';
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
            button3.addEventListener('click', function() {
                const fileInput = document.createElement('input');
                fileInput.type = 'file';
                fileInput.accept = 'application/* , image/* , video/*';
                fileInput.style.display = 'none';
                fileInput.name = `materialClase${i}[]`;
                fileInput.click();

                fileInput.addEventListener('change', function() {
                    const file = fileInput.files[0];
                    if (file) {
                        if (file.size > maxVideoSize) {
                            alertCustom('El archivo no debe exceder los 16MB');
                            return;
                        }
                        const material = document.createElement('p');
                        material.textContent = file.name;
                        lesson.appendChild(fileInput);
                        lesson.appendChild(material);
                    }
                });
            });

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
            button4.addEventListener('click', function() {
                const link = document.createElement('input');
                link.type = 'text';
                link.classList.add('form-control');
                link.placeholder = 'Ingrese link';
                link.name = `linkClase${i}[]`;
                lesson.appendChild(link);
            });

            formGroup4.appendChild(button3);
            formGroup4.appendChild(button4);

            lesson.appendChild(formGroup1);
            lesson.appendChild(formGroup2);
            lesson.appendChild(formGroup3);
            lesson.appendChild(formGroup4);
            clasesContainer.appendChild(lesson);
            
        }
    }

    document.getElementById('NumClases').addEventListener('change', loadClases);

    loadClases();
}; 
async function validacionClase(event) {
    event.preventDefault();
    let alert = "";
    const nombresClases = document.querySelectorAll("input[name='nombreClase[]']");
    const descripcionesClases = document.querySelectorAll("textarea[name='descripcionClase[]']");
    const videoFiles = document.querySelectorAll("input[name='videoClase[]']");

    const materialFiles = document.querySelectorAll("input[name^='materialClase']");
    const linkClases = document.querySelectorAll("input[name^='linkClase']");

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

    materialFiles.forEach((file, index) => {
        if (file.files.length > 0) {
            if (file.files[0].size > maxVideoSize) {
                alert += `El archivo de material ${index + 1} no debe exceder los 16MB\n`;
            }
        }
    });

    linkClases.forEach((link, index) => {
        if (link.value.trim() === '') {
            alert += `Ingrese el link ${index + 1}\n`;
        }
        if (link.value.trim().length > 255) {
            alert += `El link ${index + 1} no debe exceder los 255 caracteres\n`;
        }
    });

    let storedVideos = JSON.parse(localStorage.getItem(`Nivel_${localStorage.getItem('nivel')}_CompressedVideos`) || '[]');
        
    for (let i = 0; i < videoFiles.length; i++) {
        const videoFile = videoFiles[i].files[0];
        if (!videoFile) {
            if (storedVideos[i]) {
                continue;
            }
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
    const nivel = localStorage.getItem('nivel') || '1'; // Assuming 'nivel' is dynamically set or retrieved from the UI.
    localStorage.setItem(`NombreNivel_${nivel}`, nombreNivel);
    localStorage.setItem(`PrecioNivel_${nivel}`, precio.toString());
    localStorage.setItem(`NumClasesNivel_${nivel}`, nombresClases.length.toString());

    // Storing class names and descriptions
    localStorage.setItem(`Nivel_${nivel}_Clases`, JSON.stringify(Array.from(nombresClases).map(input => input.value.trim())));
    localStorage.setItem(`Nivel_${nivel}_Descripciones`, JSON.stringify(Array.from(descripcionesClases).map(input => input.value.trim())));

    for (let i = 0; i < nombresClases.length; i++) {
        const materialFiles = document.querySelectorAll(`input[name='materialClase${i + 1}[]']`);
        const linkClases = document.querySelectorAll(`input[name='linkClase${i + 1}[]']`);

        for (let j = 0; j < materialFiles.length; j++) {
            const file = materialFiles[j].files[0];
            if (file) {
                const uploadedData = await saveToUploads(file);
                if(uploadedData.success){
                    let storedMaterials = JSON.parse(localStorage.getItem(`Nivel_${nivel}_Clase${i + 1}_Materials`) || '[]');
                    storedMaterials.push(uploadedData.fileName);
                    localStorage.setItem(`Nivel_${nivel}_Clase${i + 1}_Materials`, JSON.stringify(storedMaterials));
                } else {
                    alertCustom(`Error al subir material ${j + 1} de la clase ${i + 1}: ${uploadedData.message}`);
                }
            }
        }
        
        const links = Array.from(linkClases).map(input => input.value.trim());
        localStorage.setItem(`Nivel_${nivel}_Clase${i + 1}_Links`, JSON.stringify(links));
    }


    // Store class IDs (if available) in localStorage for this nivel
    const claseIDs = Array.from(nombresClases).map(input => input.dataset.claseId); // Assuming you store class IDs in a data attribute
    localStorage.setItem(`Nivel_${nivel}_Clases_IDs`, JSON.stringify(claseIDs));

    // Check if the course ID exists and submit the form
    if (localStorage.getItem('ID_curso')) {
        const form = document.createElement('form');
        form.action = '/editar_curso';
        form.method = 'POST';

        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id';
        input.value = localStorage.getItem('ID_curso');
        form.appendChild(input);

        const clasesInput = document.createElement('input');
        clasesInput.type = 'hidden';
        clasesInput.name = 'clases_ids';
        clasesInput.value = JSON.stringify(claseIDs);
        form.appendChild(clasesInput);

        document.body.appendChild(form);
        form.submit();
    } else {
        window.location.href = '/nuevo_curso';
    }

}

function saveToUploads(file) {
    return new Promise((resolve, reject) => {
        const formData = new FormData();
        formData.append('file', file);

        fetch('/upload-file', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                resolve({ success: true, fileName: data.fileName });
            } else {
                resolve({ success: false, message: data.message });
            }
        })
        .catch(error => {
            console.error('Error during upload:', error);
            reject({ success: false, message: 'Error during upload.' });
        });
    });
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
