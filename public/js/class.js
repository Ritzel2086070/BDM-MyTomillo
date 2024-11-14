function toPay(ID_curso, porNivel) {
    saveCart(ID_curso, porNivel);    
    window.location.href = '/pay';
}
function saveCart(ID_curso, porNivel) {
    const carrito = localStorage.getItem('Carrito');

    if (carrito) {
        const carritoArray = JSON.parse(carrito);
        carritoArray.push({ ID_curso, porNivel });
        localStorage.setItem('Carrito', JSON.stringify(carritoArray));
    } else {
        localStorage.setItem('Carrito', JSON.stringify([{ ID_curso, porNivel }]));
    }
    alertCustom('Curso añadido al carrito');
}

function toLesson(ID_curso){
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/lesson';

    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'ID_curso';
    input.value = ID_curso;
    form.appendChild(input);

    document.body.appendChild(form);
    form.submit();
}

function LockComent(ID_comentario, ID_curso){
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
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/lockComment';

            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'ID_comentario';
            input.value = ID_comentario;
            form.appendChild(input);

            const input2 = document.createElement('input');
            input2.type = 'hidden';
            input2.name = 'ID_curso';
            input2.value = ID_curso;
            form.appendChild(input2);

            document.body.appendChild(form);
            form.submit();
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
