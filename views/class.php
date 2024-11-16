<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>

<script src="js/class.js"></script>

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

                    <?php foreach($comentarios as $comentario): ?>
                        <?php if ($comentario['f_eliminacion'] != null): ?>
                            <div class="banned mb-3">
                                <p><?= $comentario['f_eliminacion'] ?>. Este mensaje ha sido eliminado por comportamiento inapropiado</p>
                            </div>
                        <?php else: ?>
                            <?php if($_SESSION['user'] ?? false): ?>
                                <?php if ($_SESSION['user']['rol'] == "admin"): ?>
                                    <div class="d-flex bd-highlight align-items-center">
                                        <div class="p-0 bd-highlight">
                                            <button type="button" class="profile d-flex justify-content-center align-items-center">
                                                <img src="images/tomilloprofile.png" alt="Logo">
                                            </button>
                                        </div>
                                        <div class="p-0 bd-highlight">
                                            <p style="margin: 0rem;"><?= $comentario['nombres'] . " " . $comentario['apellido_paterno'] . " " . $comentario['apellido_materno'] ?></p>
                                            <div class="star-container" style="width: 9rem;">
                                                <?php for($i = 0; $i < round($comentario['calificacion']) ; $i++): ?>
                                                    <img src="images/estrella.png" alt="estrella">
                                                <?php endfor; ?>
                                                <?php for($i = 0; $i < 5 - round($comentario['calificacion']) ; $i++): ?>
                                                    <img src="images/estrellaMala.png" alt="estrella">
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        <div class="ml-auto p-1 bd-highlight">
                                            <button class="btn-block" onclick="LockComent(<?= $comentario['ID_comentario'] ?>, <?= $curso['ID_curso'] ?>)"></button>
                                        </div>
                                    </div>
                                    <div class="comment mb-3">
                                        <p class="info"><?= $comentario['f_creacion'] ?></p>
                                        <p><?= $comentario['comentario'] ?></p>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="d-flex bd-highlight align-items-center">
                                    <div class="p-0 bd-highlight">
                                        <button type="button" class="profile d-flex justify-content-center align-items-center">
                                            <img src="images/tomilloprofile.png" alt="Logo">
                                        </button>
                                    </div>
                                    <div class="p-0 bd-highlight">
                                        <p style="margin: 0rem;"><?= $comentario['nombres'] . " " . $comentario['apellido_paterno'] . " " . $comentario['apellido_materno'] ?></p>
                                        <div class="star-container" style="width: 9rem;">
                                            <?php for($i = 0; $i < round($comentario['calificacion']) ; $i++): ?>
                                                <img src="images/estrella.png" alt="estrella">
                                            <?php endfor; ?>
                                            <?php for($i = 0; $i < 5 - round($comentario['calificacion']) ; $i++): ?>
                                                <img src="images/estrellaMala.png" alt="estrella">
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment mb-3">
                                    <p class="info"><?= $comentario['f_creacion'] ?></p>
                                    <p><?= $comentario['comentario'] ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php
                    if($estado == "terminado"){
                    require 'partials/class.variable/terminado.php';
                    }
                    ?>
                    </div>
            </div>
        </div>
        
<?php require 'partials/footer.php'?>