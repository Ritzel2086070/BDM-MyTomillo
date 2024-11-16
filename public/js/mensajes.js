let dmArray = [];
document.addEventListener('DOMContentLoaded', () => {
    getDMs();
});

function filterUsers() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const filteredUsers = dmArray.filter(user => {
        return user.name.toLowerCase().includes(searchTerm); // Convert both to lowercase
    });
    fillContainer(filteredUsers);
}


function fillContainer(users){
    const dmsList = document.getElementById('dmsList');
    dmsList.innerHTML = '';

    users.forEach(dm => {
        const div = document.createElement('div');
        div.className = 'row align-items-center';
        div.innerHTML = `
            <div class="col-auto p-0">
                <img 
                    class="profile" 
                    src="/usuarioFoto?id=${dm.ID_usuario}" 
                    alt="Logo" 
                    onerror="this.onerror=null; this.src='/images/tomilloprofile.png';"
                >
            </div>
            <div class="col">
                <h5 class="p-0 pt-2 m-0">${dm.name}</h5>
                <p class="p-0 m-0">${dm.lastMessage? dm.lastMessage: "" }</p>
            </div>
        `;

        const div2 = document.createElement('div');
        div2.className = 'row my-3';
        div2.innerHTML = `
            <div class="green-line"></div>
        `;
        dmsList.appendChild(div);
        dmsList.appendChild(div2);

        div.addEventListener('click', () => {
            console.log('Selected DM ID:', dm.ID_chat);
            document.getElementById('destinatarioID').value = dm.ID_usuario;
            document.getElementById('destinatarioName').textContent = dm.name;
            document.getElementById('chatID').value = dm.ID_chat;
            document.getElementById('destinatarioFoto').src = `/usuarioFoto?id=${dm.ID_usuario}`;

            getChat();
        });
    });
}

function BuscarDestinatario(){
    let users;
    fetch('/allusers')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();  // Parse JSON data
        })
        .then(data => {
            users = data.map(user => ({
                id: user.ID_usuario,
                name: user.nombres + ' ' + user.apellido_paterno + ' ' + user.apellido_materno
            }));
        })
        .catch(error => {
            console.error('Error fetching users:', error);
        });

    Swal.fire({
        title: 'Buscar destinatario',
        color: '#86bd7b',
        background: '#2D2D2D',
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
        html: `
            <ul id="userList" style="list-style-type: none; padding: 0; margin-top: 10px;"></ul>
        `,
        didOpen: () => {
            const userList = document.getElementById('userList');
            const input = Swal.getInput();
    
            input.addEventListener('input', () => {
                userList.innerHTML = '';
    
                const searchTerm = input.value.toLowerCase();
                const filteredUsers = users.filter(user => user.name.toLowerCase().includes(searchTerm));
    
                filteredUsers.forEach(user => {
                    const listItem = document.createElement('li');
                    listItem.textContent = user.name;
                    listItem.setAttribute('data-id', user.id);
                    listItem.style.cursor = 'pointer';
                    listItem.style.color = '#86bd7b';
                    listItem.style.padding = '5px 0';
    
                    userList.appendChild(listItem);
    
                    listItem.addEventListener('click', () => {
                        Swal.close();
                        console.log('Selected user ID:', user.id);
    
                        fetch('/newchat', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify({
                                ID_usuario: user.id
                            }),
                        })
                        .then(response => response.json())
                        .then(result => {
                            getDMs();
                        })
                        .catch(error => console.error('Error:', error));
                    });
                });
            });
        }
    });
        
}

function getDMs(){
    fetch('/getdms')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();  // Parse JSON data
        })
        .then(data => {
            dmArray = data;
            fillContainer(data);
        })
        .catch(error => {
            console.error('Error fetching DMs:', error);
        });
}

function getChat(){
    const ID_chat = document.getElementById('chatID').value;
    fetch('/getchat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            ID_chat: ID_chat
        }),
    })
    .then(response => response.json())
    .then(result => {
        console.log('Chat:', result);

        const chatMessages = document.getElementById('chatMessages');
        chatMessages.innerHTML = '';

        const ID_destinoUsuario = document.getElementById('destinatarioID').value;

        result.forEach(message => {
            if(message.ID_usuario == ID_destinoUsuario){
                const div = document.createElement('div');
                div.className = 'row pb-3 justify-content-start';
                div.innerHTML = `
                    <div class="col-auto p-0">
                        <img 
                            class="profile" 
                            src="/usuarioFoto?id=${message.ID_usuario}" 
                            alt="Logo" 
                            onerror="this.onerror=null; this.src='/images/tomilloprofile.png';"
                        >
                    </div>
                    <div class="col message-box pt-3 pl-3 pr-3 mx-2">
                        <h4>${message.nombres + " " + message.apellido_paterno + " " + message.apellido_materno}</h4>
                        <h4>${message.f_envio}</h4>
                        <p>${message.mensaje}</p>
                    </div>
                `;
                chatMessages.appendChild(div);
            } else {
                const div = document.createElement('div');
                div.className = 'row pb-3 justify-content-end';
                div.innerHTML = `
                    <div class="col message-box-inverse pt-3 pl-3 pr-3 mx-2">
                        <h4>${message.nombres + " " + message.apellido_paterno + " " + message.apellido_materno}</h4>
                        <h4>${message.f_envio}</h4>
                        <p>${message.mensaje}</p>
                    </div>
                    <div class="col-auto p-0">
                        <img 
                            class="profile" 
                            src="/usuarioFoto?id=${message.ID_usuario}" 
                            alt="Logo" 
                            onerror="this.onerror=null; this.src='/images/tomilloprofile.png';"
                        >
                    </div>
                `;
                chatMessages.appendChild(div);
            }
        });
    })
    .catch(error => console.error('Error:', error));
}


function sendMessage(){
    //validacion mensaje id=textareaMensaje
    let mensaje = document.getElementById('textareaMensaje').value;
    let chatID = document.getElementById('chatID').value;

    // Validate the message
    if (mensaje.trim() === '') {
        alertCustom("El mensaje no puede estar vacío");
        return false;
    }

    if (mensaje.length > 500) {
        alertCustom("El mensaje no puede tener más de 500 caracteres");
        return false;
    }

    if (chatID === '') {
        alertCustom("No se ha seleccionado un destinatario");
        return false;
    }

    fetch('/sendmessage', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            mensaje: mensaje,
            ID_chat: chatID
        }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error sending message. Please try again.');
        }
        return response.json();
    })
    .then(result => {
        document.getElementById('textareaMensaje').value = ''; // Clear the input field
        getChat(); // Refresh chat to show the new message
    })
    .catch(error => {
        console.error('Error:', error);
        alertCustom('Hubo un error al enviar el mensaje. Inténtalo nuevamente.');
    });
}

//relooad for mensajes every 5 seconds
setInterval(function(){
    getDMs();
}, 5000);

//reload for mensajes every 1 second
setInterval(function(){
    getChat();
}, 1000);