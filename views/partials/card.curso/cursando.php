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
                echo $fecha->format('d/M/Y');
            ?>
        </p>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-2">
        <p class="text">Última fecha de ingreso:</p>
        <p class="data">
        <?php
            if ($ultimo) {
                $fecha = $ultimo["f_visualizacion"];
            } else {
                $fecha = $adquirido["f_inscripcion"];
            }

            $fecha = new DateTime($fecha);
            echo $fecha->format('d/M/Y');
        ?>
        </p>
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
        <?php
            if ($ultimo) {
                ?>
                <p class="data">Nivel <?=$ultimo["ID_nivel"]?>,</p>
                <p class="data">Clase <?=$ultimo["ID_clase"]?></p>
                <?php
            } else {
                ?>
                <p class="data">Nivel 1,</p>
                <p class="data">Clase 1</p>
                <?php
            }
        ?>
    </div>                    
    <div class="d-flex justify-content-center align-items-center">
        <button class="btn main-btn btn-block" onclick="toLesson(<?= $curso['ID_curso'] ?>)" style="margin: 0.5rem; width: 80%; margin-bottom: 2rem;">Continuar aprendiendo</button>
    </div>
    <?php if($adquirido["tipo_pago"] == 0): ?>
    <div class="d-flex justify-content-center align-items-center">
        <div class="white-line"></div>
    </div>

    <div class="text-center mt-3">
        <h1 style="font-size: 2rem">Compra un nivel</h1>
        <p style="font-size: x-small; margin: 0rem;">cualquier nivel del curso</p>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <button class="btn main-btn btn-block" onclick="saveCart(<?= $curso['ID_curso'] ?>, true)" style="margin: 0.5rem; width: 70%; margin-bottom: 0rem;">Añadir al carrito</button>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-5">
        <button class="btn sub-btn btn-block" onclick="toPay(<?= $curso['ID_curso'] ?>, true)" style="margin: 0.5rem; width: 70%;">Comprar ahora</button>
    </div>
    <?php endif; ?>
</div>