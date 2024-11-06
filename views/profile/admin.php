<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<script src="cards.js" defer></script>
    
    <body class="container-fluid background-grape" style="display: flex; flex-direction: column; min-height: 100vh;">
        
<div class="row background-gradient mt-5 pl-5 pt-5 pb-5 pb-4" style="height: 12rem;">
    <div class="col-4 flex-column justify-content-end align-items-center">
        <div class="card flex-column d-flex justify-content-center" style="position: absolute; ; top: -2rem; left: 2rem;  width: 20rem; padding: 2rem;">
            <div class="d-flex flex-column justify-content-end align-items-center">
                <span class="signin-image" style="margin: 0rem; width: 10rem; height: 10rem;">
                    <?php if (isset($_SESSION['user']['foto'])): ?>
                        <img src="data:image/png;base64,<?= base64_encode($_SESSION['user']['foto']) ?>" alt="pfp">
                    <?php else: ?>
                        <img src="images/tomilloprofile.png" alt="pfp">
                    <?php endif; ?>
                </span>
            </div>
            <div class="text-center mt-3">
                <h1 style="font-size: 1.5rem;">
                <?=$usuario['nombres'] . " " . $usuario['apellido_paterno'] . " " . $usuario['apellido_materno'] ?>
                </h1>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-2">
                <img width="20" src="images/categorizacion.png" alt="books">
                <p style="margin: 0.3rem;">Admin</p>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-2">
                <div class="white-line"></div>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div class="skills-container d-flex justify-content-center align-items-center mt-0">
                    <img width="20" src="images/diploma.png" alt="books">
                    <p style="margin: 0.3rem;">0 categoría</p>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-4">
                <button class="btn main-btn btn-block" onclick="changePassword()" style="margin: 0rem; width: 70%;">Cambiar contraseña</button>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <button class="btn sub-btn btn-block" onclick="logout()" style="margin: 0rem; width: 70%; margin-bottom: 0.5rem;">Cerrar sesión</button>
            </div>
        </div>
    </div>
</div>
<div class="row flex-row-reverse">
    <div class="col-9" style="padding-left: 5.7rem;">
        <ul class="nav nav-tabs tab-menu" id="myTab" role="tablist" style="width: 92%;">
            <li class="nav-item" role="presentation" style="width: 33%;">
                <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Usuarios</a>
            </li>
            <li class="nav-item" style="width: 33%;">
                <a class="nav-link" id="reports-tab" data-toggle="tab" href="#reports" role="tab" aria-controls="reports" aria-selected="false">Reportes</a>
            </li>
            <li class="nav-item" style="width: 33%;">
                <a class="nav-link" id="categories-tab" data-toggle="tab" href="#categories" role="tab" aria-controls="categories" aria-selected="false">Categorías</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users">
                <div class="d-flex flex-column justify-content-center" style="width: 92%; text-align: center; padding: 1rem;">
                    <div class="col d-flex justify-content-center">
                        <div class="input-group mb-3" style="width: fit-content;">
                            <form action="" class="dark">
                                <div class="input-group">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                        </svg>
                                    </button>
                                    <input type="text" class="form-control" style="height: 2.4rem; width: 31rem;" placeholder="Buscar clases, categorías..." >
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="filter row w-100 d-flex align-items-center">
                        <div class="col d-flex align-items-center">
                            <small-darkgreen-text class="pl-2 col-3">Ordenar por</small-darkgreen-text>
                            <div class="dropdown d-flex justify-content-start">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Nombre</a>
                                <div class="dropdown-menu" style="background-color: rgb(29, 19, 47);">
                                    <a class="dropdown-item" href="#">Nombre</a>
                                    <a class="dropdown-item" href="#">Último inicio de sesión</a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center">
                            <small-darkgreen-text class="pl-2 col-2">mostrar</small-darkgreen-text>
                            <div class="dropdown d-flex justify-content-start">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Todos</a>
                                <div class="dropdown-menu" style="background-color: rgb(29, 19, 47);">
                                    <a class="dropdown-item" href="#">Todos</a>
                                    <a class="dropdown-item" href="#">Bloqueados</a>
                                    <a class="dropdown-item" href="#">Activos</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="levels-container filter d-flex flex-column">
                        <div class="header d-flex flex-wrap justify-content-between">
                            <p>Listado de usuarios</p>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Último inicio de sesión</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Heber Abiel Perez Jimenez</td>
                                    <td>24/12/2023</td>
                                    <td>Bloqueado</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="UnlockUser()">Desbloquear</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Marla Judith Estrada Valdez</td>
                                    <td>24/12/2023</td>
                                    <td>Activo</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="LockUser()">Bloquear</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Carlos Daniel Pinkus Martinez</td>
                                    <td>24/12/2023</td>
                                    <td>Activo</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="LockUser()">Bloquear</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ximena Guadalupe Rosales</td>
                                    <td>24/12/2023</td>
                                    <td>Bloqueado</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="UnlockUser()">Desbloquear</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>María Mercedes Thomas Rivadulla</td>
                                    <td>24/12/2023</td>
                                    <td>Activo</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="LockUser()">Bloquear</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Barak Obama</td>
                                    <td>24/12/2023</td>
                                    <td>Activo</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="LockUser()">Bloquear</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Heber Abiel Perez Jimenez</td>
                                    <td>24/12/2023</td>
                                    <td>Bloqueado</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="UnlockUser()">Desbloquear</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Marla Judith Estrada Valdez</td>
                                    <td>24/12/2023</td>
                                    <td>Activo</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="LockUser()">Bloquear</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Carlos Daniel Pinkus Martinez</td>
                                    <td>24/12/2023</td>
                                    <td>Activo</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="LockUser()">Bloquear</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ximena Guadalupe Rosales</td>
                                    <td>24/12/2023</td>
                                    <td>Bloqueado</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="UnlockUser()">Desbloquear</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>María Mercedes Thomas Rivadulla</td>
                                    <td>24/12/2023</td>
                                    <td>Activo</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="LockUser()">Bloquear</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Barak Obama</td>
                                    <td>24/12/2023</td>
                                    <td>Activo</td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="LockUser()">Bloquear</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <nav aria-label="Page navigation example d-flex justify-content-center">
                        <ul class="pagination d-flex justify-content-center align-items-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true" class="span">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item">de</li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true" class="span">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    
                </div>
            </div>
            <div class="tab-pane fade" id="reports" role="tabpanel" aria-labelledby="reports">
                <div>
                    <ul class="nav p-3 nav-pills tab-sub-menu d-flex justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item p-2 d-flex justify-content-end">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Estudiantes</a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Docentes</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="levels-container filter d-flex flex-column">
                            <div class="header d-flex flex-wrap justify-content-between">
                                <p>Listado de estudiantes</p>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha de ingreso</th>
                                    <th scope="col">Cursos comenzados</th>
                                    <th scope="col">Cursos completados</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Heber Abiel Perez Jimenez</td>
                                        <td>24/12/2023</td>
                                        <td>75 cursos</td>
                                        <td>50 cursos</td>
                                    </tr>
                                    <tr>
                                        <td>Marla Judith Estrada Valdez</td>
                                        <td>24/12/2023</td>
                                        <td>1,000 cursos</td>
                                        <td>700 cursos</td>
                                    </tr>
                                    <tr>
                                        <td>Carlos Daniel Pinkus Martinez</td>
                                        <td>24/12/2023</td>
                                        <td>2 cursos</td>
                                        <td>1 cursos</td>
                                    </tr>
                                    <tr>
                                        <td>Ximena Guadalupe Rosales</td>
                                        <td>24/12/2023</td>
                                        <td>4 cursos</td>
                                        <td>3 cursos</td>
                                    </tr>
                                    <tr>
                                        <td>Heber Abiel Perez Jimenez</td>
                                        <td>24/12/2023</td>
                                        <td>75 cursos</td>
                                        <td>50 cursos</td>
                                    </tr>
                                    <tr>
                                        <td>Marla Judith Estrada Valdez</td>
                                        <td>24/12/2023</td>
                                        <td>1,000 cursos</td>
                                        <td>700 cursos</td>
                                    </tr>
                                    <tr>
                                        <td>Carlos Daniel Pinkus Martinez</td>
                                        <td>24/12/2023</td>
                                        <td>2 cursos</td>
                                        <td>1 cursos</td>
                                    </tr>
                                    <tr>
                                        <td>Ximena Guadalupe Rosales</td>
                                        <td>24/12/2023</td>
                                        <td>4 cursos</td>
                                        <td>3 cursos</td>
                                    </tr>
                                    <tr>
                                        <td>Heber Abiel Perez Jimenez</td>
                                        <td>24/12/2023</td>
                                        <td>75 cursos</td>
                                        <td>50 cursos</td>
                                    </tr>
                                    <tr>
                                        <td>Marla Judith Estrada Valdez</td>
                                        <td>24/12/2023</td>
                                        <td>1,000 cursos</td>
                                        <td>700 cursos</td>
                                    </tr>
                                    <tr>
                                        <td>Carlos Daniel Pinkus Martinez</td>
                                        <td>24/12/2023</td>
                                        <td>2 cursos</td>
                                        <td>1 cursos</td>
                                    </tr>
                                    <tr>
                                        <td>Ximena Guadalupe Rosales</td>
                                        <td>24/12/2023</td>
                                        <td>4 cursos</td>
                                        <td>3 cursos</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example d-flex justify-content-center">
                            <ul class="pagination d-flex justify-content-center align-items-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true" class="span">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item">de</li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true" class="span">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="levels-container filter d-flex flex-column">
                            <div class="header d-flex flex-wrap justify-content-between">
                                <p>Listado de estudiantes</p>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha de ingreso</th>
                                    <th scope="col">Cursos ofrecidos</th>
                                    <th scope="col">Total de ganancias</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Heber Abiel Perez Jimenez</td>
                                        <td>24/12/2023</td>
                                        <td>75 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Marla Judith Estrada Valdez</td>
                                        <td>24/12/2023</td>
                                        <td>1,000 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Carlos Daniel Pinkus Martinez</td>
                                        <td>24/12/2023</td>
                                        <td>2 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Ximena Guadalupe Rosales</td>
                                        <td>24/12/2023</td>
                                        <td>4 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Heber Abiel Perez Jimenez</td>
                                        <td>24/12/2023</td>
                                        <td>75 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Marla Judith Estrada Valdez</td>
                                        <td>24/12/2023</td>
                                        <td>1,000 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Carlos Daniel Pinkus Martinez</td>
                                        <td>24/12/2023</td>
                                        <td>2 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Ximena Guadalupe Rosales</td>
                                        <td>24/12/2023</td>
                                        <td>4 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Heber Abiel Perez Jimenez</td>
                                        <td>24/12/2023</td>
                                        <td>75 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Marla Judith Estrada Valdez</td>
                                        <td>24/12/2023</td>
                                        <td>1,000 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Carlos Daniel Pinkus Martinez</td>
                                        <td>24/12/2023</td>
                                        <td>2 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                    <tr>
                                        <td>Ximena Guadalupe Rosales</td>
                                        <td>24/12/2023</td>
                                        <td>4 cursos</td>
                                        <td>$40,000.00 MXN</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example d-flex justify-content-center">
                            <ul class="pagination d-flex justify-content-center align-items-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true" class="span">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item">de</li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true" class="span">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                
            </div>
            <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories">
                <div class="levels-container filter d-flex flex-column">
                    <div class="header d-flex flex-wrap justify-content-between">
                        <p><?=$usuario['nombres'] . " " . $usuario['apellido_paterno'] . " " . $usuario['apellido_materno'] ?></p>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha y hora de creación</th>
                            <th scope="col">Descripción</th>
                            <th scope="col" colspan="2">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Diseño
                                    <input type="text" value="Diseño" id="category1" name="category1" hidden>
                                </td>
                                <td>24/12/2023 12:00 hrs</td>
                                <td>
                                    <a onclick="readDescription()" class="text p-0 ml-0 bd-highlight"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                        Ver descripción
                                    </a>
                                    <textarea type="text" id="description1" name="description1" hidden>Descripción blah blah blah</textarea>
                                </td>
                                <td>
                                    <button class="btn sub-btn btn-block m-0" style="width: 100%;" onclick="EditCategory()">
                                        Editar
                                    </button>
                                </td>
                                <td>
                                    <button class="btn sub-btn btn-block m-0" style="width: 100%;" onclick="DeleteCategory()">Eliminar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Marketing
                                    <input type="text" value="Diseño" id="category2" name="category1" hidden>
                                </td>
                                <td>24/12/2023 12:00 hrs</td>
                                <td>
                                    <a onclick="readDescription()" class="text p-0 ml-0 bd-highlight"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                        Ver descripción
                                    </a>
                                    <textarea type="text" id="description2" name="description1" hidden>Descripción blah blah blah</textarea>
                                </td>
                                <td>
                                    <button class="btn sub-btn btn-block m-0" style="width: 100%;" onclick="EditCategory()">
                                        Editar
                                    </button>
                                </td>
                                <td>
                                    <button class="btn sub-btn btn-block m-0" style="width: 100%;" onclick="DeleteCategory()">Eliminar</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example d-flex justify-content-center">
                    <ul class="pagination d-flex justify-content-center align-items-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true" class="span">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item">de</li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true" class="span">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="d-flex justify-content-end p-3">
                    <button class="btn main-btn btn-block ml-2 mb-3" onclick="nuevaCategoria()" style="width: 30%; margin:0rem"> Nueva categoría</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require base_path('views/partials/footer.php'); ?>