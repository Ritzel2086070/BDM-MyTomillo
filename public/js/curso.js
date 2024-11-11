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

    document.getElementById('regresar').addEventListener('click', function() {
        window.history.back();
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
        
        // Create hidden input for aprendizaje ID
        const idAprendizajeInput = document.createElement('input');
        idAprendizajeInput.type = 'hidden';
        idAprendizajeInput.name = `ID_aprendizaje[]`;  // New field for aprendizaje ID
        idAprendizajeInput.value = null;  // Use the ID from localStorage
        aprendizajesContainer.appendChild(idAprendizajeInput);
    });

    // Load course data from localStorage when the page loads
    if (localStorage.getItem('NombreCurso')) {
        $("#inputNombreCurso").val(localStorage.getItem('NombreCurso'));
    }

    if (localStorage.getItem('PrecioCurso')) {
        $("#inputPrecio").val(localStorage.getItem('PrecioCurso'));
    }

    if (localStorage.getItem('DescripcionCurso')) {
        $("#inputDescripcion").val(localStorage.getItem('DescripcionCurso'));
    }

    if (localStorage.getItem('CategoriaCurso')) {
        document.getElementById('categoryDropdown').textContent = localStorage.getItem('CategoriaCurso');
    }

    if (localStorage.getItem('ID_categoria')) {
        document.getElementById('inputCategoria').value = localStorage.getItem('ID_categoria');
    }

    if (localStorage.getItem('ImagenCurso')) { 
        document.getElementById('preview-image').src = localStorage.getItem('ImagenCurso');
    }
    

    // Load aprendizajes from localStorage
    if (localStorage.getItem(`Aprendizajes`)) {
        const aprendizajes = JSON.parse(localStorage.getItem(`Aprendizajes`));
        const aprendizajesContainer = document.getElementById('aprendizajesContainer');

        aprendizajes.forEach(aprendizaje => {
            // Create input for each aprendizaje
            const newAprendizaje = document.createElement('input');
            newAprendizaje.type = 'text';
            newAprendizaje.name = 'aprendizajes[]';  // Use [] to submit as an array
            newAprendizaje.classList.add('form-control', 'mt-2');
            newAprendizaje.placeholder = 'Lección concreta que aprenderá el alumno. Ejemplo: “Crear tu propia página”';
            newAprendizaje.value = aprendizaje.aprendizaje;  // Use the aprendizaje text

            // Append the input to the container
            aprendizajesContainer.appendChild(newAprendizaje);

            // Create hidden input for aprendizaje ID
            const idAprendizajeInput = document.createElement('input');
            idAprendizajeInput.type = 'hidden';
            idAprendizajeInput.name = `ID_aprendizaje[]`;  // New field for aprendizaje ID
            idAprendizajeInput.value = aprendizaje.ID_aprendizaje;  // Use the ID from localStorage
            aprendizajesContainer.appendChild(idAprendizajeInput);
        });
    }

    if(localStorage.getItem('NumNiveles')){
        document.getElementById('NumNiveles').value = localStorage.getItem('NumNiveles');
    }

    // Function to load or update niveles and clases data from localStorage
    function loadNivelesAndClases() {
        // Load NumNiveles from localStorage or get the value from input if it's a new entry
        let numNiveles = document.getElementById('NumNiveles').value;
    
        const nivelesContainer = document.getElementById('levels-container');
        nivelesContainer.innerHTML = '';  // Clear existing content
    
        // Create header for the niveles
        const header = document.createElement('div');
        header.classList.add('header', 'd-flex', 'flex-wrap', 'justify-content-between');
        const headerTitle = document.createElement('p');
        headerTitle.textContent = numNiveles + ' Niveles';
        header.appendChild(headerTitle);
        nivelesContainer.appendChild(header);
    
        // Loop through each nivel and load or create its corresponding data
        for (let i = 1; i <= numNiveles; i++) {
            let nombreNivel = localStorage.getItem(`NombreNivel_${i}`) || '';
            let precioNivel = localStorage.getItem(`PrecioNivel_${i}`) || '';
            let numClasesNivel = localStorage.getItem(`NumClasesNivel_${i}`) || '';
    
            const row = document.createElement('div');
            row.classList.add('row', 'ml-0', 'mr-0');
            row.style.backgroundColor = '#130924';
    
            const col = document.createElement('div');
            col.classList.add('col-12', 'd-flex', 'justify-content-start', 'align-items-center', 'bd-highlight');
    
            const button = document.createElement('button');
            button.type = 'button';
            button.classList.add('btn', 'btn-block', 'level', 'p-2', 'flex-grow-1', 'bd-highlight');
            button.dataset.toggle = 'collapse';
            button.dataset.target = '#lesson' + i;
    
            const p = document.createElement('p');
            p.classList.add('flex-grow-1', 'pl-4');
            p.textContent = nombreNivel ? nombreNivel : 'Nivel ' + i;
    
            const nombreNivelInput = document.createElement('input');
            nombreNivelInput.type = 'hidden';
            nombreNivelInput.name = `NombreNivel[]`;
            nombreNivelInput.value = nombreNivel;
    
            const precioNivelInput = document.createElement('input');
            precioNivelInput.type = 'hidden';
            precioNivelInput.name = `PrecioNivel[]`;
            precioNivelInput.value = precioNivel;
    
            const idNivelInput = document.createElement('input');
            idNivelInput.type = 'hidden';
            idNivelInput.name = `ID_nivel[]`;
    
            nivelesContainer.appendChild(nombreNivelInput);
            nivelesContainer.appendChild(precioNivelInput);
            nivelesContainer.appendChild(idNivelInput);
    
            button.appendChild(p);
    
            const profileCourse = document.createElement('div');
            profileCourse.classList.add('profile-course', 'd-flex', 'justify-content-end', 'ml-auto', 'bd-highlight');
    
            const edit = document.createElement('a');
            edit.href = '/nueva_clase';
            edit.classList.add('categoria', 'p-0');
            edit.style.height = '50%';
            edit.textContent = 'Editar';
            edit.onclick = function () {
                saveLocalsBeforeRedirect(i);
            };
    
            profileCourse.appendChild(edit);
    
            const profileCourse2 = document.createElement('div');
            profileCourse2.classList.add('profile-course', 'd-flex', 'align-items-center', 'ml-auto', 'bd-highlight');
    
            const trash = document.createElement('a');
            trash.classList.add('mx-2', 'pl-5');
            trash.style.height = '1.5rem';
            trash.textContent = 'Eliminar';
    
            // Remove nivel and its related localStorage data
            trash.onclick = function () {
                localStorage.removeItem(`NombreNivel_${i}`);
                localStorage.removeItem(`PrecioNivel_${i}`);
                localStorage.removeItem(`NumClasesNivel_${i}`);
                localStorage.removeItem(`Nivel_${i}_Clases`);
                nivelesContainer.removeChild(row);
    
                // Decrease NumNiveles in localStorage
                let updatedNumNiveles = parseInt(localStorage.getItem('NumNiveles')) - 1;
                localStorage.setItem('NumNiveles', updatedNumNiveles);
            };
    
            profileCourse2.appendChild(trash);
    
            col.appendChild(button);
            col.appendChild(profileCourse);
            col.appendChild(profileCourse2);
            row.appendChild(col);
            nivelesContainer.appendChild(row);
    
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
            numClasesNivelInput.value = numClasesNivel;
    
            nivelesContainer.appendChild(numClasesNivelInput);
    
            const tbody = document.createElement('tbody');
    
            // Load clases for this nivel
            let storedClases = JSON.parse(localStorage.getItem(`Nivel_${i}_Clases`) || '[]');
            let storedDescripciones = JSON.parse(localStorage.getItem(`Nivel_${i}_Descripciones`) || '[]');
            let storedClaseIDs = JSON.parse(localStorage.getItem(`Nivel_${i}_Clases_IDs`) || '[]');
            let storedVideos = JSON.parse(localStorage.getItem(`Nivel_${i}_CompressedVideos`) || '[]');
            // Loop through each clase
            for (let j = 0; j < storedClases.length; j++) {
                const tr = document.createElement('tr');
                const td = document.createElement('td');
                td.textContent = storedClases[j];
    
                let claseInput = document.createElement('input');
                claseInput.type = 'hidden';
                claseInput.name = `clasesNivel_${i}[]`;
                claseInput.value = storedClases[j];

                console.log("Creating input for clase: ", storedClases[j], " with name: ", `clasesNivel_${i}[]`);
    
                let descripcionInput = document.createElement('input');
                descripcionInput.type = 'hidden';
                descripcionInput.name = `descripcionesNivel_${i}[]`;
                descripcionInput.value = storedDescripciones[j];
    
                let idClaseInput = document.createElement('input');
                idClaseInput.type = 'hidden';
                idClaseInput.name = `ID_clase_${i}[]`;
                idClaseInput.value = storedClaseIDs[j];

                let videoInput = document.createElement('input');
                videoInput.type = 'hidden';
                videoInput.name = `CompressedVideos_${i}[]`;
                videoInput.value = storedVideos[j];
    
                tr.appendChild(claseInput);
                tr.appendChild(descripcionInput);
                tr.appendChild(idClaseInput);
                tr.appendChild(videoInput);
                tr.appendChild(td);
                tbody.appendChild(tr);
            }
    
            table.appendChild(tbody);
            table.appendChild(thead);
            lesson.appendChild(table);
            nivelesContainer.appendChild(lesson);
        }
    }
    

    // Attach event listener to 'NumNiveles' input to update dynamically
    document.getElementById('NumNiveles').addEventListener('change', loadNivelesAndClases);

    // Call function on page load to load data from localStorage
    loadNivelesAndClases();


    //TO DO : no hay coso para eliminar aprendizajes
    
    

};

function saveCursoDataToLocalStorage(curso, niveles, clases, aprendizajes) {
    console.log("Niveles (PHP to JS):", niveles);
    console.log("Clases (PHP to JS):", clases);
    console.log("Aprendizajes (PHP to JS):", aprendizajes);

    localStorage.setItem('ID_curso', curso['ID_curso']);
    localStorage.setItem('NombreCurso', curso['titulo']);
    localStorage.setItem('PrecioCurso', curso['precio']);
    localStorage.setItem('DescripcionCurso', curso['descripcion']);
    localStorage.setItem('NumNiveles', curso['n_niveles']);
    localStorage.setItem('CategoriaCurso', curso['nombre']);
    localStorage.setItem('ID_categoria', curso['ID_categoria']);
    localStorage.setItem('ImagenCurso', curso['imagen']);

    // Loop through each nivel and process the data
    niveles.forEach(nivelData => {
        let nivel = nivelData['ID_nivel'];
        let nombreNivel = nivelData['titulo'];
        let precioNivel = nivelData['precio'];
        let numClasesNivel = clases.filter(clase => clase['ID_nivel'] == nivel).length;

        console.log(`Nivel Data - Nivel: ${nivel}, Nombre: ${nombreNivel}, Precio: ${precioNivel}, Clases: ${numClasesNivel}`);

        if (!localStorage.getItem(`NombreNivel_${nivel}`)) {
            localStorage.setItem(`NombreNivel_${nivel}`, nombreNivel);
        }

        if (!localStorage.getItem(`PrecioNivel_${nivel}`)) {
            localStorage.setItem(`PrecioNivel_${nivel}`, precioNivel.toString());
        }

        if (!localStorage.getItem(`NumClasesNivel_${nivel}`)) {
            localStorage.setItem(`NumClasesNivel_${nivel}`, numClasesNivel.toString());
        }

        if (!localStorage.getItem(`ID_nivel_${nivel}`)) {
            localStorage.setItem(`ID_nivel_${nivel}`, nivel);
        }

        // Filter classes belonging to this nivel
        let clasesNivel = clases.filter(clase => clase['ID_nivel'] == nivel);

        console.log(`Clases for Nivel ${nivel}:`, clasesNivel);

        let storedClases = JSON.parse(localStorage.getItem(`Nivel_${nivel}_Clases`) || '[]');
        let storedDescripciones = JSON.parse(localStorage.getItem(`Nivel_${nivel}_Descripciones`) || '[]');
        let storedClaseIDs = JSON.parse(localStorage.getItem(`Nivel_${nivel}_Clases_IDs`) || '[]');
        let storedVideos = JSON.parse(localStorage.getItem(`Nivel_${nivel}_CompressedVideos`) || '[]');

        let nombresClases = clasesNivel.map(clase => clase['titulo']);
        let descripcionesClases = clasesNivel.map(clase => clase['descripcion']);
        let claseIDs = clasesNivel.map(clase => clase['ID_clase']);

        storedClases = [...new Set([...storedClases, ...nombresClases])];
        storedDescripciones = [...new Set([...storedDescripciones, ...descripcionesClases])];
        storedClaseIDs = [...new Set([...storedClaseIDs, ...claseIDs])];

        localStorage.setItem(`Nivel_${nivel}_Clases`, JSON.stringify(storedClases));
        localStorage.setItem(`Nivel_${nivel}_Descripciones`, JSON.stringify(storedDescripciones));
        localStorage.setItem(`Nivel_${nivel}_Clases_IDs`, JSON.stringify(storedClaseIDs));

        // Add "file already in database" for every class video in this level
        if(clasesNivel.length > 0) {
            storedVideos = [];
            clasesNivel.forEach(clase => {
                storedVideos.push(null);
            });
        }

        // Store the updated list of compressed videos
        localStorage.setItem(`Nivel_${nivel}_CompressedVideos`, JSON.stringify(storedVideos));

        // Log the stored data for debugging
        console.log(`Stored Clases for Nivel ${nivel}:`, storedClases);
        console.log(`Stored Descripciones for Nivel ${nivel}:`, storedDescripciones);
        console.log(`Stored Clase IDs for Nivel ${nivel}:`, storedClaseIDs);
        console.log(`Stored Videos for Nivel ${nivel}:`, storedVideos);
    });

    // Process and store aprendizajes
    let storedAprendizajes = [];

    aprendizajes.forEach(aprendizajeData => {
        let aprendizajeID = aprendizajeData['ID_aprendizaje'];
        let aprendizajeText = aprendizajeData['aprendizaje'];

        storedAprendizajes.push({
            ID_aprendizaje: aprendizajeID,
            aprendizaje: aprendizajeText
        });
    });

    localStorage.setItem(`Aprendizajes`, JSON.stringify(storedAprendizajes));

    // Log aprendizajes for debugging
    console.log(`Stored Aprendizajes for Curso ${localStorage.getItem('ID_curso')}:`, storedAprendizajes);
}




function validacionCurso(){
    let alert = "";
    let maxSize = 64 * 1024; // 64 KB for BLOB

    if($("#preview-image").attr("src") == ""){
        if ($("#file").get(0).files.length === 0) {
            alert += "Seleccione una imagen\n";
        } else {
            let file = $("#file").get(0).files[0];
            if (file.size > maxSize) {
                alert += "El archivo es demasiado grande. El tamaño máximo es de 64 KB.\n";
            }
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

function saveLocalsBeforeRedirect(n_nivel){
    /*
    localStorage.setItem('ImagenCurso', curso['imagen']);
     */
    localStorage.setItem('NombreCurso', $("#inputNombreCurso").val().trim());
    localStorage.setItem('PrecioCurso', $("#inputPrecio").val().trim());
    localStorage.setItem('DescripcionCurso', $("#inputDescripcion").val().trim());
    localStorage.setItem('CategoriaCurso', document.getElementById('categoryDropdown').textContent);
    localStorage.setItem('ID_categoria', document.getElementById('inputCategoria').value);
    localStorage.setItem('NumNiveles', document.getElementById('NumNiveles').value);

    const aprendizajesInputs = document.querySelectorAll("input[name='aprendizajes[]']");
    const idAprendizajes = document.querySelectorAll("input[name='ID_aprendizaje[]']");
    let aprendizajes = [];

    aprendizajesInputs.forEach((input,index) => {
        if (idAprendizajes[index].value == null) {
            idAprendizajes[index].value = index;
        }
        aprendizajes.push({
            ID_aprendizaje: idAprendizajes[index].value,   
            aprendizaje: input.value
        });
    });
    localStorage.setItem('Aprendizajes', JSON.stringify(aprendizajes));

    localStorage.setItem('nivel', n_nivel);
    if(document.getElementById('ID_cur')){
        localStorage.setItem('ID_cur', document.getElementById('ID_cur').value);
    }

    window.location.href = '/nueva_clase';
}