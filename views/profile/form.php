<div class="form-group d-flex justify-content-center mt-3">
    <input style="width: 70%;" type="text" class="form-control" name="inputNombres" id="inputNombres" value="<?= htmlspecialchars($usuario['nombres']) ?>" readonly>
</div>
<div class="form-group d-flex justify-content-center mt-3">
    <div class="col d-flex justify-content-end">
        <input style="width: 71.5%;" type="text" class="form-control" name="inputApellidoPaterno" id="inputApellidoPaterno" value="<?= htmlspecialchars($usuario['apellido_paterno']) ?>" readonly>
    </div>
    <div class="col d-flex justify-content-start">
        <input style="width: 71.5%;" type="text" class="form-control" name="inputApellidoMaterno" id="inputApellidoMaterno" value="<?= htmlspecialchars($usuario['apellido_materno']) ?>" readonly>
    </div>
</div>
<div class="form-group d-flex justify-content-center mt-3">
    <div class="col d-flex flex-column align-items-end">
        <select class="select-profile" name="selectGenero" id="selectGenero" style="width: 71.5%;" disabled>
        <?php foreach($generos as $genero): ?>
            <option value="<?= htmlspecialchars($genero['ID_genero']) ?>"
            <?php if($genero['ID_genero'] == $usuario['ID_genero']) echo "selected"; ?>
            ><?= htmlspecialchars($genero['genero']) ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="col d-flex flex-column align-items-start">
        <input type="date" class="form-control" style="width: 71.5%;" name="inputFecha" id="inputFecha" value="<?= htmlspecialchars($usuario['f_nacimiento']) ?>" readonly>
    </div>
</div>
<h3>Información de contacto</h3>
<div class="form-group d-flex justify-content-center mt-3 mb-5">
    <input style="width: 70%;" type="text" class="form-control" name="inputCorreo" id="inputCorreo" value="<?= htmlspecialchars($usuario['correo']) ?>" readonly>
</div>