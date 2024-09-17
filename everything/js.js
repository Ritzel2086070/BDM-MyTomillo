
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
//Validaciones
function login(){

    return true;

}
function register() {
    if ($("#labelNombres").val().trim() == "") {
        alert("El campo de nombres no puede estar vacío");
        return false;
    }
    if ($("#labelApellidoPaterno").val().trim() == "") {
        alert("El campo de apellidos no puede estar vacío");
        return false;
    }
    

    return true;
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
          maxlength: "10",
          autocapitalize: "off",
          autocorrect: "off"
        }
      });
      if (password) {
        Swal.fire({
            color: '#ccc',
            background: '#2D2D2D',
            title: "Ingresa nueva contraseña",
            input: "password",
            text: "Contraseña nueva",
            inputPlaceholder: "Ingresa tu contraseña",
            customClass: {
                confirmButton: 'confirm-button-class',
                title: 'title-class',
            },
            inputAttributes: {
              maxlength: "10",
              autocapitalize: "off",
              autocorrect: "off"
            }
        },
        `Entered password: ${password}`);
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