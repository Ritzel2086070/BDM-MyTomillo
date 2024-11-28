<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<script src="cards.js" defer></script>
<script src="js/admin.js"></script>
    
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
                                    <input type="text" class="form-control" style="height: 2.4rem; width: 31rem;" id="searchInput" placeholder="Buscar nombre de usuario..." oninput="filterUsers()">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="filter row w-100 d-flex align-items-center">
                        <div class="col d-flex align-items-center">
                            <small-darkgreen-text class="pl-2 col-3">Ordenar por</small-darkgreen-text>
                            <div class="dropdown d-flex justify-content-start">
                                <a class="dropdown-toggle" role="button" data-toggle="dropdown" id="btnOrderBy" aria-expanded="false">Nombre</a>
                                <div class="dropdown-menu" style="background-color: rgb(29, 19, 47);">
                                    <a class="dropdown-item" onclick="changeOrderBy('nombre')" >Nombre</a>
                                    <a class="dropdown-item" onclick="changeOrderBy('fecha')" >Último inicio de sesión</a>
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
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="contenedorUsuariosBloqueados">
                            </tbody>
                        </table>
                    </div>

                    <!-- TO DO -->
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
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
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
                                    <?php foreach($estudiantes as $estudiante): ?>
                                        <tr>
                                            <td><?=$estudiante['nombres'] . " " . $estudiante['apellido_paterno'] . " " . $estudiante['apellido_materno']?></td>
                                            <td><?=date('d/M/Y', strtotime($estudiante['f_registro']))?></td>
                                            <td><?=$estudiante['n_cursos']?> cursos</td>
                                            <td><?=$estudiante['n_cursos_terminados']?> cursos</td>
                                        </tr>
                                    <?php endforeach; ?>
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
                                <p>Listado de docentes</p>
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
                                    <?php foreach($profesores as $profesor): ?>
                                        <tr>
                                            <td><?=$profesor['nombres'] . " " . $profesor['apellido_paterno'] . " " . $profesor['apellido_materno']?></td>
                                            <td><?=date('d/M/Y', strtotime($profesor['f_registro']))?></td>
                                            <td><?=$profesor['n_cursos']?> cursos</td>
                                            <td>$<?=$profesor['ingresos']?> MXN</td>
                                        </tr>
                                    <?php endforeach; ?>
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
                        <p>Categorías creadas por <?=$usuario['nombres'] . " " . $usuario['apellido_paterno'] . " " . $usuario['apellido_materno'] ?></p>
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
                            <?php foreach($categorias as $categoria): ?>
                                <tr>
                                    <td>
                                        <?=$categoria['nombre']?>
                                    </td>
                                    <td><?=date('d/M/Y H:i', strtotime($categoria['f_registro']))?></td> 
                                    <td>
                                        <a onclick="readDescription('<?=$categoria['descripcion']?>')" class="text p-0 ml-0 bd-highlight"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                            </svg>
                                            Ver descripción
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 100%;" onclick="EditCategory('<?=$categoria['ID_categoria']?>','<?=$categoria['nombre']?>','<?=$categoria['descripcion']?>')">
                                            Editar
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn sub-btn btn-block m-0" style="width: 100%;" onclick="DeleteCategory('<?=$categoria['ID_categoria']?>','<?=$categoria['nombre']?>')">Eliminar</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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