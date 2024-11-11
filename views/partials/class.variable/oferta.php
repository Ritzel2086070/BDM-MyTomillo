<div class="col-12 col-md-8 col-lg-8">
                <h6 style="padding-left:3rem">Descripción del curso</h6>
                <div class="class-description">
                    <?=$curso["descripcion"]?>
                </div>

                <h6 style="padding-left:3rem; margin-top: 1.7rem;">Aprenderás</h6>
                    <div class="list-container">
                        <ul>
                            <?php foreach($aprendizajes as $aprendizaje): ?>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(255, 255, 255)" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                    <?=$aprendizaje["aprendizaje"]?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        
                    </div>
                <h6 style="padding-left:2.5rem; margin-top: 1.7rem;">Contenido del curso</h6>
                <div class="levels-container d-flex flex-column">
                    <div class="header d-flex flex-wrap">
                        <p><?= $curso["n_niveles"] ?> Niveles | <?= $n_clases ?> Clases</p>
                    </div>
                    <?php foreach($niveles as $nivel): ?>
                        <button type="button" class="btn level" data-toggle="collapse" data-target="#level<?=$nivel["ID_nivel"]?>"><?=$nivel["titulo"]?></button>
                        <div id="level<?=$nivel["ID_nivel"]?>" class="collapse">
                            <?php foreach($clases as $clase): ?>
                                <?php if($clase["ID_nivel"] == $nivel["ID_nivel"]): ?>
                                    <p><strong>+</strong> <?=$clase["titulo"]?></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                    
                </div>
            </div>