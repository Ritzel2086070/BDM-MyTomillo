<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>

    <body class="container-fluid background-grape" style="display: flex; flex-direction: column; min-height: 100vh;">
        <div class="row background-gradient mt-5 pt-5 pb-5" style="height: 12rem;">
        </div>
        <div class="row pl-4 pt-4 pb-5">
            <a href="/profile" class="data p-0 mx-2"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ccc" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                  </svg>
                Regresar
            </a>
        </div>
        <div class="row w-100">
            <div class="form-container">
                <div class="row d-flex justify-content-center">
                    <h3>Editar curso</h3>
                </div>
                <form onsubmit="return validacionCurso()" class="dark row w-100">
                    <div class="col-8">
                        <div class="form-group d-flex justify-content-center mt-4">
                            <input style="width: 100%;" type="text" class="form-control" placeholder="Aprende a crear tu web desde cero con HTML y CSS">
                        </div>
                        <div class="form-group d-flex justify-content-center mt-4 filter">
                            <div class="dropdown">
                                <a class="dropdown-toggle form-control" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Seleccione categoría del nuevo curso</a>
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
                                    <a class="dropdown-item active" href="#">Web</a>
                                    <a class="dropdown-item" href="#">Ventas</a>
                                    <a class="dropdown-item" href="#">Administración y finanzas</a>
                                    <a class="dropdown-item" href="#">Marketing y negocios</a>
                                    <a class="dropdown-item" href="#">Manualidades y cocina</a>
                                    <a class="dropdown-item" href="#">Escribir y publicar</a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center mt-2 mb-2">
                        <label class="d-flex bulgy-checkboxes align-items-center justify-content-start">
                            <input type="checkbox" id="checkbox-gratis" name="options"/>
                            <span class="checkbox"></span>
                            Ofertar gratis
                        </label>
                        </div>
                        <div class="form-group d-flex justify-content-center align-items-center mt-0">
                            <p style="margin: 0;" class="pr-2">$</p>
                            <input style="width: 92%;" type="text" id="inputPrecio" class="form-control" placeholder="500.00">
                            <p style="margin: 0;" class="pl-2">MXN</p>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group d-flex justify-content-end mt-3">
                            <div class="d-flex flex-column justify-content-end align-items-center">
                                <span class="course-image">
                                    <img src="">
                                </span>
                                <input type="file" name="file" id="file" class="inputfile">
                                <small class="pt-1 pr-2">La imagen debe ser de 300x200</small>
                                <label class="label-file" for="file" style="height: 1.7rem; margin-bottom: 1rem;"></label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group d-flex flex-column align-items-start">
                            <p>¿Qué aprenderá el alumno?</p>
                            <input type="text" class="form-control" placeholder="Crea tu propio sitio web con software libre">
                            <div class="d-flex bd-highlight w-100 mt-3">
                                <input type="text" class="form-control flex-grow-1 bd-highlight" placeholder="Aprender las etiquetas esenciales de HTML">
                                <a href="" class="bd-highlight mx-2" style="height: 1.5rem;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </a>
                            </div>

                            <div class="d-flex bd-highlight w-100 mt-3">
                                <input type="text" class="form-control flex-grow-1 bd-highlight" placeholder="Desarrollo web">
                                <a href="" class="bd-highlight mx-2" style="height: 1.5rem;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="d-flex bd-highlight w-100 mt-3">
                                <input type="text" class="form-control flex-grow-1 bd-highlight" placeholder="Aprender las bases CSS para dar formato al documento HTML">
                                <a href="" class="bd-highlight mx-2" style="height: 1.5rem;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="form-group d-flex flex-column align-items-center mt-4">
                            <a class="btn sub-btn btn-block" style="width: 30%;">Agregar aprendizaje</a>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <div class="form-group d-flex flex-column align-items-start">
                            <textarea class="mb-3" rows="35" maxlength="9000" placeholder="Descripción del curso...">
Aprende los conceptos basicos para iniciarte en la programacion web con HTML y CSS.
En los videos iremos paso a paso con la estructura basica que debemos conocer para desarrollar webs, todo con software libre.
El software usado durante el curso es totalmente gratuito, para el editor del codigo he usado Visual Studio de Microsoft y el navegador usado es Chrome de Google.
En poco tiempo podremos entender el codigo de otras webs y ser capaces de crear la nuestra.
Los videos son totalmente practicos e iremos poco a poco avanzando con las estructuras basicas.
Al final podras ver un video practico con un caso que podria ser real, para la creacion de una web con la carta / menu de un restaurante o bar.
Si como estudiante estas adaptado a otros editores o navegadores, no hay ningun problema en usarlo.
Para cualquier duda no dudeis en contactar conmigo a traves de los diferentes canales y redes sociales, pasaros tambien por mi canal YouTube donde tengo numerosos tutoriales publicados sobre HTML, CSS, JavaScript, Python...
En el canal YouTube podreis acceder a los diferentes contenidos a traves de las listas que he creado para categorizar  los distintos tutoriales que he subido al canal.
Tambien podeis contactar via emal.
Espero os sea util el curso y que sea un buen comienzo en la Programacion, muchas gracias.
Nota: si algun enlace del curso no funciona, cambia "ticoticotaa" por "josecodetech".
                            </textarea>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <div class="form-group d-flex flex-column align-items-start">
                            <p>Ingrese la cantidad de niveles que tendrá su curso:</p>
                            <input class="form-control" type="number" id="NumNiveles" name="NumNiveles" min="1" max="20" placeholder="4">
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center mt-4">
                        <div class="white-line" style="height: 0.05rem;"></div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="levels-container d-flex flex-column">
                            <div class="header d-flex flex-wrap justify-content-between">
                                <p>2 Niveles</p>
                            </div>

                            <div class="row ml-0 mr-0" style="background-color: #130924;">
                                <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
                                    <button type="button" class="btn btn-block level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson10">
                                        <p class="flex-grow-1 pl-4">HTML</p>
                                    </button>
                                    <div class="profile-course d-flex justify-content-end ml-auto bd-highlight">
                                        <a href="/nueva_clase" class="categoria p-0" style="height: 50%;">Editar</a>
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
                                            <th scope="col">Clases del nivel</th>
                                            <th scope="col" >
                                                <p style="margin: 0rem;" class="d-flex justify-content-end">Cantidad de clases:</p>
                                            </th>
                                            <th scope="col">
                                                <input class="form-control" type="number" id="NumNiveles" name="NumNiveles" min="1" max="20" style="width: 100%;" placeholder="1">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Fundamentos y bases de HTML</td>
                                            <td>
                                                <a href="/nueva_clase" class="data-rv p-0 d-flex justify-content-end">Editar</a>
                                            </td>
                                            <td>
                                                <a href="" class="mx-2 pl-5" style="height: 1.5rem;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aplicación de las etiquetas de HTML</td>
                                            <td>
                                                <a href="/nueva_clase" class="data-rv p-0 d-flex justify-content-end">Editar</a>
                                            </td>
                                            <td>
                                                <a href="" class="mx-2 pl-5" style="height: 1.5rem;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>                                      
                                    </tbody>
                                </table>
                            </div>

                            <div class="row ml-0 mr-0" style="background-color: #130924;">
                                <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
                                    <button type="button" class="btn btn-block level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson11">
                                        <p class="flex-grow-1 pl-4">CSS, Diseño y formato</p>
                                    </button>
                                    <div class="profile-course d-flex justify-content-end ml-auto bd-highlight">
                                        <a href="/nueva_clase" class="categoria p-0" style="height: 50%;">Editar</a>
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
                            
                            <div id="lesson11" class="collapse pl-2">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Clases del nivel</th>
                                            <th scope="col" >
                                                <p style="margin: 0rem;" class="d-flex justify-content-end">Cantidad de clases:</p>
                                            </th>
                                            <th scope="col">
                                                <input class="form-control" type="number" id="NumNiveles" name="NumNiveles" min="1" max="20" style="width: 100%;" placeholder="1">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Fundamentos y bases de HTML</td>
                                            <td>
                                                <a href="/nueva_clase" class="data-rv p-0 d-flex justify-content-end">Editar</a>
                                            </td>
                                            <td>
                                                <a href="" class="mx-2 pl-5" style="height: 1.5rem;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aplicación de las etiquetas de HTML</td>
                                            <td>
                                                <a href="/nueva_clase" class="data-rv p-0 d-flex justify-content-end">Editar</a>
                                            </td>
                                            <td>
                                                <a href="" class="mx-2 pl-5" style="height: 1.5rem;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>                                      
                                    </tbody>
                                </table>
                            </div>

                            <div class="row ml-0 mr-0" style="background-color: #130924;">
                                <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
                                    <button type="button" class="btn btn-block level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson11">
                                        <p class="flex-grow-1 pl-4">Uso y manejo de JavaScript</p>
                                    </button>
                                    <div class="profile-course d-flex justify-content-end ml-auto bd-highlight">
                                        <a href="/nueva_clase" class="categoria p-0" style="height: 50%;">Editar</a>
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
                            
                            <div id="lesson11" class="collapse pl-2">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Clases del nivel</th>
                                            <th scope="col" >
                                                <p style="margin: 0rem;" class="d-flex justify-content-end">Cantidad de clases:</p>
                                            </th>
                                            <th scope="col">
                                                <input class="form-control" type="number" id="NumNiveles" name="NumNiveles" min="1" max="20" style="width: 100%;" placeholder="1">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Fundamentos y bases de HTML</td>
                                            <td>
                                                <a href="/nueva_clase" class="data-rv p-0 d-flex justify-content-end">Editar</a>
                                            </td>
                                            <td>
                                                <a href="" class="mx-2 pl-5" style="height: 1.5rem;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aplicación de las etiquetas de HTML</td>
                                            <td>
                                                <a href="/nueva_clase" class="data-rv p-0 d-flex justify-content-end">Editar</a>
                                            </td>
                                            <td>
                                                <a href="" class="mx-2 pl-5" style="height: 1.5rem;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>                                      
                                    </tbody>
                                </table>
                            </div>

                            <div class="row ml-0 mr-0" style="background-color: #130924;">
                                <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
                                    <button type="button" class="btn btn-block level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson11">
                                        <p class="flex-grow-1 pl-4">Proyecto final y hosting</p>
                                    </button>
                                    <div class="profile-course d-flex justify-content-end ml-auto bd-highlight">
                                        <a href="/nueva_clase" class="categoria p-0" style="height: 50%;">Editar</a>
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
                            
                            <div id="lesson11" class="collapse pl-2">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Clases del nivel</th>
                                            <th scope="col" >
                                                <p style="margin: 0rem;" class="d-flex justify-content-end">Cantidad de clases:</p>
                                            </th>
                                            <th scope="col">
                                                <input class="form-control" type="number" id="NumNiveles" name="NumNiveles" min="1" max="20" style="width: 100%;" placeholder="1">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Fundamentos y bases de HTML</td>
                                            <td>
                                                <a href="/nueva_clase" class="data-rv p-0 d-flex justify-content-end">Editar</a>
                                            </td>
                                            <td>
                                                <a href="" class="mx-2 pl-5" style="height: 1.5rem;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Aplicación de las etiquetas de HTML</td>
                                            <td>
                                                <a href="/nueva_clase" class="data-rv p-0 d-flex justify-content-end">Editar</a>
                                            </td>
                                            <td>
                                                <a href="" class="mx-2 pl-5" style="height: 1.5rem;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>                                      
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="col-12 mt-2 d-flex justify-content-center">
                        <button class="btn main-btn btn-block mt-4" >Publicar curso</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>