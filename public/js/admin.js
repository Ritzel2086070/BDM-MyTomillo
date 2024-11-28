async function  EditCategory(id, nombre, descripcion) {
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
        <input id="category1.1" class="input-alert" value="`+ nombre + `">
        <textarea rows="6" id="description1.1" class="textarea-alert mt-4">`+ descripcion + `</textarea>
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
        const [category, description] = formValues;
        if (category.trim() == "") {
            alertCustom("Ingrese el nombre de la categoría");
            return;
        }
        if (category.trim().length > 50) {
            alertCustom("El nombre de la categoría no debe exceder los 50 caracteres");
            return;
        }
        if (description.trim() == "") {
            alertCustom("Ingrese la descripción de la categoría");
            return;
        }
        if (description.trim().length > 512) {
            alertCustom("La descripción de la categoría no debe exceder los 512 caracteres");
            return;
        }
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/editCategory';

        const categoryInput = document.createElement('input');
        categoryInput.type = 'hidden';
        categoryInput.name = 'category';
        categoryInput.value = category;

        const descriptionInput = document.createElement('input');
        descriptionInput.type = 'hidden';
        descriptionInput.name = 'description';
        descriptionInput.value = description;

        const idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id';
        idInput.value = id;

        form.appendChild(categoryInput);
        form.appendChild(descriptionInput);
        form.appendChild(idInput);
        
        document.body.appendChild(form);

        form.submit();
    }
}

async function nuevaCategoria(){
    const { isConfirmed, value: result } = await Swal.fire({
        color: '#ccc',
        background: '#2D2D2D',
        title: "Nueva categoría",
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
        <input id="input_category" class="input-alert" placeholder="Nombre de la categoría">
        <textarea rows="6" id="input_description" class="textarea-alert mt-4" placeholder="Descripción de la categoría"></textarea>
        `,
        focusConfirm: false,
        preConfirm: () => {
            const category = document.getElementById("input_category").value;
            const description = document.getElementById("input_description").value;
    
            return { category, description };
        }
    });
    if(isConfirmed){
        if (result) {
            const { category, description } = result;
            if (category.trim() == "") {
                alertCustom("Ingrese el nombre de la categoría");
                return;
            }
            if (category.trim().length > 50) {
                alertCustom("El nombre de la categoría no debe exceder los 50 caracteres");
                return;
            }
            if (description.trim() == "") {
                alertCustom("Ingrese la descripción de la categoría");
                return;
            }
            if (description.trim().length > 512) {
                alertCustom("La descripción de la categoría no debe exceder los 512 caracteres");
                return;
            }
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/newCategory';

            const categoryInput = document.createElement('input');
            categoryInput.type = 'hidden';
            categoryInput.name = 'category';
            categoryInput.value = category;

            const descriptionInput = document.createElement('input');
            descriptionInput.type = 'hidden';
            descriptionInput.name = 'description';
            descriptionInput.value = description;

            form.appendChild(categoryInput);
            form.appendChild(descriptionInput);

            document.body.appendChild(form);

            form.submit();

        }
    }
    
    
}


function DeleteCategory(id, name){
    Swal.fire({
    title: "¿Está seguro de eliminar esta categoría?",
    color: '#86bd7b',
    background: '#2D2D2D',
    html: `
        <p value="">`+ name + `</p>
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
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/deleteCategory';

        const idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id';
        idInput.value = id;

        form.appendChild(idInput);
        document.body.appendChild(form);

        form.submit();
    } else if (result.isDenied) {
        Swal.fire({
            color: '#86bd7b',
            background: '#2D2D2D',
            icon: "error",
            text: "La categoría no pudo ser eliminada",
            showConfirmButton: false,
            timer: 1500
            });
    }
    });
}

function readDescription(descripcion){
    Swal.fire({
        color: '#ccc',
        background: '#2D2D2D',
        title: "Descripción de categoría",
        text: descripcion,
        icon: "info",
        customClass: {
            confirmButton: 'confirm-button-class',
            title: 'title-class',
        }
    });
}

let usuariosBloqueados = [];

function filterUsers() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const filteredUsers = usuariosBloqueados.filter(user => {
        const fullName = (user.nombres + ' ' + user.apellido_paterno + ' ' + user.apellido_materno).toLowerCase();
        return fullName.includes(searchTerm);
    });
    fillContainer(filteredUsers);
}


function fillContainer(data) {
    const contenedor = document.getElementById('contenedorUsuariosBloqueados');
    contenedor.innerHTML = '';

    data.forEach(user => {
    const tr = document.createElement('tr');
    const td1 = document.createElement('td');
    td1.textContent = user.nombres + ' ' + user.apellido_paterno + ' ' + user.apellido_materno;
    const td2 = document.createElement('td');
    td2.textContent = formatDate(user.f_ultimasesion);
    const td3 = document.createElement('td');
    const btn = document.createElement('button');
    btn.classList.add('btn', 'sub-btn', 'btn-block', 'm-0');
    btn.style.width = '90%';
    btn.textContent = 'Desbloquear';
    btn.onclick = function() {
        UnlockUser(user.ID_usuario);
    };

    td3.appendChild(btn);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    contenedor.appendChild(tr);

    });
}

function changeOrderBy(order) {
    fetch('/blockedUsers', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ orderBy: order })
    })
    .then(response => response.json())
    .then(data => {
        const btn = document.getElementById('btnOrderBy');
        if (order == 'nombre') {
            btn.textContent = "Nombre";
        } else if (order == 'fecha') {
            btn.textContent = 'Último inicio de sesión';
        }
        usuariosBloqueados = data;
        fillContainer(data);

    })
    .catch(error => console.error('Error:', error));
}


function UnlockUser(ID){
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
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/unlockUser';

            const idInput = document.createElement('input');
            idInput.type = 'hidden';
            idInput.name = 'id';
            idInput.value = ID;

            form.appendChild(idInput);
            document.body.appendChild(form);

            form.submit();
        } else if (result.isDenied) {
        Swal.fire({
            color: '#ccc',
            background: '#2D2D2D',
            icon: "error",
            text: "El usuario no fue desbloqueado",
            showConfirmButton: false,
            timer: 1500
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
changeOrderBy('nombre');
});