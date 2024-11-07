<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<script src="js/curso.js"></script>
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
                    <h3><?= $title ?></h3>
                </div>
                <form class="dark row w-100" action="/crearCurso" method="POST" onsubmit="return validacionCurso()" enctype="multipart/form-data">
                    <div class="col-8">
                        <div class="form-group d-flex justify-content-center mt-4">
                            <input style="width: 100%;" type="text" class="form-control" id="inputNombreCurso" placeholder="Ingrese nombre del curso">
                        </div>
                        <div class="form-group d-flex justify-content-center mt-4 filter">
                            <div class="dropdown">
                                <a class="dropdown-toggle form-control" id="categoryDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Seleccione categoría del nuevo curso</a>
                                <div class="dropdown-menu" style="background-color: rgb(29, 19, 47);">
                                    <?php foreach($categorias as $categoria): ?>
                                        <a class="dropdown-item" onclick="selectCategory('<?=$categoria['nombre']?>', 'categoryDropdown')"><?=$categoria['nombre']?></a>
                                    <?php endforeach; ?>    
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
                            <input style="width: 92%;" type="text" id="inputPrecio" class="form-control" placeholder="Costo total del curso">
                            <input type="hidden" id="inputPrecioHidden" name="inputPrecioHidden">
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
                        <div id="aprendizajesContainer" class="form-group d-flex flex-column align-items-start">
                            <p>¿Qué aprenderá el alumno?</p>
                        </div>
                        <div class="form-group d-flex flex-column align-items-center mt-4">
                            <a id="addAprendizajeBtn" class="btn sub-btn btn-block" style="width: 30%;">Agregar aprendizaje</a>
                        </div>

                    </div>

                    <div class="col-12 mt-2">
                        <div class="form-group d-flex flex-column align-items-start">
                            <textarea class="mb-3" rows="35" maxlength="9000" id="inputDescripcion" placeholder="Descripción del curso..."></textarea>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <div class="form-group d-flex flex-column align-items-start">
                            <p>Ingrese la cantidad de niveles que tendrá su curso:</p>
                            <input class="form-control" type="number" id="NumNiveles" name="NumNiveles" min="1" max="20" value="0">
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center mt-4">
                        <div class="white-line" style="height: 0.05rem;"></div>
                    </div>

                    <div class="col-12 mt-4">
                        <div id="levels-container" class="levels-container d-flex flex-column">
                            
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