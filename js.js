//redirecciones
function toLogin() {
    window.location.href = 'login.html';
  }

  function toSignIn() {
    window.location.href = 'signIn.html';
  }

//Lessons, descargas Esto me lo di
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
  