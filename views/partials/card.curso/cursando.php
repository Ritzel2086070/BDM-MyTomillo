<div class="card flex-column d-flex justify-content-center" style="top: 4.5rem; right: 5rem;  width: 22rem;">
    <div>
        <img src="/cursoImagen?id=<?= $curso["ID_curso"] ?>" class="card-img-top" alt="Curso imagen">
    </div>

    <div class="text-center mb-2 mt-3">
        <p style="font-size: small; margin: 0rem;">¡Hola!</p>
        <h1 style="font-size: 2rem"><?= $usuario["nombres"] . " " . $usuario["apellido_paterno"] . " " . $usuario["apellido_materno"] ?></h1>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-1 mt-2">
        <p class="text">Fecha de inscripción:</p>
        <p class="data">
            <?php
                $fecha = new DateTime($adquirido["f_inscripcion"]);
                echo $fecha->format('d/m/Y');
            ?>
        </p>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-4">
        <p class="text">Última fecha de ingreso:</p>
        <p class="data">02/04/2024</p>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-4">
        <div class="white-line"></div>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-2">
        <p class="text">Tu progreso general del curso:</p>
        <p class="data"><?=$adquirido["progreso"]?>%</p>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-2">
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?=$adquirido['progreso']?>%" aria-valuenow="<?=$adquirido['progreso']?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-3">
        <p class="text">Estatus actual:</p>
        <p class="data">Nivel 1,</p>
        <p class="data">Clase 2</p>
    </div>                    
    <div class="d-flex justify-content-center align-items-center">
        <button class="btn main-btn btn-block" onclick="toLesson()" style="margin: 0.5rem; width: 80%; margin-bottom: 2rem;">Continuar aprendiendo</button>
    </div>
</div>