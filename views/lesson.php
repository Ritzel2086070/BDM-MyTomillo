<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>
    
    <body class="container-fluid background-violet align-self-center">
        <div class="row background-violet" style="padding: 0rem;">
            <div class="col-8 background-grape">
                <div class="row">
                    <div class="video-content tab-content mt-4">
                        <video controls width="100%">
                            <source src="videos/test.mp4" type="video/mp4">
                            Tu navegador no soporta la etiqueta video.
                        </video>
                    </div>
                </div>
                
                <div class="row background-gradient">
                    <ul class="nav nav-tabs tab-menu" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="description" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Descripción general</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="resources" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Recursos</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="description">
                            <h3>Fundamentos y bases de HTML</h3>
                            <div class="lesson-description">
                                <p>Aprende los conceptos básicos para iniciarte en la programación web con HTML y CSS.</p>
                                <p>En los videos iremos paso a paso con la estructura básica que debemos conocer para desarrollar webs, todo con software libre.</p>
                                <p>El software usado durante el curso es totalmente gratuito, para el editor del código he usado Visual Studio de Microsoft y el navegador usado es Chrome de Google.</p>
                                <p>En poco tiempo podremos entender el código de otras webs y ser capaces de crear la nuestra.</p>
                                <p>Los videos son totalmente prácticos e iremos poco a poco avanzando con las estructuras básicas.</p>
                                <p>Al final podrás ver un video práctico con un caso que podría ser real, para la creación de una web con la carta/menu de un restaurante.</p>
                                <p>Este documento está adaptado a otros editores o navegadores, no hay ningún problema en usarlos.</p>
                                <p>También podrás contactarme por email.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="resources">
                            <h3>Aquí hay materiales adicionales sobre el tema</h3>
                            <div class="downloads">
                                <p>Para complementar tu aprendizaje, el maestro ha decidido compartir contenido de alta calidad</p>

                                <div class="download-item">
                                    <input type="text" id="videoLink" value="https://www.youtube.com/watch?v=2U6H3CWpaWQ" readonly>
                                    <button class="btn main-btn" onclick="goToLink()">Ir al link</button>
                                </div>

                                <div class="download-item">
                                    <input type="text" value="Doc.pdf" readonly>
                                    <button class="btn main-btn" onclick="downloadFile('Doc.pdf')">Descargar</button>
                                </div>
                                <div class="download-item">
                                    <input type="text" value="Doc2.pdf" readonly>
                                    <button class="btn main-btn" onclick="downloadFile('Doc2.pdf')">Descargar</button>
                                </div>
                                <button style="width: 20%;" class="btn main-btn" onclick="downloadAll()">Descargar todo</button>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="col-4 content d-flex flex-column">
                <h2 class="mt-5">Contenido del curso</h2>
                <div class="lessons d-flex flex-column bd-highlight mt-3 ">
                    <div class="header p-0 bd-highlight">
                        <p class="p-2 bd-highlight">Nivel 1. HTML</p>
                    </div>
                    <div class="lesson">
                        <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
                            <input type="checkbox" name="options"/>
                            <span class="checkbox"></span>
                            Clase 1: Fundamentos y clases
                        </label>
                        <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
                            <input type="checkbox" name="options"/>
                            <span class="checkbox"></span>
                            Clase 2: Aplicación de las etiquetas de HTML
                        </label>
                    </div>
                    <div class="header p-0 bd-highlight">
                        <p class="p-2 bd-highlight">Nivel 2. CSS, formato y diseño</p>
                    </div>
                    <div class="lesson">
                        <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
                            <input type="checkbox" name="options"/>
                            <span class="checkbox"></span>
                            Clase 1: Creación de un formato para nuestra página web
                        </label>
                        <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
                            <input type="checkbox" name="options"/>
                            <span class="checkbox"></span>
                            Clase 2: Bootstrap y el flexbox
                        </label>
                    </div>
                    <div class="header p-0 bd-highlight">
                        <p class="p-2 bd-highlight">Nivel 3. JavaScript</p>
                    </div>
                    <div class="lesson">
                        <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
                            <input type="checkbox" name="options"/>
                            <span class="checkbox"></span>
                            Clase 1: Uso y manejo de JavaScript
                        </label>
                    </div>
                    <div class="header p-0 bd-highlight">
                        <p class="p-2 bd-highlight">Nivel 4. Proyecto final y manejo de hosting</p>
                    </div>
                    <div class="lesson">
                        <label class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
                            <input type="checkbox" name="options"/>
                            <span class="checkbox"></span>
                            Clase 1: Hosteo de una página web
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
<?php require 'partials/footer.php'; ?>