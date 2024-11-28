<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>

<script src="js/dashboard.js"></script>
    
    <body class="container-fluid background-gradient p-0">
        <br>
        <br>
        <div class="row w-100">
            <div class="col background-grape categorias">
                <h6>Categorías</h6>

                <?php foreach($categorias as $categoria): ?>
                    <a data-toggle="collapse" href="#collapse<?=$categoria['ID_categoria']?>" role="button">+</a>
                    <p><?=$categoria['nombre']?></p>
                    <description class="collapse" id="collapse<?=$categoria['ID_categoria']?>">
                        <?=$categoria['descripcion']?>
                    </description>
                    <br>
                <?php endforeach; ?>
                
            </div>
            <div class="col p-3 pr-0">
                <div class="row pt-3 pl-3 w-100">
                    <h6 id="searched-for">Todos los cursos</h6>
                    <div class="row w-100">
                        <div class="col d-flex align-items-center filter">
                            <small-darkgreen-text class="pt-1 mr-2">Filtrar por</small-darkgreen-text>
                            <div class="dropdown">
                                <a class="dropdown-toggle" id="categoryDropdown" role="button" data-toggle="dropdown" aria-expanded="false">Todos los cursos</a>
                                <div class="dropdown-menu" style="background-color: rgb(29, 19, 47);">
                                    <a class="dropdown-item" onclick="changeFilterBy('todos');selectCategory('Todos los cursos', 'categoryDropdown', 'inputFiltro', 'todos')">Todos los cursos</a>
                                    <a class="dropdown-item" onclick="changeFilterBy('mas-vendidos');selectCategory('Más vendidos', 'categoryDropdown', 'inputFiltro', 'mas-vendidos')">Más vendidos</a>
                                    <a class="dropdown-item" onclick="changeFilterBy('mejor-valorados');selectCategory('Mejor valorados', 'categoryDropdown', 'inputFiltro', 'mejor-valorados')">Mejor valorados</a>
                                    <a class="dropdown-item" onclick="changeFilterBy('mas-recientes');selectCategory('Más recientes', 'categoryDropdown', 'inputFiltro', 'mas-recientes')">Más recientes</a>
                                <?php foreach($categorias as $categoria): ?>
                                    <a class="dropdown-item" onclick="changeFilterBy('cat_<?=$categoria['ID_categoria']?>');selectCategory('<?=$categoria['nombre']?>', 'categoryDropdown', 'inputFiltro', 'cat_<?=$categoria['ID_categoria']?>')"><?=$categoria['nombre']?></a>
                                <?php endforeach; ?>
                                    <input type="hidden" id="inputFiltro" name="inputFiltro">
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end filter">
                            <small-darkgreen-text class="pt-2">Desde</small-darkgreen-text>
                            <input type="date" id="startDate" class="date-range ml-2 mr-4" style="width: 27%;">
                            <small-darkgreen-text class="pt-2 pl-2">Hasta</small-darkgreen-text>
                            <input type="date" id="endDate" class="date-range ml-2 mr-4" style="width: 27%;">
                        </div>
                    </div>
                    
                </div>
                <div id="container" class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                
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


        
<?php require 'partials/footer.php'?>