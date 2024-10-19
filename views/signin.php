<?php require 'partials/head.php'?>

    <body class="container-fluid background-gradient align-self-center">
        <div class="row background-gradient-grey">
            <div class="col-5 d-flex flex-row-reverse">
                <div class="card p-4">
                    <form action="/signin" method="POST" onsubmit="return register()" enctype="multipart/form-data">
                        <div class="text-center mb-4">
                            <img src="images/LogoBDM.png" alt="Logo My Tomillo" class="mb-2" style="width: 30%;">
                            <p style="font-size: small;">Regístrate</p>
                        </div>
                        <div class="d-flex flex-column justify-content-end align-items-center">
                        <span class="signin-image" style="margin: 0rem;">
                            <img id="profileImage" src="images/tomilloprofile.png" alt="Foto de perfil" style="width: 100px; height: 100px; object-fit: cover;">
                        </span>
                            <input type="file" name="file" id="file" class="inputfile" accept="image/*" onchange="updateImage(event)">
                            <label class="label-file" for="file" style="height: 1.7rem; margin-bottom: 1rem;"></label>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <input type="text" class="form-control" name="inputNombres" id="inputNombres" placeholder="Ingrese nombre(s)">
                        </div>
                        <div class="form-row">
                            <div class="col d-flex justify-content-end">
                                <input type="text" class="form-control" name="inputApellidoPaterno" id="inputApellidoPaterno" placeholder="Apellido Paterno">
                            </div>
                            <div class="col d-flex justify-content-start">
                                <input type="text" class="form-control" name="inputApellidoMaterno" id="inputApellidoMaterno" placeholder="Apellido Materno">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col d-flex flex-column align-items-end">
                                <label for="form-control" class="label-form-control">Seleccione género:</label>
                                <select class="form-select" name="selectGenero" id="selectGenero">
                                    <?php foreach($generos as $genero): ?>
                                        <option value="<?= htmlspecialchars($genero['ID_genero']) ?>"><?= htmlspecialchars($genero['genero']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col d-flex flex-column align-items-start">
                                <label for="form-control" class="label-form-control">Fecha de nacimiento:</label>
                                <input type="date" name="inputFecha" id="inputFecha" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-3 d-flex justify-content-center">
                            <input type="email" name="inputCorreo" id="inputCorreo" class="form-control" placeholder="Correo electrónico">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <input type="password" name="inputContra" id="inputContra" class="form-control" placeholder="Ingrese contraseña">
                        </div>
                        
                        <div class="bulgy-radios d-flex flex-column align-items-center" role="radiogroup">
                            <p style="font-size: small; margin-bottom: 0.1rem;">¿Qué deseas hacer en MyTomillo?</p>
                            <div class="col d-flex justify-content-center align-items-center">
                                <label class="d-flex justify-content-center align-items-center">
                                    <input type="radio" id="Aprender" value="estudiante" name="options" checked/>
                                    <span class="radio"></span>
                                    <span class="label">Aprender</span>
                                </label>
                                <label class="d-flex justify-content-center align-items-center">
                                    <input type="radio" id="Enseñar" value="maestro" name="options"/>
                                    <span class="radio"></span>
                                    <span class="label">Enseñar</span>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn main-btn btn-block mt-4">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3 d-flex flex-column justify-content-end">
                <h4>¡Bienvenido!</h4>
                <h3>Cursos</h3>
                <h2>Certificaciones</h2>
                <h1 style="margin-bottom: 1rem;">¡Y más!</h1>
            </div>
            <div class="col-4 d-flex flex-column justify-content-end">
                <img src="images/grupo.png" alt="MyTomillo Family" style="width: 45%; margin-top: 3rem;">
            </div>
        </div>
        <div class="row" style="padding: 0rem;">
            <div class="banner-img col-12 d-flex justify-content-between">
                <img src="images/1rv.jpg" alt="Realidad Virtual">
                <img src="images/2fk.jpg" alt="Ilustración">
                <img src="images/3conf.jpg" alt="Administración">
                <img src="images/4paint.jpg" alt="Pintura">
                <img src="images/5audio.jpg" alt="Ilustración">
                <img src="images/6guitar.jpg" alt="Ilustración">
            </div>
            
        </div>
        <div class="row d-flex flex-row-reverse">
            <div class="col-6">
                <img src="images/Group1.png" alt="Variedad de cursos" style="width: 55%; margin: 2rem;">
            </div>
        </div>
    </body>
</html>

