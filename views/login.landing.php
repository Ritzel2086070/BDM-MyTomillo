
<?php require 'partials/head.php'?>

    <body class="container-fluid background-gradient align-self-center">
        <div class="row background-gradient-grey">
            <div class="col-5 d-flex flex-row-reverse">
                <div class="card p-4 d-flex justify-content-center" style="top: 5.5rem; left: 7rem; height: 27rem; width: 22rem;">
                    <form action="/login" method="POST" onsubmit="return login()">
                        <div class="text-center mb-4">
                            <img src="images/LogoBDM.png" alt="Logo My Tomillo" class="mb-2" style="width: 30%;">
                            <p style="font-size: small;">Inicia sesión o regístrate</p>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <input type="email" id="inputCorreo" name="inputCorreo" class="form-control" placeholder="Ingrese correo electrónico">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <input type="password" id="inputContra" name="inputContra" class="form-control" placeholder="Ingrese contraseña">
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn main-btn btn-block mt-3">Iniciar Sesión</button>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mb-1">
                            <div class="white-line"></div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn log-in btn-block mt-4" onclick="toSignIn()">Registrarse</button>
                    </div>
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
        <div class="row d-flex flex-row-reverse background-darkpurple">
            <div class="col-4 d-flex flex-column justify-content-center">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="rgb(93, 168, 78)" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <h5>Miles de cursos disponibles para ti</h5>
                </div>
                <div  class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="rgb(93, 168, 78)" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <h5>Profesores capacitados y certificados</h5>
                </div>
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="rgb(93, 168, 78)" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <h5>Aprendes a tu propio ritmo</h5>
                </div>
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="rgb(93, 168, 78)" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <h5>Diploma válido a nivel internacional</h5>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="green-circle d-flex justify-content-center align-items-center">
                        <span>96%</span>
                    </div>
                    <h3>Estudiantes satisfechos</h3>
                </div>
                <div class="d-flex align-items-center">
                    <div class="green-circle d-flex justify-content-center align-items-center">
                        <span>89%</span>
                    </div>
                    <h3>Tasa de finalización</h3>
                </div>
                <div class="d-flex align-items-center">
                    <div class="green-circle d-flex justify-content-center align-items-center">
                        <span>86%</span>
                    </div>
                    <h3>Porcentaje de empleabilidad</h3>
                </div>
            </div>
        </div>

        <div class="row background-grape d-flex flex-row-reverse">
            <div class="col-8 d-flex justify-content-center mb-5 mt-5">
                <div class="box-info d-flex flex-column">
                    <span class="number">200k+</span>
                    <span>clases</span>
                </div>
                <div class="box-info d-flex flex-column">
                    <span class="number">5k+</span>
                    <span>cursos</span>
                </div>
                <div class="box-info d-flex flex-column">
                    <span class="number">20k+</span>
                    <span>docentes</span>
                </div>
                <div class="box-info d-flex flex-column">
                    <span class="number">500k+</span>
                    <span>alumnos</span>
                </div>
            </div>
        </div>

        <div class="row background-violet d-flex flex-row-reverse">
            <div class="col-8 d-flex flex-column justify-content-center align-items-center">
                <h2 class="mt-4">Aprende de los mejores</h2>
                <img src="images/grupo2.png" alt="Variedad de cursos" style="width: 55%; margin: 2rem;">
            </div>
        </div>

        <div class="row background-darkpurple d-flex flex-row-reverse"  style="padding-bottom: 0rem;">
            <div class="col-8 d-flex flex-column justify-content-center align-items-center" style="padding-bottom: 0rem;">
                <div style="width: 75%; text-align: right; padding: 1rem;">
                    <h2 style="margin: 1rem;">Expande tu network</h2>
                    <p style="text-align: right;">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno 
                        estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido 
                        usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.
                    </p>
                    <div class="phd-login">
                        <img src="images/grupo3.png" alt="Variedad de cursos" style="width: 100%; margin-bottom: 0rem;">
                        <div class="top-right">¡Gana un diploma y <br> compartelo con tu network!</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row background-grape d-flex flex-row-reverse">
            <div class="col-8 d-flex flex-column justify-content-center align-items-center">
                <h2 style="margin: 1rem;">¿Por qué MyTomillo es tu mejor opción?</h2>
                <div style="width: 80%; text-align: right; padding: 1rem;">
                    <div class="box-review">
                        <h5>“MyTomillo es la mejor guía para la suite de Adobe que hemos encontrado”</h5>
                    </div>
                    <p>— John Warnock & Charles Geschke</p>
                </div>
                <div style="width: 80%; text-align: right; padding: 1rem;">
                    <div class="box-review">
                        <h5>“MyTomillo es la mejor guía para la suite de Adobe que hemos encontrado”</h5>
                    </div>
                    <p>— John Warnock & Charles Geschke</p>
                </div>
                <div style="width: 80%; text-align: right; padding: 1rem;">
                    <div class="box-review">
                        <h5>“MyTomillo es la mejor guía para la suite de Adobe que hemos encontrado”</h5>
                    </div>
                    <p>— John Warnock & Charles Geschke</p>
                </div>
            </div>
        </div>

        <div class="row background-violet d-flex flex-row-reverse">
            <div class="col-8 d-flex flex-column justify-content-center align-items-center">
                <div style="width: 80%; text-align: right; padding: 2.5rem;">
                    <h2>Patrocinados por:</h2>
                    <br>
                    <img src="images/microsoft.png" alt="Variedad de cursos" style="width: 30%; margin: 0.5rem;">
                    <img src="images/disney.png" alt="Variedad de cursos" style="width: 20%; margin: 0.5rem;">
                    <img src="images/we.png" alt="Variedad de cursos" style="width: 20%; margin: 0.5rem;">
                    <br>
                    <img src="images/masterchef.png" alt="Variedad de cursos" style="width: 25%; margin: 0.2rem;">
                    <img src="images/TNYT.png" alt="Variedad de cursos" style="width: 55%; margin: 0.2rem;">
                    <br>
                    <img src="images/si.png" alt="Variedad de cursos" style="width: 35%; margin-top: 1.5rem;">
                    <img src="images/tdb.png" alt="Variedad de cursos" style="width: 50%; margin: 0.1rem;">
                </div>
            </div>
        </div>

<?php require 'partials/footer.php'?>