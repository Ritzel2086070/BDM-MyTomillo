<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>

    <body class="container-fluid background-gradient">
        <div class="row d-flex flex-row-reverse background-gradient">
            <div class="col-4 flex-column justify-content-end align-items-center">
                <?php

                    switch ($estado) {
                        case "oferta":
                            require 'partials/card.curso/oferta.php';
                            break;
                        case "cursando":
                            require 'partials/card.curso/cursando.php';
                            break;
                        case "terminado":
                            require 'partials/card.curso/terminado.php';
                            break;
                    }

                ?>
            </div>
            <div class="col-12 col-md-8 col-lg-8 flex-column justify-content-start align-items-center" style="padding: 2rem; padding-top: 6rem; padding-left: 5rem;">
                <h6><?= $curso["categoria"] ?></h6>
                <h1><?= $curso["titulo"] ?></h1>
                <p style="margin: 0rem;"><strong>Creado por <?= $curso["nombres"] . " " . $curso["apellido_paterno"] . " " . $curso["apellido_materno"] ?></strong></p>
                <div class="star-container mt-2">
                    <?php for($i = 0; $i < round($curso["calificacion"]) ; $i++): ?>
                        <img src="images/estrella.png" alt="estrella">
                    <?php endfor; ?>
                    <?php for($i = 0; $i < 5 - round($curso["calificacion"]) ; $i++): ?>
                        <img src="images/estrellaMala.png" alt="estrella">
                    <?php endfor; ?>
                </div>
                <p>(<?=$n_comentarios?> calificaciones)</p>
                <p class="grade"><?=$curso["n_estudiantes"]?> estudiantes</p>
            </div>
        </div>

        <div class="row background-grape" style="padding: 1rem;">
                <?php

                    switch ($estado) {
                        case "oferta":
                            require 'partials/class.variable/oferta.php';
                            break;
                        case "cursando":
                            require 'partials/class.variable/cursando.php';
                            break;
                        case "terminado":
                            require 'partials/class.variable/cursando.php';
                            break;
                    }

                ?>
        </div>

        <div class="row background-violet" style="padding: 2rem; padding-left: 2.5rem;">
            <div class="col-12 col-md-8 col-lg-8">
                <h3 class="mb-3">Comentarios</h3>
                    <div class="comments mb-3">
                        
                        <?php
                            if($_SESSION['user']['rol'] == "admin"){
                                require 'partials/class.variable/comentario.admin.php';
                            } else {
                                require 'partials/class.variable/comentario.php';
                            }
                        ?>
                        <?php
                            require 'partials/class.variable/comentario.eliminado.php';
                        ?>

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

                          <?php
                          if($estado == "terminado"){
                            require 'partials/class.variable/terminado.php';
                          }
                          ?>
                    </div>
            </div>
        </div>
        
<?php require 'partials/footer.php'?>