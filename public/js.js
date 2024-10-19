
//redirecciones
function toLogin() {
    window.location.href = '/login';
}

function toSignIn() {
    window.location.href = '/signin';
}

function toProfile() {
    
    window.location.href = '/profile';
}

function toPay() {
    
    window.location.href = '/pay';
}

function toLast(){
    window.history.back();
}

function toClass(){
    window.location.href = '/class';
}

function toLesson(){
    window.location.href = '/lesson';
}

function toDashboard(){
    window.location.href = '/dashboard';
}
//Validaciones

function login(){
    let alert = "";
    if($("#inputCorreo").val().trim() == ""){
        alert+= "Ingrese su correo\n";
    }
    if($("#inputCorreo").val().trim().length > 50){
        alert+= "El correo no debe exceder los 50 caracteres\n";
    }
    if($("#inputContra").val().trim() == ""){
        alert+= "Ingrese su contraseña\n";
    }
    if($("#inputContra").val().trim().length > 64){
        alert+= "La contraseña no debe exceder los 64 caracteres\n";
    }
    if(alert != ""){
        alertCustom(alert);
        return false;
    }
    return true;
}

function logout(){
    Swal.fire({
        title: "¿Está seguro de cerrar sesión?",
        color: '#86bd7b',
        background: '#2D2D2D',
        confirmButtonOutline: 'none',
        showCancelButton: true,
        confirmButtonText: "Cerrar sesión",
        cancelButtonText: "Cancelar",
        customClass: {
            confirmButton: 'confirm-button-class',
            cancelButton: 'cancel-button-class',
            title: 'title-class',
            icon: 'icon-class'
        },
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/logout';
        }
    });
}

function edit(){
    let alert = "";

    if ($("#inputNombres").val().trim() == "") {
        alert+= "Ingrese su nombre\n";
    }
    if ($("#inputNombres").val().trim().length > 50) {
        alert+= "El nombre no debe exceder los 50 caracteres\n";
    }
    if ($("#inputApellidoPaterno").val().trim() == "") {
        alert+= "Ingrese su apellido paterno\n";
    }
    if ($("#inputApellidoPaterno").val().trim().length > 50) {
        alert+= "El apellido paterno no debe exceder los 50 caracteres\n";
    }
    if ($("#inputApellidoMaterno").val().trim() == "") {
        alert+= "Ingrese su apellido materno\n";
    }
    if ($("#inputApellidoMaterno").val().trim().length > 50) {
        alert+= "El apellido materno no debe exceder los 50 caracteres\n";
    }
    var fecha = $("#inputFecha").val().trim();
    if (fecha == "") {
        alert+= "Ingrese su fecha de nacimiento\n";
    }
    var minDate = new Date('1900-01-01');
    var today = new Date();
    var inputDate = new Date(fecha);
    if (inputDate < minDate || inputDate > today) {
        alert+= "La fecha debe estar entre el 1 de enero de 1900 y hoy.\n";
    }
    if($("#inputCorreo").val().trim() == ""){
        alert+= "Ingrese su correo\n";
    }
    let regex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+([a-z0-9\.!#$%&'*+/=?^_`{|}~-]+)*@([a-z0-9]+\.)+[a-z0-9]+/;
    if(!regex.test($("#inputCorreo").val().trim())){
        alert+= "El correo es inválido\n";
    }
    if($("#inputCorreo").val().trim().length > 50){
        alert+= "El correo no debe exceder los 50 caracteres\n";
    }

    if(alert != ""){
        alertCustom(alert);
        return false;
    }

    return true;
}

function register() {
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

    if ($("#inputNombres").val().trim() == "") {
        alert+= "Ingrese su nombre\n";
    }
    if ($("#inputNombres").val().trim().length > 50) {
        alert+= "El nombre no debe exceder los 50 caracteres\n";
    }
    if ($("#inputApellidoPaterno").val().trim() == "") {
        alert+= "Ingrese su apellido paterno\n";
    }
    if ($("#inputApellidoPaterno").val().trim().length > 50) {
        alert+= "El apellido paterno no debe exceder los 50 caracteres\n";
    }
    if ($("#inputApellidoMaterno").val().trim() == "") {
        alert+= "Ingrese su apellido materno\n";
    }
    if ($("#inputApellidoMaterno").val().trim().length > 50) {
        alert+= "El apellido materno no debe exceder los 50 caracteres\n";
    }
    var fecha = $("#inputFecha").val().trim();
    if (fecha == "") {
        alert+= "Ingrese su fecha de nacimiento\n";
    }
    var minDate = new Date('1900-01-01');
    var today = new Date();
    var inputDate = new Date(fecha);
    if (inputDate < minDate || inputDate > today) {
        alert+= "La fecha debe estar entre el 1 de enero de 1900 y hoy.\n";
    }
    if($("#inputCorreo").val().trim() == ""){
        alert+= "Ingrese su correo\n";
    }
    let regex = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+([a-z0-9\.!#$%&'*+/=?^_`{|}~-]+)*@([a-z0-9]+\.)+[a-z0-9]+/;
    if(!regex.test($("#inputCorreo").val().trim())){
        alert+= "El correo es inválido\n";
    }
    if($("#inputCorreo").val().trim().length > 50){
        alert+= "El correo no debe exceder los 50 caracteres\n";
    }
    if($("#inputContra").val().trim() == ""){
        alert+= "Ingrese su contraseña\n";
    }
    if($("#inputContra").val().trim().length > 64){
        alert+= "La contraseña no debe exceder los 64 caracteres\n";
    }
    var pass = $("#inputContra").val().trim();
    regex = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[(¡”#$%&/=’?¡¿:;,.\-_+*{\][})])(?=.{8,64})/;
    if(!regex.test(pass)){
        alert+= "La contraseña debe tener al menos 8 caracteres, una mayúscula, un número y un carácter especial.\n";
    }

    
    //alert($('input[name="options"]:checked').attr('id'));

    if(alert != ""){
        alertCustom(alert);
        return false;
    }

    return true;
}

function selectCategory(category) {
    $("#categoryDropdown").textContent = category;
}

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
};

/*function validarFecha(){
    var fecha = $("#inputFecha").val().trim();
    if (fecha.length === 10) {
        var minDate = new Date('1900-01-01');
        var today = new Date();
        var inputDate = new Date(fecha);
        if (inputDate < minDate || inputDate > today) {
            alertCustom("La fecha debe estar entre el 1 de enero de 1900 y hoy.");
            return false;
        }
        return true;
    }
    
}*/



function validacionCurso(){
    if($("#inputNombreCurso").val().trim() == ""){
        alertInput("nombre del curso");
        return false;
    }
    if($("#inputNombreCurso").val().trim().length > 100){
        alertCustom("El nombre del curso no debe exceder los 100 caracteres");
        return false;
    }
    if($("#inputDescripcion").val().trim() == ""){
        alertInput("descripción del curso");
        return false;
    }
    if($("#inputDescripcion").val().trim().length > 65535){
        alertCustom("La descripción del curso no debe exceder los 65,535 caracteres");
        return false;
    }

    var selectedCategory = document.getElementById('categoryDropdown').textContent;
    var defaultText = "Seleccione categoría del nuevo curso";
    if (selectedCategory === defaultText) {
        alert("Por favor, seleccione una categoría válida.");
        return false; 
    }
    
    const precio = parseFloat($("#inputPrecio").val().trim());
    if(isNaN(precio) || precio == ""){
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

function enableDisableProfile(){
    if($("#btnEnableDisable").text() === "Editar perfil"){
        $("#inputNombres").prop('readonly', false);
        $("#inputApellidoPaterno").prop('readonly', false);
        $("#inputApellidoMaterno").prop('readonly', false);
        $("#inputFecha").prop('readonly', false);
        $("#inputCorreo").prop('readonly', false);
        $("#selectGenero").prop('disabled', false);
        $("#btnEnableDisable").text("Guardar cambios");
    } else {
        
        $("#inputNombres").prop('readonly', true);
        $("#inputApellidoPaterno").prop('readonly', true);
        $("#inputApellidoMaterno").prop('readonly', true);
        $("#inputFecha").prop('readonly', true);
        $("#inputCorreo").prop('readonly', true);
        $("#selectGenero").prop('readonly', false);
        $("#btnEnableDisable").text("Editar perfil");
        $("#editForm").submit();
    }
    
}


function sendMessage(){
    //validacion mensaje id=textareaMensaje
    return true;
}


function updateImage(event) {
    var file = event.target.files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('profileImage').src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
}


const stars = document.querySelectorAll('.star');
const filledStar = 'images/estrella.png';
const emptyStar = 'images/estrellaMala.png';

function setRating(rating) {
    stars.forEach(star => {
        const starValue = parseInt(star.getAttribute('data-star'));
        if (starValue <= rating) {
            star.src = filledStar;
        } else {
            star.src = emptyStar;
        }
    });
}

stars.forEach(star => {
    star.addEventListener('click', function() {
        const rating = parseInt(star.getAttribute('data-star'));
        setRating(rating);
    });
});

//Lessons, descargas Esto me lo dio chatgpt xd
function downloadFile(filename) {
    const link = document.createElement('a');
    link.href = filename;
    link.download = filename;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function downloadAll() {
    const files = ['Doc.pdf', 'Doc2.pdf'];
    files.forEach(file => downloadFile(file));
}

function goToLink() {
    const link = document.getElementById('videoLink').value;
    window.open(link, '_blank');
}

//ALERTS
/**/
function alertInput(campo){
    Swal.fire({
        title: "Ingrese su " + campo,
        color: '#86bd7b',
        background: '#11041F',
        confirmButtonOutline: 'none',
        confirmButtonText: "Aceptar",
        customClass: {
          confirmButton: 'confirm-button-class',
          title: 'title-class',
          icon: 'icon-class'
        },
      });
}
function alertCustom(title){
    Swal.fire({
        title: title,
        color: '#86bd7b',
        background: '#11041F',
        confirmButtonOutline: 'none',
        confirmButtonText: "Aceptar",
        customClass: {
          confirmButton: 'confirm-button-class',
          title: 'title-class',
          icon: 'icon-class'
        },
        });
}
function alertSuccess(title){
    Swal.fire({
        title: title,
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
    });
}

async function BuscarDestinatario(){
    const { value: usuario } = await Swal.fire({
        color: '#86bd7b',
        background: '#2D2D2D',
        title: "Nombre del usuario",
        input: "text",
        inputPlaceholder: "Nombre del usuario",
        showCancelButton: true,
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar",
        customClass: {
            confirmButton: 'confirm-button-class',
            cancelButton: 'cancel-button-class',
            title: 'title-class',
        },
        inputAttributes: {
        maxlength: "150",
        autocapitalize: "off",
        autocorrect: "off"
        }
    });
    if (usuario) {
        
    }
}
function LockComent(){
    Swal.fire({
      title: "¿Está seguro de bloquear el comentario?",
      color: '#86bd7b',
      background: '#2D2D2D',
      confirmButtonOutline: 'none',
      showCancelButton: true,
      confirmButtonText: "Bloquear",
      cancelButtonText: "Cancelar",
      customClass: {
        confirmButton: 'confirm-button-class',
        cancelButton: 'cancel-button-class',
        title: 'title-class',
        icon: 'icon-class'
      },
      }).then((result) => {
          if (result.isConfirmed) {
          Swal.fire({
              color: '#86bd7b',
              background: '#2D2D2D',
              icon: "success",
              text: "Comentario bloqueado correctamente",
              showConfirmButton: false,
              timer: 1500
              });
          } else if (result.isDenied) {
          Swal.fire({
              color: '#86bd7b',
              background: '#2D2D2D',
              icon: "error",
              text: "El comentario no pudo ser bloqueado",
              showConfirmButton: false,
              timer: 1500
              });
          }
      });
  }
  
function LockUser(){
    Swal.fire({
    title: "¿Está seguro de bloquear el usuario?",
    color: '#86bd7b',
    background: '#2D2D2D',
    confirmButtonOutline: 'none',
    showCancelButton: true,
    confirmButtonText: "Bloquear",
    cancelButtonText: "Cancelar",
    customClass: {
        confirmButton: 'confirm-button-class',
        cancelButton: 'cancel-button-class',
        title: 'title-class',
        icon: 'icon-class'
    },
    }).then((result) => {
        if (result.isConfirmed) {
        Swal.fire({
            color: '#86bd7b',
            background: '#2D2D2D',
            icon: "success",
            text: "Usuario bloqueado correctamente",
            showConfirmButton: false,
            timer: 1500
            });
        } else if (result.isDenied) {
        Swal.fire({
            color: '#86bd7b',
            background: '#2D2D2D',
            icon: "error",
            text: "El usuario no pudo ser bloqueado",
            showConfirmButton: false,
            timer: 1500
            });
        }
    });
}

function UnlockUser(){
    Swal.fire({
    title: "¿Está seguro de desbloquear el usuario?",
    color: '#86bd7b',
    background: '#2D2D2D',
    confirmButtonOutline: 'none',
    showCancelButton: true,
    confirmButtonText: "Desbloquear",
    cancelButtonText: "Cancelar",
    customClass: {
        confirmButton: 'confirm-button-class',
        cancelButton: 'cancel-button-class',
        title: 'title-class',
        icon: 'icon-class'
    },
    }).then((result) => {
        if (result.isConfirmed) {
        Swal.fire({
            color: '#ccc',
            background: '#2D2D2D',
            icon: "success",
            text: "Usuario desbloqueado correctamente",
            showConfirmButton: false,
            timer: 1500
            });
        } else if (result.isDenied) {
        Swal.fire({
            color: '#ccc',
            background: '#2D2D2D',
            icon: "error",
            text: "El usuario no pudo ser desbloqueado",
            showConfirmButton: false,
            timer: 1500
            });
        }
    });
}

function borrarCurso(){
    Swal.fire({
    title: "¿Está seguro de eliminar el curso?",
    color: '#86bd7b',
    background: '#2D2D2D',
    confirmButtonOutline: 'none',
    showCancelButton: true,
    confirmButtonText: "Eliminar",
    cancelButtonText: "Cancelar",
    customClass: {
        confirmButton: 'confirm-button-class',
        cancelButton: 'cancel-button-class',
        title: 'title-class',
        icon: 'icon-class'
    },
    }).then((result) => {
        if (result.isConfirmed) {
        Swal.fire({
            color: '#86bd7b',
            background: '#2D2D2D',
            icon: "success",
            text: "Curso eliminado correctamente",
            showConfirmButton: false,
            timer: 1500
            });
        } else if (result.isDenied) {
        Swal.fire({
            color: '#86bd7b',
            background: '#2D2D2D',
            icon: "error",
            text: "El curso no pudo ser eliminado",
            showConfirmButton: false,
            timer: 1500
            });
        }
    });
}

function DeleteCategory(){
    category = document.getElementById("category1").value;
    Swal.fire({
    title: "¿Está seguro de eliminar esta categoría?",
    color: '#86bd7b',
    background: '#2D2D2D',
    html: `
        <p value="">`+ category + `</p>
        `,
    confirmButtonOutline: 'none',
    showCancelButton: true,
    confirmButtonText: "Confirmar",
    cancelButtonText: "Cancelar",
    customClass: {
        confirmButton: 'confirm-button-class',
        cancelButton: 'cancel-button-class',
        title: 'title-class',
        icon: 'icon-class'
    },
    }).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
            color: '#86bd7b',
            background: '#2D2D2D',
            icon: "success",
            text: "Categoría eliminada correctamente",
            showConfirmButton: false,
            timer: 1500
            });
    } else if (result.isDenied) {
        Swal.fire({
            color: '#86bd7b',
            background: '#2D2D2D',
            icon: "error",
            text: "La categoría no puedo ser eliminada",
            showConfirmButton: false,
            timer: 1500
            });
    }
    });
}

async function  EditCategory() {
    category = document.getElementById("category1").value;
    description = document.getElementById("description1").value;

    const { value: formValues } = await Swal.fire({
        color: '#86bd7b',
        background: '#2D2D2D',
        title: "Editar categoria",
        confirmButtonOutline: 'none',
        showCancelButton: true,
        confirmButtonText: "Guardar",
        cancelButtonText: "Cancelar",
        customClass: {
            confirmButton: 'confirm-button-class',
            cancelButton: 'cancel-button-class',
            title: 'title-class',
            icon: 'icon-class'
        },
        html: `
        <input id="category1.1" class="input-alert" value="`+ category + `">
        <textarea rows="6" id="description1.1" class="textarea-alert mt-4">`+ description + `</textarea>
        `,
        focusConfirm: false,
        preConfirm: () => {
        return [
            category = document.getElementById("category1.1").value,
            description = document.getElementById("description1.1").value
        ];
        }
    });
    if (formValues) {
        if (category.trim() == "") {
            alertInput("nombre de la categoría");
            return false;
        }
        if (category.trim().length > 50) {
            alertCustom("El nombre de la categoría no debe exceder los 50 caracteres");
            return false;
        }
        Swal.fire({
            color: '#86bd7b',
            background: '#2D2D2D',
            title: "Guardar cambios",
            confirmButtonOutline: 'none',
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
            customClass: {
                confirmButton: 'confirm-button-class',
                cancelButton: 'cancel-button-class',
                title: 'title-class',
                icon: 'icon-class'
            },
            html: `
            <div class="d-flex flex-column align-items-start">
            <p>Nombre de la categoría: </p>
            <input readonly id="category1.1" class="input-alert" value="`+ category + `">
            <p class="mt-4">Descripcción de la categoría: </p>
            <textarea rows="6" readonly id="description1.1" class="textarea-alert"> `+ description + ` </textarea>
            </div>
            `,
        }, JSON.stringify(formValues));
    }
}

function nuevaCategoria(){
    Swal.fire({
        color: '#ccc',
        background: '#2D2D2D',
        title: "Nueva categoría",
        confirmButtonOutline: 'none',
        showCancelButton: true,
        confirmButtonText: "Guardar",
        cancelButtonText: "Cancelar",
        customClass: {
            confirmButton: 'confirm-button-class',
            cancelButton: 'cancel-button-class',
            title: 'title-class',
            icon: 'icon-class'
        },
        html: `
        <input id="category1" class="input-alert" placeholder="Nombre de la categoría">
        <textarea rows="6" id="description1" class="textarea-alert mt-4" placeholder="Descripción de la categoría"></textarea>
        `,
        focusConfirm: false,
        preConfirm: () => {
            return [
                category = document.getElementById("category1").value,
                description = document.getElementById("description1").value
            ];
        }
    }).then((result) => {
        if (result.isConfirmed) {
            if ($(("#category1")).val().trim() == "") {
                alertInput("nombre de la categoría");
                return false;
            }
            if (category.val().trim().length > 50) {
                alertCustom("El nombre de la categoría no debe exceder los 50 caracteres");
                return false;
            }
            Swal.fire({
                color: '#ccc',
                background: '#2D2D2D',
                title: "Categoría guardada",
                confirmButtonOutline: 'none',
                icon: "success",
                text: "Categoría guardada correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
}

function readDescription(){
    Swal.fire({
        color: '#ccc',
        background: '#2D2D2D',
        title: "Descripción de categoría",
        text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
        icon: "info",
        customClass: {
            confirmButton: 'confirm-button-class',
            title: 'title-class',
        }
    });
}

async function changePassword(){
    const { value: password } = await Swal.fire({
        color: '#86bd7b',
        background: '#2D2D2D',
        title: "Ingresa tu contraseña",
        input: "password",
        text: "Contraseña actual",
        inputPlaceholder: "Ingresa tu contraseña",
        showCancelButton: true,
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar",
        customClass: {
            confirmButton: 'confirm-button-class',
            cancelButton: 'cancel-button-class',
            title: 'title-class',
        },
        inputAttributes: {
        maxlength: "64",
        autocapitalize: "off",
        autocorrect: "off"
        }
    });
    if (password) {
        const { value: newPassword } = await Swal.fire({
            color: '#ccc',
            background: '#2D2D2D',
            title: "Ingresa nueva contraseña",
            input: "password",
            text: "Contraseña nueva",
            inputPlaceholder: "Ingresa tu contraseña",
            showCancelButton: true,
            confirmButtonText: "Confirmar",
            cancelButtonText: "Cancelar",
            customClass: {
                confirmButton: 'confirm-button-class',
                cancelButton: 'cancel-button-class',
                title: 'title-class',
            },
            inputAttributes: {
            maxlength: "64",
            autocapitalize: "off",
            autocorrect: "off"
            }
        });

        if (newPassword) {
            if(newPassword.trim() == ""){
                alertInput("contraseña");
                return;
            }
            if(newPassword.trim().length > 64){
                alertCustom("La contraseña no debe exceder los 64 caracteres");
                return;
            }
            var pass = newPassword.trim();
            var re = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[(¡”#$%&/=’?¡¿:;,.\-_+*{\][})])(?=.{8,64})/;
            if(!re.test(pass)){
                alertCustom("La contraseña debe tener al menos 8 caracteres, una mayúscula, un número y un carácter especial.");
                return;
            }

            fetch('/changePassword', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'  // This is missing
                },
                body: JSON.stringify({ password, newPassword })
            }).then((response) => {
                if(!response.ok){
                    throw response;
                }
                return response.json();
            }).then((response) => {
                if(response.message === "success"){
                    alertSuccess("Contraseña cambiada correctamente");
                } else {
                    alertCustom(response.message);
                }
            }).catch((error) => {
                alertCustom("Error al cambiar la contraseña:" + error);
            });
            
        }
    }
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

function seeDegree() {
    Swal.fire({
        color: '#ccc',
        background: '#2D2D2D',
        title: "Tu diploma",
        text: "¡Felicidades!",
        imageUrl: "DiplomaBDM.png",
        imageWidth: 400,
        imageHeight: 300,
        imageAlt: "Diploma",
        customClass: {
            confirmButton: 'confirm-button-class',
            title: 'title-class',
        },
        footer: '<button id="downloadDiplomaButton" class="swal2-confirm swal2-styled">Descargar Diploma</button>'
    });

    document.getElementById('downloadDiplomaButton').addEventListener('click', downloadDiploma);
}

function downloadDiploma() {
    downloadFile("DiplomaBDM.png");
}