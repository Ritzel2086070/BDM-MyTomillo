<header>
        <nav class="row navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="/dashboard">
                    <img class="logo" src="images/LogoBDM.png" alt="Logo">
                </a>
                <form class="col container">
                    <select class="col-auto form-select">
                        <option selected>Cursos</option>
                        <option value="1">Instructores</option>
                        <option value="2">Categorias</option>
                    </select>
                    <div class="col input-group">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </button>
                        <input type="text" class="form-control" placeholder="Buscar clases, categorías..." >
                    </div>
                </form>
                <a href="/carrito" class="mx-2">
                    <img class="icon" src="images/carro-de-la-compra.png" alt="Logo">
                </a>
                <a href="/mensajes" class="mx-2">
                    <img class="icon" src="images/conversacion.png" alt="Logo">
                </a>
                <button onclick="toProfile()" type="button" class="profile mx-2 d-flex justify-content-center align-items-center">
                    <img src="images/tomilloprofile.png" alt="Logo">
                </button>
            </div>
        </nav>
    </header>