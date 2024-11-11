<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<script src="js/teacher.js"></script>
<script src="cards.js" defer></script>
    
    <body class="container-fluid background-grape" style="display: flex; flex-direction: column; min-height: 100vh;">
       
<div class="row background-gradient mt-5 pl-5 pt-5 pb-5 pb-4" style="height: 12rem;">
        </div>
        
<div class="row flex-row-reverse">
    <div class="col-12" style="padding-left: 5.7rem;">
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="col-9">
                <ul class="nav nav-tabs tab-menu" id="myTab" role="tablist" style="width: 92%;">
                    <li class="nav-item" role="presentation" style="width: 33%;">
                        <a class="nav-link active" id="profile-data-tab" data-toggle="tab" href="#profile-data" role="tab" aria-controls="profile-data" aria-selected="false">Perfil</a>
                    </li>
                    <li class="nav-item" style="width: 33%;">
                        <a class="nav-link" id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="true">Tus cursos</a>
                    </li>
                    <li class="nav-item" style="width: 33%;">
                        <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Métodos de pago</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile-data" role="tabpanel" aria-labelledby="profile-data">
                <div class="col-4 flex-column justify-content-end align-items-center">
                    <div class="card flex-column d-flex justify-content-center" style="position: absolute; top: -13rem; left: -1rem;  width: 22rem; padding: 2rem;">
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
                            <img width="20" src="images/teacher.png" alt="books">
                            <p style="margin: 0.3rem;">Maestro</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-2">
                            <div class="white-line"></div>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <div class="skills-container d-flex justify-content-center align-items-center mt-3">
                                <img width="20" src="images/cursos.png" alt="books">
                                <p style="margin: 0.3rem;">0 cursos</p>
                            </div>
                            <div class="skills-container d-flex justify-content-center align-items-center mt-0">  
                                <img width="20" src="images/conversacion.png" alt="books">
                                <p style="margin: 0.3rem;">0 conversaciones</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <button class="btn main-btn btn-block" onclick="enableDisableProfile()" id="btnEnableDisable" style="margin: 0rem; width: 70%;">Editar perfil</button>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <button class="btn main-btn btn-block" onclick="changePassword()" style="margin: 0rem; width: 70%;">Cambiar contraseña</button>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <button class="btn sub-btn btn-block" onclick="logout()" style="margin: 0rem; width: 70%; margin-bottom: 0.5rem;">Cerrar sesión</button>
                        </div>
                    </div>
                </div>
                <div class="row d-flex flex-row-reverse">
                    <div class="col-10 d-flex flex-column justify-content-center pr-5 pl-5" style="width: 92%; text-align: center; padding: 1rem;">
                        <h3>Información básica</h3>
                        <form action="/editProfile" method="POST" id="editForm" onsubmit="return edit()" enctype="multipart/form-data" class="dark pr-5 pl-5">
                            <?php require 'form.php'?>
                        </form>                   
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="kardex">
                <div class="col-4 flex-column justify-content-end align-items-center">
                    <div class="card flex-column d-flex justify-content-center" style="position: absolute; top: -13rem; left: -2.4rem;  width: 23rem; padding: 1rem;">
                        <div class="d-flex flex-column justify-content-end align-items-center">
                            <div class="text-center mt-3">
                                <h1 style="font-size: 1.5rem;"><?=$usuario['nombres'] . " " . $usuario['apellido_paterno'] . " " . $usuario['apellido_materno'] ?></h1>
                                <p class="mt-2">¡Aquí puedes ver las estadísticas de tus cursos!</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row w-100">
                    <div class="row p-2 w-100">
                        <div class="col-12">
                            <ul class="nav p-3 nav-pills tab-sub-menu d-flex justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item p-2 d-flex justify-content-end">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Información General</a>
                                </li>
                                <li class="nav-item p-2">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Total de alumnos</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                    <div class="row w-100 filter">
                                        <div class="row w-100">
                                            <div class="col d-flex align-items-center justify-content-center">
                                                <div class="input-group mb-3" style="width: fit-content;">
                                                    <form action="" class="dark">
                                                        <div class="col-12 input-group">
                                                            <input type="text" class="form-control" id="searchInput" oninput="filterCursos()" style="height: 2.4rem; width: 31rem;" placeholder="Buscar nombre del curso..." >
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <small-darkgreen-text class="pl-2 col-2">Filtrar por</small-darkgreen-text>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" id="categoryDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Todos los cursos</a>
                                                <div class="dropdown-menu" style="background-color: rgb(29, 19, 47);">
                                                    <a class="dropdown-item" onclick="changeFilterBy('todos');selectCategory('Todos los cursos', 'categoryDropdown', 'inputFiltro', 'todos')">Todos los cursos</a>
                                                <?php foreach($categorias as $categoria): ?>
                                                    <a class="dropdown-item" onclick="changeFilterBy('cat_<?=$categoria['ID_categoria']?>');selectCategory('<?=$categoria['nombre']?>', 'categoryDropdown', 'inputFiltro', 'cat_<?=$categoria['ID_categoria']?>')"><?=$categoria['nombre']?></a>
                                                <?php endforeach; ?>
                                                    <a class="dropdown-item" onclick="changeFilterBy('activos');selectCategory('Cursos activos', 'categoryDropdown', 'inputFiltro', 'activos')">Cursos activos</a>
                                                    <a class="dropdown-item" onclick="changeFilterBy('inactivos');selectCategory('Cursos inactivos', 'categoryDropdown', 'inputFiltro', 'inactivos')">Cursos inactivos</a>
                                                    <input type="hidden" id="inputFiltro" name="inputFiltro">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex justify-content-end align-items-center">
                                            <small-darkgreen-text class="pt-2">Desde</small-darkgreen-text>
                                            <input type="date" id="startDate" class="date-range start ml-2 mr-4">
                                            <small-darkgreen-text class="pt-2 pl-2">Hasta</small-darkgreen-text>
                                            <input type="date" id="endDate" class="date-range end ml-2 mr-4">
                                        </div>
                                        <div class="row w-100 filter">
                                            <div class="col-12">
                                                <div class="levels-container d-flex flex-column">
                                                    <div class="header d-flex flex-wrap justify-content-between align-items-center" style="width: 100.25%;">
                                                        <p><?= $n_cursos ?> cursos publicados</p>
                                                        <a href="/nuevo_curso" class="p-0 d-flex align-items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle mr-2" viewBox="0 0 16 16">
                                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                                            </svg>
                                                            Crear nuevo curso
                                                        </a>
                                                    </div>
                                                    <div id="contenedorCursos">
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center mt-5">
                                                    <div class="white-line" style="height: 0.05rem;"></div>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center mt-4">
                    
                                                    <div class="levels-container d-flex flex-column" style="width: 50%;">
                                                        <div class="header d-flex flex-wrap bd-highlight" style="width: 100.5%;">
                                                            <div class="mr-auto bd-highlight">
                                                                <p>Forma de pago</p>
                                                            </div>
                                                            <div class="bd-highlight">
                                                                <p class="text">Total de ingresos:</p>
                                                            </div>
                                                            <div class="data bd-highlight pl-2">
                                                                <p id="TotalIngresos1"></p>
                                                            </div>
                                                        </div>
                                                        <form class="col container dark d-flex justify-content-center p-4">
                                                            <select class="col-auto select-profile" style="width: 90%;"  onchange="changeTipoPago1(this.value)">
                                                                <option selected disabled value="">Seleccione forma de pago</option>
                                                                <option value="1">Completo</option>
                                                                <option value="0">Por nivel</option>
                                                            </select>
                                                        </form>    
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row w-100 filter">
                                        <div class="row w-100">
                                            <div class="col d-flex align-items-center justify-content-center">
                                                <div class="input-group mb-3" style="width: fit-content;">
                                                    <form action="" class="dark">
                                                        <div class="col-12 input-group">
                                                            <input type="text" class="form-control" id="searchInput2" oninput="filterCursos2()" style="height: 2.4rem; width: 31rem;" placeholder="Buscar nombre del curso..." >
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <small-darkgreen-text class="pl-2 col-2">Filtrar por</small-darkgreen-text>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" id="categoryDropdown2" role="button" data-toggle="dropdown" aria-expanded="false">Todos los cursos</a>
                                                <div class="dropdown-menu" style="background-color: rgb(29, 19, 47);">
                                                    <a class="dropdown-item" onclick="changeFilterBy2('todos');selectCategory('Todos los cursos', 'categoryDropdown2', 'inputFiltro2', 'todos')">Todos los cursos</a>
                                                <?php foreach($categorias as $categoria): ?>
                                                    <a class="dropdown-item" onclick="changeFilterBy2('cat_<?=$categoria['ID_categoria']?>');selectCategory('<?=$categoria['nombre']?>', 'categoryDropdown2', 'inputFiltro2', 'cat_<?=$categoria['ID_categoria']?>')"><?=$categoria['nombre']?></a>
                                                <?php endforeach; ?>
                                                    <a class="dropdown-item" onclick="changeFilterBy2('activos');selectCategory('Cursos activos', 'categoryDropdown2', 'inputFiltro2', 'activos')">Cursos activos</a>
                                                    <a class="dropdown-item" onclick="changeFilterBy2('inactivos');selectCategory('Cursos inactivos', 'categoryDropdown2', 'inputFiltro2', 'inactivos')">Cursos inactivos</a>
                                                    <input type="hidden" id="inputFiltro2" name="inputFiltro2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex justify-content-end align-items-center">
                                            <small-darkgreen-text class="pt-2">Desde</small-darkgreen-text>
                                            <input type="date" id="startDate2" class="date-range start ml-2 mr-4">
                                            <small-darkgreen-text class="pt-2 pl-2">Hasta</small-darkgreen-text>
                                            <input type="date" id="endDate2" class="date-range end ml-2 mr-4">
                                        </div>
                                    </div>
                                    <div class="row w-100 filter">
                                        <div class="col-12">
                                            <div class="levels-container d-flex flex-column">
                                                <div class="header d-flex flex-wrap justify-content-between" style="width: 100.25%;">
                                                <p><?= $n_cursos ?> cursos publicados</p>
                                                    <a href="/nuevo_curso" class="p-0 d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle mr-2" viewBox="0 0 16 16">
                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                                        </svg>
                                                        Crear nuevo curso
                                                    </a>
                                                </div>
                                                <div id="contenedorCursos2">
                                                        
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center mt-5">
                                                <div class="white-line" style="height: 0.05rem;"></div>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center mt-4">
                
                                                <div class="levels-container d-flex flex-column" style="width: 50%;">
                                                    <div class="header d-flex flex-wrap bd-highlight" style="width: 100.5%;">
                                                        <div class="mr-auto bd-highlight">
                                                            <p>Forma de pago</p>
                                                        </div>
                                                        <div class="bd-highlight">
                                                            <p class="text">Total de ingresos:</p>
                                                        </div>
                                                        <div class="data bd-highlight pl-2">
                                                            <p id="TotalIngresos2"></p>
                                                        </div>
                                                    </div>
                                                    <form class="col container dark d-flex justify-content-center p-4">
                                                        <select class="col-auto select-profile" style="width: 90%;" onchange="changeTipoPago2(this.value)">
                                                            <option selected disabled value="">Seleccione forma de pago</option>
                                                            <option value="1">Completo</option>
                                                            <option value="0">Por nivel</option>
                                                        </select>
                                                    </form>    
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>             
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment">
                <div class="col-4 flex-column justify-content-end align-items-center"></div>
                    <div class="card flex-column d-flex justify-content-center" style="position: absolute; top: -9rem; left: 4.3rem;  width: 23rem; padding: 1rem;">
                        <div class="d-flex flex-column justify-content-end align-items-center">
                            <div class="text-center mt-3">
                                <h1 style="font-size: 1.5rem;"><?=$usuario['nombres'] . " " . $usuario['apellido_paterno'] . " " . $usuario['apellido_materno'] ?></h1>
                                <p class="mt-2">¡Tú eliges como cobrar!</p>
                            </div>
                        </div>
                    </div>
                    <?php require 'payment.php'?>
            </div>
        </div>
    </div>
</div>

<?php require base_path('views/partials/footer.php'); ?>