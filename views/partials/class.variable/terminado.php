<script src="js/comment.js"></script>
<div class="d-flex bd-highlight align-items-center">
    <div class="p-0 bd-highlight">
        <button type="button" class="profile d-flex justify-content-center align-items-center">
            <img src="images/tomilloprofile.png" alt="Logo">
        </button>
    </div>
    <div class="p-0 bd-highlight">
        <p style="margin: 0rem;"><?= $usuario["nombres"] . " " . $usuario["apellido_paterno"] . " " . $usuario["apellido_materno"] ?></p>
        <div class="d-flex align-items-center">
            <div class="star-container d-flex align-items-center" style="width: min-content">
                <img src="images/estrellaMala.png" alt="estrella" id="star1" data-star="1" class="star" style="width: 20px; height: 20px; margin: 0.15rem;">
                <img src="images/estrellaMala.png" alt="estrella" id="star2" data-star="2" class="star" style="width: 20px; height: 20px; margin: 0.15rem;">
                <img src="images/estrellaMala.png" alt="estrella" id="star3" data-star="3" class="star" style="width: 20px; height: 20px; margin: 0.15rem;">
                <img src="images/estrellaMala.png" alt="estrella" id="star4" data-star="4" class="star" style="width: 20px; height: 20px; margin: 0.15rem;">
                <img src="images/estrellaMala.png" alt="estrella" id="star5" data-star="5" class="star" style="width: 20px; height: 20px; margin: 0.15rem;">
            </div>
            <div class="d-flex align-items-center">
                <p class="experience">Califica tu experiencia</p>
            </div>
        </div>
    </div>
</div>
<textarea id="inputComment" class="mb-3" rows="6" cols="50" maxlength="9000" placeholder="Deja un comentario..."></textarea>
<button type="button" onclick="sendComment(<?= $curso['ID_curso'] ?>)" class="btn main-btn">Enviar</button>
