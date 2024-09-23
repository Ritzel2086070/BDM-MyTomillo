<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>

    
    <body class="container-fluid background-gradient p-0">
        <br>
        <br>
        <div class="row w-100">
            <div class="col background-grape categorias">
                <small-darkgreen-text>Filtrar resultados</small-darkgreen-text>
                <h6>Categorías</h6>

                <a data-toggle="collapse" href="#collapseExample" role="button">+</a>
                <p>Programación</p>
                <description class="collapse" id="collapseExample">
                    Potencia tus habilidades de desarrollo de software con cursos de diseño web, diseño de aplicaciones móviles y diseño de videojuegos.
                </description>
                <br>
                <a data-toggle="collapse" href="#collapseExample" role="button">+</a>
                <p> Diseño</p>
                <description class="collapse" id="collapseExample">
                    Aprende a diseñar productos digitales atractivos y funcionales con cursos de diseño gráfico, diseño de experiencia de usuario y diseño de interfaces.
                </description>
                <br>
                <a data-toggle="collapse" href="#collapseExample" role="button">+</a>
                <p> Marketing</p>
                <description class="collapse" id="collapseExample">
                    Domina las estrategias de marketing digital con cursos de SEO, SEM, redes sociales y marketing de contenidos.
                </description>
                <br>
                <a data-toggle="collapse" href="#collapseExample" role="button">+</a>
                <p> Negocios</p>
                <description class="collapse" id="collapseExample">
                    Aprende a gestionar y hacer crecer tu negocio con cursos de emprendimiento, finanzas, contabilidad y gestión de proyectos.
                </description>
                <br>
                <a data-toggle="collapse" href="#collapseExample" role="button">+</a>
                <p> Fotografía</p>
                <description class="collapse" id="collapseExample">
                    Descubre cómo capturar momentos únicos con cursos de fotografía digital, retoque fotográfico y fotografía de retrato.
                </description>
                <br>
                <a data-toggle="collapse" href="#collapseExample" role="button">+</a>
                <p> Idiomas</p>
                <description class="collapse" id="collapseExample">
                    Aprende a comunicarte en diferentes idiomas con cursos de inglés, francés, alemán, chino y muchos más.
                </description>
                <br>
                <a data-toggle="collapse" href="#collapseExample" role="button">+</a>
                <p> Música</p>
                <description class="collapse" id="collapseExample">
                    Aprende a tocar instrumentos, componer canciones y producir música con cursos de guitarra, piano, canto y producción musical.
                </description>
                <br>
                <a data-toggle="collapse" href="#collapseExample" role="button">+</a>
                <p> Cocina</p>
                <description class="collapse" id="collapseExample">
                    Descubre nuevas recetas y técnicas culinarias con cursos de cocina internacional, repostería y cocina saludable.
                </description>
                <br>
                <a data-toggle="collapse" href="#collapseExample" role="button">+</a>
                <p> Salud y bienestar</p>
                <description class="collapse" id="collapseExample">
                    Cuida tu cuerpo y mente con cursos de yoga, meditación, nutrición y entrenamiento personal.
                </description>
                
            </div>
            <div class="col p-3 pr-0">
                <div class="row pt-3 pl-3 w-100">
                    <h6>Todos los cursos</h6>
                    <div class="row w-100">
                        <div class="col d-flex align-items-center filter">
                            <small-darkgreen-text class="pt-1 mr-2">Ordenar por</small-darkgreen-text>
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
                        <div class="col d-flex justify-content-end filter">
                            <small-darkgreen-text class="pt-2">Desde</small-darkgreen-text>
                            <input type="date" onchange="validarFecha()" id="inputFecha" class="date-range ml-2 mr-4" style="width: 27%;">
                            <small-darkgreen-text class="pt-2 pl-2">Hasta</small-darkgreen-text>
                            <input type="date" class="date-range ml-2 mr-4" style="width: 27%;">
                        </div>
                    </div>
                    
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                
                      <?php 
                      for($i = 0; $i < 6; $i++) {
                        echo card_generator("Curso de diseño de interfaces", "Heber Abiel Perez Jimenez", 250, 4.98, 2);
                      }
                        ?>
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