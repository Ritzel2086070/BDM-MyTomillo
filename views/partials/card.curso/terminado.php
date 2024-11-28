<div class="card flex-column d-flex justify-content-center" style="top: 4.5rem; right: 5rem;  width: 22rem;">
    <div>
        <img src="/cursoImagen?id=<?= $curso["ID_curso"] ?>" class="card-img-top" alt="Curso imagen">
    </div>

    <div class="text-center mb-2 mt-2">
        <p style="font-size: small; margin: 0rem;">¡Hola!</p>
        <h1 style="font-size: 2rem"><?= $usuario["nombres"] . " " . $usuario["apellido_paterno"] . " " . $usuario["apellido_materno"] ?></h1>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-1">
        <p class="text">Fecha de inscripción:</p>
        <p class="data">
            <?php
                $fecha = new DateTime($adquirido["f_inscripcion"]);
                echo $fecha->format('d/M/Y');
            ?>
        </p>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-3">
        <p class="text">Finalizado el:</p>
        <p class="data">
            <?php
                $fecha = new DateTime($adquirido["f_completado"]);
                echo $fecha->format('d/M/Y');
            ?>
        </p>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-3">
        <div class="white-line"></div>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-2">
        <p class="data">¡Curso completado!</p>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-3">
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center mb-1">
        <p class="text">Sigue aprendiendo en MyTomillo</p>
        <p class="data">¡No olvides evaluar este curso!</p>
    </div>                    
    <div class="d-flex justify-content-center align-items-center">
        <button class="btn main-btn btn-block" onclick="toLesson(<?= $curso['ID_curso'] ?>)" style="margin: 0.5rem; width: 80%; margin-bottom: 2rem;">Repasar contenido</button>
    </div>
</div>