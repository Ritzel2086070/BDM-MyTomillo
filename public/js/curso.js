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
    
    
};
function validacionCurso(){
    let maxSize = 64 * 1024; // 64 KB for BLOB

    if ($("#file").get(0).files.length === 0) {
        alertCustom("Seleccione una imagen");
    } else {
        let file = $("#file").get(0).files[0];
        if (file.size > maxSize) {
            alertCustom("La imágen es demasiado grande. El tamaño máximo es de 64 KB.");
        }
    }

    if($("#inputNombreCurso").val().trim() == ""){
        alertInput("nombre del curso");
        return false;
    }
    if($("#inputNombreCurso").val().trim().length > 100){
        alertCustom("El nombre del curso no debe exceder los 100 caracteres");
        return false;
    }

    var selectedCategory = document.getElementById('categoryDropdown').textContent;
    var defaultText = "Seleccione categoría del nuevo curso";
    if (selectedCategory === defaultText) {
        alertCustom("Por favor, seleccione una categoría válida.");
        return false; 
    }
    const precio = parseFloat($("#inputPrecio").val().trim());
    if(isNaN(precio) || precio === ""){
        alertInput("precio del curso");
        return false;
    }
    if(precio < 0){
        alertCustom("El precio del curso no puede ser negativo");
        return false;
    }
    if(precio > 100000){
        alertCustom("El precio del curso no puede ser mayor a 100,000");
        return false;
    }

    const aprendizajesInputs = document.querySelectorAll("input[name='aprendizajes[]']");
    
    aprendizajesInputs.forEach((input, index) => {
        if (input.value.trim() === "") {
            alertInput(`aprendizaje #${index + 1}`);
            return false;
        }
    });

    if($("#inputDescripcion").val().trim() == ""){
        alertInput("descripción del curso");
        return false;
    }
    if($("#inputDescripcion").val().trim().length > 65535){
        alertCustom("La descripción del curso no debe exceder los 65,535 caracteres");
        return false;
    }
    
    Swal.fire({
        title: "Curso creado",
        color: '#86bd7b',
        background: '#11041F',
        confirmButtonOutline: 'none',
        confirmButtonText: "Aceptar",
        icon: "success",
        customClass: {
            confirmButton: 'confirm-button-class',
            title: 'title-class',
            icon: 'icon-class'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            toProfile();
        }
    });
    return false;
}