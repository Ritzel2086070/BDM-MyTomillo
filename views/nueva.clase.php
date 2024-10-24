<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
    <body class="container-fluid background-grape" style="display: flex; flex-direction: column; min-height: 100vh;">
        <div class="row background-gradient mt-5 pt-5 pb-5" style="height: 12rem;">
        </div>
        <div class="row pl-4 pt-4 pb-5">
            <a href="profile_teacher.html" class="data p-0 mx-2"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ccc" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                  </svg>
                Regresar
            </a>
        </div>
        <div class="row w-100">
            <div class="form-container">
                <div class="row d-flex justify-content-center">
                    <h3>Nivel 1</h3>
                </div>
                <form action="" class="dark row w-100">
                    <div class="col-12">
                        <div class="form-group d-flex justify-content-center mt-4">
                            <input style="width: 100%;" type="text" class="form-control" placeholder="Ingrese nombre del nivel">
                        </div>
                        
                        <div class="form-group d-flex justify-content-center mt-2 mb-2">
                            <label class="d-flex bulgy-checkboxes align-items-center justify-content-start">
                                <input type="checkbox" name="options"/>
                                <span class="checkbox"></span>
                                Ofertar gratis
                            </label>
                        </div>
                        <div class="form-group d-flex justify-content-center align-items-center mt-0">
                            <p style="margin: 0;" class="pr-2">$</p>
                            <input style="width: 92%;" type="text" class="form-control" placeholder="Costo del nivel individual">
                            <p style="margin: 0;" class="pl-2">MXN</p>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <div class="form-group d-flex flex-column align-items-start">
                            <p>Ingrese la cantidad de clases que tendrá su nivel:</p>
                            <input class="form-control" type="number" id="NumNiveles" name="NumNiveles" min="1" max="20" placeholder="1">
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center mt-4">
                        <div class="white-line" style="height: 0.05rem;"></div>
                    </div>
                    
                    <div class="col-12 mt-4">
                        <div class="levels-container d-flex flex-column">
                            <div class="header d-flex flex-wrap justify-content-between">
                                <p class="pl-4">2 Clases</p>
                            </div>

                            <div class="row ml-0 mr-0" style="background-color: #130924;">
                                <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
                                    <button type="button" class="btn btn-block level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson10">
                                        <p class="flex-grow-1 pl-4">Clase 1. Fundamentos y bases de HTML</p>
                                    </button>
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
                                <div class="form-group d-flex justify-content-center mt-4">
                                    <input style="width: 90%;" type="text" class="form-control" placeholder="Ingrese nombre de la clase">
                                </div>
                                <div class="form-group d-flex justify-content-center mt-4 pr-5 pl-5">
                                    <p class="col-9">Nombre del video blah blah blah.mp4</p>
                                    <button class="btn sub-btn btn-block col-3">Subir video</button>
                                </div>
                                <div class="form-group d-flex justify-content-center mt-4">
                                    <textarea class="mb-3" rows="35" maxlength="9000" placeholder="Descripción de la clase..." style="width: 90%;"></textarea>
                                </div>
                                <div class="d-flex flex-row bd-highlight mb-3 justify-content-around align-items-center mt-4">
                                    <button class="btn sub-btn" style="width: 25%">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                            </svg>
                                        Agregar material
                                    </button>
                                
                                    <button class="btn sub-btn" style="width: 25%">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                            </svg>
                                        Agregar link
                                    </button>
                                </div>
                            </div>

                            <div class="row ml-0 mr-0" style="background-color: #130924;">
                                <div class="col-12 d-flex justify-content-start align-items-center d-flex bd-highlight">
                                    <button type="button" class="btn btn-block level p-2 flex-grow-1 bd-highlight" data-toggle="collapse" data-target="#lesson11">
                                        <p class="flex-grow-1 pl-4">Clase 2. Aplicación de las etiquetas de HTML</p>
                                    </button>
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
                                <div class="form-group d-flex justify-content-center mt-4">
                                    <input style="width: 90%;" type="text" class="form-control" placeholder="Ingrese nombre de la clase">
                                </div>
                                <div class="form-group d-flex justify-content-center mt-4 pr-5 pl-5">
                                    <p class="col-9">Nombre del video blah blah blah.mp4</p>
                                    <button class="btn sub-btn btn-block col-3">Subir video</button>
                                </div>
                                <div class="form-group d-flex justify-content-center mt-4">
                                    <textarea class="mb-3" rows="35" maxlength="9000" placeholder="Descripción de la clase..." style="width: 90%;"></textarea>
                                </div>
                                <div class="d-flex flex-row bd-highlight mb-3 justify-content-around align-items-center mt-4">
                                    <button class="btn sub-btn" style="width: 25%">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                            </svg>
                                        Agregar material
                                    </button>
                                
                                    <button class="btn sub-btn" style="width: 25%">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#86BD7B" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                            </svg>
                                        Agregar link
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>



                    
                    <div class="col-12 mt-2 d-flex justify-content-center">
                        <button class="btn main-btn btn-block mt-4" >Guardar nivel</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>