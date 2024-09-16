
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
  

