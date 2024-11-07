<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

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
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <small-darkgreen-text class="pl-2 col-2">Ordenar por</small-darkgreen-text>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" id="categoryDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Categoría</a>
                                                <div class="dropdown-menu" style="background-color: rgb(29, 19, 47);">
                                                <?php foreach($categorias as $categoria): ?>
                                                    <a class="dropdown-item" onclick="selectCategory('<?=$categoria['nombre']?>', 'categoryDropdown')"><?=$categoria['nombre']?></a>
                                                <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex justify-content-end align-items-center">
                                            <small-darkgreen-text class="pt-2">Desde</small-darkgreen-text>
                                            <input type="date" class="date-range ml-2 mr-4">
                                            <small-darkgreen-text class="pt-2 pl-2">Hasta</small-darkgreen-text>
                                            <input type="date" class="date-range ml-2 mr-4">
                                        </div>
                                        <div class="row w-100 filter">
                                            <div class="col-12">
                                                <div class="levels-container d-flex flex-column">
                                                    <div class="header d-flex flex-wrap justify-content-between align-items-center" style="width: 100.25%;">
                                                        <p>8 cursos publicados</p>
                                                        <a href="/nuevo_curso" class="p-0 d-flex align-items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle mr-2" viewBox="0 0 16 16">
                                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                                            </svg>
                                                            Crear nuevo curso
                                                        </a>
                                                    </div>
                                                    <div class="row ml-0 mr-0" style="background-color: #130924;">
                                                        <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
                                                            <label class="d-flex bulgy-checkboxes justify-content-start align-items-center p-2 bd-highlight" style="padding: 0rem; width: 2.21rem;">
                                                                <input type="checkbox" name="options"/>
                                                                <span class="checkbox" style="margin: 0rem;"></span>
                                                            </label>
                                                            <button type="button" class="btn level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson1">
                                                                <p class="flex-grow-1 pl-4">Aprende a crear tu web desde cero con HTML y CSS</p>
                                                            </button>
                                                            <div class="profile-course d-flex justify-content-end ml-auto bd-highlight">
                                                                <a href="/editar_curso" class="categoria p-0" style="height: 50%;">Editar</a>
                                                            </div>
                                                            <div class="profile-course d-flex align-items-center ml-auto bd-highlight">
                                                                <a onclick="borrarCurso()" class="mx-2 pl-5" style="height: 1.5rem;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                            
                                                    <div id="lesson1" class="collapse">
                                                        <div class="row d-flex bd-highlight">
                                                            <p class="text p-0 ml-3 bd-highlight">Categoría: </p>
                                                            <p class="data p-0 ml-2 bd-highlight">Web</p>
                                                        </div>
                                                        <div class="row d-flex bd-highlight">
                                                            <p class="text p-0 ml-3 bd-highlight">Alumnos inscritos: </p>
                                                            <p class="data p-0 ml-2 bd-highlight">75</p>
                                                        </div>
                                                        <div class="row d-flex bd-highlight">
                                                            <p class="text p-0 ml-3 bd-highlight">Promedio que ha cursado cada alumno:</p>
                                                            <p class="data p-0 ml-2 bd-highlight">60</p>
                                                        </div>
                                                        <div class="row d-flex bd-highlight">
                                                            <p class="text p-0 ml-3 bd-highlight">Ingresos generados:</p>
                                                            <p class="data p-0 ml-2 bd-highlight">$20,000.00 MXN</p>
                                                        </div>
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
                                                                <p> $20,000.00 MXN</p>
                                                            </div>
                                                        </div>
                                                        <form class="col container dark d-flex justify-content-center p-4">
                                                            <select class="col-auto select-profile" style="width: 90%;">
                                                                <option selected>Seleccione forma de pago</option>
                                                                <option value="1">Efectivo</option>
                                                                <option value="2">Tarjeta (débito o crédito)</option>
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
                                        </div>
                                        <div class="col d-flex align-items-center">
                                            <small-darkgreen-text class="pl-2 col-2">Ordenar por</small-darkgreen-text>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" id="categoryDropdown2" role="button" data-toggle="dropdown" aria-expanded="false">Categoría</a>
                                                <div class="dropdown-menu" style="background-color: rgb(29, 19, 47);">
                                                <?php foreach($categorias as $categoria): ?>
                                                    <a class="dropdown-item" onclick="selectCategory('<?=$categoria['nombre']?>', 'categoryDropdown2')"><?=$categoria['nombre']?></a>
                                                <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex justify-content-end align-items-center">
                                            <small-darkgreen-text class="pt-2">Desde</small-darkgreen-text>
                                            <input type="date" class="date-range ml-2 mr-4">
                                            <small-darkgreen-text class="pt-2 pl-2">Hasta</small-darkgreen-text>
                                            <input type="date" class="date-range ml-2 mr-4">
                                        </div>
                                    </div>
                                    <div class="row w-100 filter">
                                        <div class="col-12">
                                            <div class="levels-container d-flex flex-column">
                                                <div class="header d-flex flex-wrap justify-content-between" style="width: 100.25%;">
                                                    <p>8 cursos publicados</p>
                                                    <a href="/nuevo_curso" class="p-0 d-flex align-items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle mr-2" viewBox="0 0 16 16">
                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                                        </svg>
                                                        Crear nuevo curso
                                                    </a>
                                                </div>
                                                <div class="row ml-0 mr-0" style="background-color: #130924;">
                                                    <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
                                                        <label class="d-flex bulgy-checkboxes justify-content-start align-items-center p-2 bd-highlight" style="padding: 0rem; width: 2.21rem;">
                                                            <input type="checkbox" name="options"/>
                                                            <span class="checkbox" style="margin: 0rem;"></span>
                                                        </label>
                                                        <button type="button" class="btn level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson10">
                                                            <p class="flex-grow-1 pl-4">Aprende a crear tu web desde cero con HTML y CSS</p>
                                                        </button>
                                                        <div class="profile-course d-flex justify-content-end ml-auto bd-highlight">
                                                            <a href="" class="categoria p-0" style="height: 50%;">Editar</a>
                                                        </div>
                                                        <div class="profile-course d-flex align-items-center ml-auto bd-highlight">
                                                            <a href="" class="mx-2 pl-5" style="height: 1.5rem;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                        
                                                <div id="lesson10" class="collapse pl-2">

                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                            <th scope="col">Alumno</th>
                                                            <th scope="col">Inscripción</th>
                                                            <th scope="col">Nivel de avance</th>
                                                            <th scope="col">Pago</th>
                                                            <th scope="col">Forma de pago</th>
                                                            <th scope="col">Generar diploma</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                            <td>Heber Abiel Perez Jimenez</td>
                                                            <td>24/12/2023</td>
                                                            <td class="d-flex bd-highlight justify-content-center">
                                                                <div class="progress mr-2" style="width: 80%;">
                                                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                75%
                                                            </td>
                                                            <td>$500.00 MXN</td>
                                                            <td>Efectivo</td>
                                                            <td>
                                                                <button class="btn sub-btn btn-block m-0" style="width: 90%;" disabled>Generar diploma</button>
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                            <td>Marla Judith Estrada Valdez</td>
                                                            <td>24/12/2023</td>
                                                            <td class="d-flex bd-highlight justify-content-center">
                                                                <div class="progress mr-2" style="width: 80%;">
                                                                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                100%
                                                            </td>
                                                            <td>$500.00 MXN</td>
                                                            <td>Efectivo</td>
                                                            <td>
                                                                <button class="btn sub-btn btn-block m-0" style="width: 90%;" onclick="createDegree()">Generar diploma</button>
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                            <td>Carlos Daniel Pinkus Martinez</td>
                                                            <td>24/12/2023</td>
                                                            <td class="d-flex bd-highlight justify-content-center">
                                                                <div class="progress mr-2" style="width: 80%;">
                                                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                75%
                                                            </td>
                                                            <td>$500.00 MXN</td>
                                                            <td>Efectivo</td>
                                                            <td>
                                                                <button class="btn sub-btn btn-block m-0" style="width: 90%;" disabled>Generar diploma</button>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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
                                                            <p> $20,000.00 MXN</p>
                                                        </div>
                                                    </div>
                                                    <form class="col container dark d-flex justify-content-center p-4">
                                                        <select class="col-auto select-profile" style="width: 90%;">
                                                            <option selected>Seleccione forma de pago</option>
                                                            <option value="1">Efectivo</option>
                                                            <option value="2">Tarjeta (débito o crédito)</option>
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