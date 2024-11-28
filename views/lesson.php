<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>

<script src = "js/lesson.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        showLastLesson(<?= $ID_curso ?>);
    });
</script>
    
    <body class="container-fluid background-violet align-self-center">
        <div class="row background-violet" style="padding: 0rem;">
            <div class="col-8 background-grape">
                <div class="row">
                    <div class="video-content tab-content mt-4">
                    <video id="video" controls width="100%">
                        <source id="videoSource" type="video/mp4">
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
                            <h3 id="titulo"></h3>
                            <div id="descripcion" class="lesson-description">
                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="resources">
                            <h3>Aquí hay materiales adicionales sobre el tema</h3>
                            <div id="recursos_links" class="downloads">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 content d-flex flex-column">
                <h2 class="mt-5">Contenido del curso</h2>
                <div id="container" class="lessons d-flex flex-column bd-highlight mt-3 ">
                    <?php foreach ($niveles as $nivel): ?>
                            <div class="header p-0 bd-highlight">
                                <p class="p-2 bd-highlight">Nivel 1. <?= $nivel['titulo'] ?></p>
                            </div>
                            <div class="lesson">
                                <?php foreach ($clases as $clase): ?>
                                    <?php if ($clase['ID_nivel'] == $nivel['ID_nivel']): ?>
                                        <label onclick="showLesson( <?= $clase['ID_clase'] ?>, <?= $clase['ID_nivel'] ?>, <?= $ID_curso ?>)" class="d-flex p-2 bulgy-checkboxes justify-content-start align-items-center">
                                            <input disabled type="checkbox" name="options" id="<?= $clase['ID_clase'] ?>_<?= $clase['ID_nivel'] ?>"/>
                                            <span class="checkbox"></span>
                                            Clase: <?= $clase['titulo'] ?>
                                        </label>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php
                        endforeach; ?>
                </div>
            </div>
        </div>
        
<?php require 'partials/footer.php'; ?>