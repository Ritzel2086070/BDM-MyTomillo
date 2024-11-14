<header>
        <nav class="row navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="/dashboard">
                    <img class="logo" src="images/LogoBDM.png" alt="Logo">
                </a>
                <form id="searchForm" class="col container" onsubmit="return busqueda(event);">
                    <select id="searchType" class="col-auto form-select">
                        <option value="cursos" selected>Cursos</option>
                        <option value="instructores">Instructores</option>
                        <option value="categorias">Categorias</option>
                    </select>
                    <div class="col input-group">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </button>
                        <input id="searchQuery" type="text" class="form-control" placeholder="Buscar por título, instructor o categoría...">
                    </div>
                </form>
                <a href="/pay" class="mx-2">
                    <img class="icon" src="images/carro-de-la-compra.png" alt="Logo">
                </a>
                <a href="/mensajes" class="mx-2">
                    <img class="icon" src="images/conversacion.png" alt="Logo">
                </a>
                <button onclick="toProfile()" type="button" class="profile mx-2 d-flex justify-content-center align-items-center">
                    <?php if (isset($_SESSION['user']['foto'])): ?>
                        <img src="data:image/png;base64,<?= base64_encode($_SESSION['user']['foto']) ?>" alt="pfp">
                    <?php else: ?>
                        <img src="images/tomilloprofile.png" alt="pfp">
                    <?php endif; ?>
                </button>
            </div>
        </nav>
    </header>