
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

function toLast(){
    window.history.back();
}

function toClass(ID_curso){
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/class';
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'ID_curso';
    input.value = ID_curso;
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
}

function toDashboard(){
    window.location.href = '/dashboard';
}


function formatDate(dateString) {
    if(dateString == null){
        return "Sin fecha";
    }
    const date = new Date(dateString);
    const day = String(date.getDate()).padStart(2, '0');
    let month = String(date.getMonth() + 1).padStart(2, '0');
    switch (month) {
        case '01':
            month = 'Ene';
            break;
        case '02':
            month = 'Feb';
            break;
        case '03':
            month = 'Mar';
            break;
        case '04':
            month = 'Abr';
            break;
        case '05':
            month = 'May';
            break;
        case '06':
            month = 'Jun';
            break;
        case '07':
            month = 'Jul';
            break;
        case '08':
            month = 'Ago';
            break;
        case '09':
            month = 'Sep';
            break;
        case '10':
            month = 'Oct';
            break;
        case '11':
            month = 'Nov';
            break;
        case '12':
            month = 'Dic';
            break;
    }

    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
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

function selectCategory(category, id, idInput , idCat) {
    document.getElementById(id).textContent = category;
    if (idInput !== undefined) {
        document.getElementById(idInput).value = idCat;
    }
}



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


/*const stars = document.querySelectorAll('.star');
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
*/

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

/*function borrarCurso(){
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
}*/


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
                    'Content-Type': 'application/json'
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



function busqueda(event) {
    event.preventDefault(); 

    const searchType = document.getElementById('searchType').value;
    
    const searchQuery = document.getElementById('searchQuery').value;
    
    const url = `/dashboard?type=${encodeURIComponent(searchType)}&query=${encodeURIComponent(searchQuery)}`;
    
    window.location.href = url;
    
    return false;
}
