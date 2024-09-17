
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
    if($("#inputCorreo").val().trim() == ""){
        alertInput("correo");
        return false;
    }
    if($("#inputContra").val().trim() == ""){
        alertInput("contraseña");
        return false;
    }
    return true;

}
function register() {
    if ($("#inputNombres").val().trim() == "") {
        alertInput("nombre");
        return false;
    }
    if ($("#inputApellidoPaterno").val().trim() == "") {
        alertInput("apellido paterno");
        return false;
    }
    if ($("#inputApellidoMaterno").val().trim() == "") {
        alertInput("apellido materno");
        return false;
    }
    var fecha = $("#inputFecha").val().trim();
    if (fecha == "") {
        alertInput("fecha de nacimiento");
        return false;
    }
    var minDate = new Date('1900-01-01');
    var today = new Date();
    var inputDate = new Date(fecha);
    if (inputDate < minDate || inputDate > today) {
        alertCustom("La fecha debe estar entre el 1 de enero de 1900 y hoy.");
        return false;
    }
    if($("#inputCorreo").val().trim() == ""){
        alertInput("correo");
        return false;
    }
    if($("#inputContra").val().trim() == ""){
        alertInput("contraseña");
        return false;
    }
    alert($('input[name="options"]:checked').attr('id'));

    Swal.fire({
        title: "Registro exitoso",
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
            toDashboard();
        }
    });
    return false;
}

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


function LockComent(){
  Swal.fire({
    title: "¿Está seguro de bloquear el usuario?",
    color: '#86bd7b',
    background: '#11041F',
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
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      Swal.fire("Usuario bloqueado", "", "success");
    } else if (result.isDenied) {
      Swal.fire("Este mensaje se mantiene", "", "info");
    }
  });
}

async function  EditCategory() {
    const { value: formValues } = await Swal.fire({
        title: "Multiple inputs",
        html: `
        <input id="category1" class="swal2-input">
        <input id="description1" class="swal2-input">
        `,
        focusConfirm: false,
        preConfirm: () => {
        return [
            document.getElementById("category1").value,
            document.getElementById("description1").value
        ];
        }
    });
    if (formValues) {
        Swal.fire(JSON.stringify(formValues));
    }
}
  

