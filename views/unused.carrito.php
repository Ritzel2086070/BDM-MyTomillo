<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>
    <body class="container-fluid background-gradient">
        <div class="row d-flex flex-row-reverse background-gradient">
            <div class="col-4 flex-column justify-content-end align-items-center">
                <div class="card flex-column d-flex justify-content-center" style="position: absolute; top: 7.8rem; right: 5rem; height: min-content; width: 22rem;">
                    
                    <div class="text-center mb-2 mt-4">
                        <p style="font-size: 1.2rem; margin: 0;">Total a pagar</p>
                        <h1 style="font-size: 1.4rem">$400.00 MXN</h1>
                    </div>
                    <div class="d-flex justify-content-center align-items-center my-2">
                        <button class="btn main-btn btn-block" onclick="toPay()" style="margin: 0.5rem; width: 70%; margin-top: 0rem;">Proceder al pago</button>
                    </div>
                    
                    
                   
                </div>
            </div>
            <div class="col-12 col-md-8 col-lg-8 flex-column justify-content-start align-items-center" style="padding: 2rem; padding-top: 6rem; padding-left: 5rem;">
                <a onclick="toLast()">
                    <h6>Regresar</h6>
                </a>
                <br>
                <h1>Bienvenido a tu carrito</h1>
                <p><strong>¿Listo para empezar un nuevo aprendizaje?</strong></p>
            </div>
        </div>

        <div class="row background-grape" style="padding: 1rem;">
            <div class="col-12 col-md-8 col-lg-8" style="padding-left:3rem">
                <a href="">
                    <p style="padding-left:1rem; font-size: .8rem;"><strong>Deseleccionar todo</strong></p>
                </a>
                
                <div class="levels-container d-flex flex-column mb-4" style="font-size: .8rem">
                    <div class="header p-3 row ">
                        <div class="col-auto d-flex p-0">
                            <label class="d-flex p-0 bulgy-checkboxes justify-content-center align-items-center">
                                <input type="checkbox" name="options" checked/>
                                <span class="checkbox"></span>
                            </label>
                        </div>
                        
                        <div class="col">
                            <h6 style="font-size: .7rem">Categoría</h6>
                            <h3>Aprende a crear tu sitio web desde cero con HTML y CSS</h3>
                            <p>Creado por Tulio Treviño</p>
                            <div class="star-container">
                                <img src="images/estrella.png" alt="estrella">
                                <img src="images/estrella.png" alt="estrella">
                                <img src="images/estrella.png" alt="estrella">
                                <img src="images/estrella.png" alt="estrella">
                                <img src="images/estrella.png" alt="estrella">
                            </div>
                            <p>(50 calificaciones)</p>
                        </div>
                    </div>
                    <div class="row pt-2 px-3">
                        <div class="col d-flex align-items-center">
                            <h5 style="font-size: .8rem">Nivel:</h5>
                            <form class="ml-2 dark">
                                <select class="form-select" style="width: 100%">
                                    <option selected>HTML</option>
                                    <option value="1">CSS, formato y diseño</option>
                                    <option value="2">JavaScript</option>
                                    <option value="3">Proyecto final y Hosting</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-auto">
                            <h5 style="font-size: .8rem">Costo: $400.00 MXN</h5>
                        </div>
                    </div>
                    
                </div>
                <div class="levels-container d-flex flex-column mb-4" style="font-size: .8rem">
                    <div class="header p-3 row ">
                        <div class="col-auto d-flex p-0">
                            <label class="d-flex p-0 bulgy-checkboxes justify-content-center align-items-center">
                                <input type="checkbox" name="options" checked/>
                                <span class="checkbox"></span>
                            </label>
                        </div>
                        
                        <div class="col">
                            <h6 style="font-size: .7rem">Categoría</h6>
                            <h3>Aprende a crear tu sitio web desde cero con HTML y CSS</h3>
                            <p>Creado por Tulio Treviño</p>
                            <div class="star-container">
                                <img src="images/estrella.png" alt="estrella">
                                <img src="images/estrella.png" alt="estrella">
                                <img src="images/estrella.png" alt="estrella">
                                <img src="images/estrella.png" alt="estrella">
                                <img src="images/estrella.png" alt="estrella">
                            </div>
                            <p>(50 calificaciones)</p>
                        </div>
                    </div>
                    <div class="row pt-2 px-3 d-flex justify-content-end">
                        <div class="col-auto ">
                            <h5 style="font-size: .8rem">Costo: $400.00 MXN</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
<?php require 'partials/footer.php'?>