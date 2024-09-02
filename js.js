function toLogin() {
    window.location.href = 'login.html';
  }

  function toSignIn() {
    window.location.href = 'signIn.html';
  }


//ALERTS
/**/
function try1(){
  Swal.fire({
    title: "¿Está seguro de bloquear el usuario?",
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: "Bloquear",
    denyButtonText: `No bloquear`
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      Swal.fire("Usuario bloqueado", "", "success");
    } else if (result.isDenied) {
      Swal.fire("Hubo un error", "", "info");
    }
  });
}
  