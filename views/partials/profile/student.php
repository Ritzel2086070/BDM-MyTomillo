<div class="row background-gradient mt-5 pl-5 pt-5 pb-5 pb-4" style="height: 12rem;">
    <div class="col-4 flex-column justify-content-end align-items-center">
        <div class="card flex-column d-flex justify-content-center" style="position: absolute; ; top: -2rem; left: 2rem;  width: 22rem; padding: 2rem;">
            <div class="d-flex flex-column justify-content-end align-items-center">
                <span class="signin-image" style="margin: 0rem; width: 10rem; height: 10rem;">
                    <img src="images/tomilloprofile.png" alt="Foto de perfil">
                </span>
            </div>
            <div class="text-center mt-3">
                <h1 style="font-size: 1.5rem;">Marla Judith Estrada Valdez</h1>
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
                    <p style="margin: 0.3rem;">0 cursos</p>
                </div>
                <div class="skills-container d-flex justify-content-center align-items-center mt-0">  
                    <img width="20" src="images/conversacion.png" alt="books">
                    <p style="margin: 0.3rem;">0 conversaciones</p>
                </div>
                <div class="skills-container d-flex justify-content-center align-items-center mt-0">
                    <img width="20" src="images/diploma.png" alt="books">
                    <p style="margin: 0.3rem;">0 diplomas</p>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-4">
                <button class="btn main-btn btn-block" onclick="enableDisableProfile()" id="btnEnableDisable" style="margin: 0rem; width: 70%;">Editar perfil</button>
            </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
                <button class="btn sub-btn btn-block" onclick="" style="margin: 0rem; width: 70%; margin-bottom: 0.5rem;">Cerrar sesión</button>
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
                    <form class="dark">
                        <?php require 'form.php'?>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade show active" id="kardex" role="tabpanel" aria-labelledby="kardex">
                <div class="row p-5 w-100">
                    <div class="row w-100 filter">
                        <div class="col d-flex align-items-center">
                            <small-darkgreen-text class="pt-1 pr-2">Ordenar por</small-darkgreen-text>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Categoría</a>
                                <div class="dropdown-menu" style="background-color: rgb(29, 19, 47);">
                                    <a class="dropdown-item" href="#">Diseño</a>
                                    <a class="dropdown-item" href="#">Arte e ilustración</a>
                                    <a class="dropdown-item" href="#">Dibujo y pintura</a>
                                    <a class="dropdown-item" href="#">Cine y video</a>
                                    <a class="dropdown-item" href="#">Música y audio</a>
                                    <a class="dropdown-item" href="#">Fotografía</a>
                                    <a class="dropdown-item" href="#">Modelado y animación 3D</a>
                                    <a class="dropdown-item" href="#">Concept y animación 2D</a>
                                    <a class="dropdown-item" href="#">Inteligencia y ciencia de datos</a>
                                    <a class="dropdown-item" href="#">Software</a>
                                    <a class="dropdown-item" href="#">Web</a>
                                    <a class="dropdown-item" href="#">Ventas</a>
                                    <a class="dropdown-item" href="#">Administración y finanzas</a>
                                    <a class="dropdown-item" href="#">Marketing y negocios</a>
                                    <a class="dropdown-item" href="#">Manualidades y cocina</a>
                                    <a class="dropdown-item" href="#">Escribir y publicar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <small-darkgreen-text class="pt-2">Desde</small-darkgreen-text>
                            <input type="date" class="date-range ml-2 mr-4">
                            <small-darkgreen-text class="pt-2 pl-2">Hasta</small-darkgreen-text>
                            <input type="date" class="date-range ml-2 mr-4">
                        </div>
                    </div>
                    <div class="row w-100 filter">
                        <div class="col-12">
                            <div class="levels-container d-flex flex-column">
                                <div class="header d-flex flex-wrap">
                                    <p>8 cursos inscritos | 6 cursos completados</p>
                                </div>
                                <button type="button" class="btn level" data-toggle="collapse" data-target="#lesson1">
                                    <div class="row profile-course d-flex justify-content-between"> 
                                        <p class="flex-grow-1 bd-highlight">Aprende a crear tu web desde cero con HTML y CSS</p>
                                        <p class="pr-2 bd-highlight categoria">Categoría:</p>
                                        <p class="bd-highlight mr-4">Web</p>
                                    </div>
                                </button>
                                <div id="lesson1" class="collapse">
                                    <div class="row d-flex bd-highlight">
                                        <p class="text p-0 ml-3 bd-highlight">Progreso del curso: </p>
                                        <p class="data p-0 ml-2 bd-highlight"><strong>75%</strong></p>
                                        <p class="ml-auto p-0 mr-5 bd-highlight"><strong>Incompleto</strong></p>
                                    </div>
                                    <div class="row">
                                        <div class="progress ml-3" style="width: 93%;">
                                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="row d-flex bd-highlight mt-2">
                                        <p class="text p-0 ml-3 bd-highlight">Fecha de inscripción: </p>
                                        <p class="data p-0 ml-2 bd-highlight">02/Abr/2024</p>
                                    </div>
                                    <div class="row d-flex bd-highlight">
                                        <p class="text p-0 ml-3 bd-highlight">Última fecha de ingreso:</p>
                                        <p class="data p-0 ml-2 bd-highlight">02/Abr/2024</p>
                                    </div>
                                    <a onclick="toClass()">Ver Curso</a>
                                </div>

                                <button type="button" class="btn level" data-toggle="collapse" data-target="#lesson2">
                                    <div class="row profile-course d-flex justify-content-between"> 
                                        <p class="flex-grow-1 bd-highlight">Como perder miedo al público</p>
                                        <p class="pr-2 bd-highlight categoria">Categoría:</p>
                                        <p class="bd-highlight mr-4">Liderazgo</p>
                                    </div>
                                </button>
                                <div id="lesson2" class="collapse">
                                    <div class="row d-flex bd-highlight">
                                        <p class="text p-0 ml-3 bd-highlight">Progreso del curso: </p>
                                        <p class="data p-0 ml-2 bd-highlight"><strong>100%</strong></p>
                                        <p class="ml-auto p-0 mr-5 bd-highlight"><strong>Completado</strong></p>
                                    </div>
                                    <div class="row">
                                        <div class="progress ml-3" style="width: 93%;">
                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="row d-flex bd-highlight mt-2">
                                        <p class="text p-0 ml-3 bd-highlight">Fecha de inscripción: </p>
                                        <p class="data p-0 ml-2 bd-highlight">02/Abr/2024</p>
                                    </div>
                                    <div class="row d-flex bd-highlight">
                                        <p class="text p-0 ml-3 bd-highlight">Fecha de terminación:</p>
                                        <p class="data p-0 ml-2 bd-highlight">02/Abr/2024</p>
                                    </div>
                                    <div class="row d-flex bd-highlight">
                                        <a class="text p-0 ml-3 bd-highlight" onclick="seeDegree()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                            </svg>
                                            Ver diploma</a>
                                    </div>
                                    <a onclick="toClass()">Ver Curso</a>
                                </div>

                                <button type="button" class="btn level" data-toggle="collapse" data-target="#lesson4">
                                    <div class="row profile-course d-flex justify-content-between"> 
                                        <p class="flex-grow-1 bd-highlight">Aprende a crear tu web desde cero con HTML y CSS</p>
                                        <p class="pr-2 bd-highlight categoria">Categoría:</p>
                                        <p class="bd-highlight mr-4">Web</p>
                                    </div>
                                </button>
                                <div id="lesson4" class="collapse">
                                    <div class="row d-flex bd-highlight">
                                        <p class="text p-0 ml-3 bd-highlight">Progreso del curso: </p>
                                        <p class="data p-0 ml-2 bd-highlight"><strong>75%</strong></p>
                                        <p class="ml-auto p-0 mr-5 bd-highlight"><strong>Incompleto</strong></p>
                                    </div>
                                    <div class="row">
                                        <div class="progress ml-3" style="width: 93%;">
                                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="row d-flex bd-highlight mt-2">
                                        <p class="text p-0 ml-3 bd-highlight">Fecha de inscripción: </p>
                                        <p class="data p-0 ml-2 bd-highlight">02/Abr/2024</p>
                                    </div>
                                    <div class="row d-flex bd-highlight">
                                        <p class="text p-0 ml-3 bd-highlight">Última fecha de ingreso:</p>
                                        <p class="data p-0 ml-2 bd-highlight">02/Abr/2024</p>
                                    </div>
                                    <a onclick="toClass()">Ver Curso</a>
                                </div>

                                <button type="button" class="btn level" data-toggle="collapse" data-target="#lesson3">
                                    <div class="row profile-course d-flex justify-content-between"> 
                                        <p class="flex-grow-1 bd-highlight">Como perder miedo al público</p>
                                        <p class="pr-2 bd-highlight categoria">Categoría:</p>
                                        <p class="bd-highlight mr-4">Liderazgo</p>
                                    </div>
                                </button>
                                <div id="lesson3" class="collapse">
                                    <div class="row d-flex bd-highlight">
                                        <p class="text p-0 ml-3 bd-highlight">Progreso del curso: </p>
                                        <p class="data p-0 ml-2 bd-highlight"><strong>100%</strong></p>
                                        <p class="ml-auto p-0 mr-5 bd-highlight"><strong>Completado</strong></p>
                                    </div>
                                    <div class="row">
                                        <div class="progress ml-3" style="width: 93%;">
                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="row d-flex bd-highlight mt-2">
                                        <p class="text p-0 ml-3 bd-highlight">Fecha de inscripción: </p>
                                        <p class="data p-0 ml-2 bd-highlight">02/Abr/2024</p>
                                    </div>
                                    <div class="row d-flex bd-highlight">
                                        <p class="text p-0 ml-3 bd-highlight">Fecha de terminación:</p>
                                        <p class="data p-0 ml-2 bd-highlight">02/Abr/2024</p>
                                    </div>
                                    <div class="row d-flex bd-highlight">
                                        <a class="text p-0 ml-3 bd-highlight" onclick="seeDegree()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                            </svg>
                                            Ver diploma</a>
                                    </div>
                                    <a onclick="toClass()">Ver Curso</a>
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