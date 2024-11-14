<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>

<script src="js/student.js"></script>
<script src="js/cards.js" defer></script>
    
    <body class="container-fluid background-grape" style="display: flex; flex-direction: column; min-height: 100vh;">
      
<div class="row background-gradient mt-5 pl-5 pt-5 pb-5 pb-4" style="height: 12rem;">
    <div class="col-4 flex-column justify-content-end align-items-center">
        <div class="card flex-column d-flex justify-content-center" style="position: absolute; ; top: -2rem; left: 2rem;  width: 22rem; padding: 2rem;">
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
                <img width="20" src="images/estudiante.png" alt="books">
                <p style="margin: 0.3rem;">Estudiante</p>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-2">
                <div class="white-line"></div>
            </div>
            <div class="d-flex flex-column align-items-center">
                <div class="skills-container d-flex justify-content-center align-items-center mt-3">
                    <img width="20" src="images/cursos.png" alt="books">
                    <p style="margin: 0.3rem;"><?=$cursosInscritos?> cursos</p>
                </div>
                <div class="skills-container d-flex justify-content-center align-items-center mt-0">  
                    <img width="20" src="images/conversacion.png" alt="books">
                    <p style="margin: 0.3rem;">0 conversaciones</p>
                </div>
                <div class="skills-container d-flex justify-content-center align-items-center mt-0">
                    <img width="20" src="images/diploma.png" alt="books">
                    <p style="margin: 0.3rem;"><?=$cursosTerminados?> diplomas</p>
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
</div>
<div class="row flex-row-reverse">
    <div class="col-9" style="padding-left: 5.7rem;">
        <ul class="nav nav-tabs tab-menu" id="myTab" role="tablist" style="width: 92%;">
            <li class="nav-item" role="presentation" style="width: 33%;">
                <a class="nav-link" id="profile-data-tab" data-toggle="tab" href="#profile-data" role="tab" aria-controls="profile-data" aria-selected="true">Perfil</a>
            </li>
            <li class="nav-item" style="width: 33%;">
                <a class="nav-link active" id="kardex-tab" data-toggle="tab" href="#kardex" role="tab" aria-controls="kardex" aria-selected="false">Tus cursos</a>
            </li>
            <li class="nav-item" style="width: 33%;">
                <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Métodos de pago</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="profile-data" role="tabpanel" aria-labelledby="profile-data">
                <div class="d-flex flex-column justify-content-center" style="width: 92%; text-align: center; padding: 1rem;">
                    <h3>Información básica</h3>
                    <form action="/editProfile" method="POST" id="editForm" onsubmit="return edit()" enctype="multipart/form-data" class="dark">
                        <?php require 'form.php'?>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade show active" id="kardex" role="tabpanel" aria-labelledby="kardex">
                <div class="row p-5 w-100">
                    <div class="row w-100 filter">
                        <div class="col d-flex align-items-center">
                            <small-darkgreen-text class="pt-1 pr-2">Filtrar por</small-darkgreen-text>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="categoryDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Todos los cursos</a>
                                <div class="dropdown-menu" style="background-color: rgb(29, 19, 47);">
                                    <a class="dropdown-item" onclick="changeFilterBy('todos');selectCategory('Todos los cursos', 'categoryDropdown', 'inputFiltro', 'todos')">Todos los cursos</a>
                                <?php foreach($categorias as $categoria): ?>
                                    <a class="dropdown-item" onclick="changeFilterBy('cat_<?=$categoria['ID_categoria']?>');selectCategory('<?=$categoria['nombre']?>', 'categoryDropdown', 'inputFiltro', 'cat_<?=$categoria['ID_categoria']?>')"><?=$categoria['nombre']?></a>
                                <?php endforeach; ?>
                                    <a class="dropdown-item" onclick="changeFilterBy('activos');selectCategory('Cursos activos', 'categoryDropdown', 'inputFiltro', 'activos')">Cursos activos</a>
                                    <a class="dropdown-item" onclick="changeFilterBy('inactivos');selectCategory('Cursos inactivos', 'categoryDropdown', 'inputFiltro', 'inactivos')">Cursos inactivos</a>
                                    <a class="dropdown-item" onclick="changeFilterBy('completados');selectCategory('Cursos completados', 'categoryDropdown', 'inputFiltro', 'completados')">Cursos completados</a>
                                    <a class="dropdown-item" onclick="changeFilterBy('incompletos');selectCategory('Cursos incompletos', 'categoryDropdown', 'inputFiltro', 'incompletos')">Cursos incompletos</a>
                                    <input type="hidden" id="inputFiltro" name="inputFiltro">
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <small-darkgreen-text class="pt-2">Desde</small-darkgreen-text>
                            <input type="date" id="startDate" class="date-range ml-2 mr-4">
                            <small-darkgreen-text class="pt-2 pl-2">Hasta</small-darkgreen-text>
                            <input type="date" id="endDate" class="date-range ml-2 mr-4">
                        </div>
                    </div>
                    <div class="row w-100 filter">
                        <div class="col-12">
                            <div class="levels-container d-flex flex-column">
                                <div class="header d-flex flex-wrap">
                                    <p><?=$cursosInscritos?> cursos inscritos | <?=$cursosTerminados?> cursos completados</p>
                                </div>
                                <div id="contenedorCursos" class="d-flex flex-column">

                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                
            </div>
            <div class="tab-pane fade " id="payment" role="tabpanel" aria-labelledby="payment">
                <div class="container">
                    <?php require 'payment.php'?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require base_path('views/partials/footer.php'); ?>