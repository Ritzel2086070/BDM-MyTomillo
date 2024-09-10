<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>
<script src="pay.js" defer></script>
<body class="container-fluid background-gradient">
        <div class="row d-flex flex-row-reverse background-gradient">
            <div class="col-4 flex-column justify-content-end align-items-center">
                <div class="card" style="position: absolute; top: 7.8rem; right: 5rem; height: min-content; width: 30rem; height: min-content;">
                    <form id="payment-form" style="width: 100%" class="p-4">
                        <div id="payment-element">
                          <!--Stripe.js injects the Payment Element-->
                        </div>
                        <button id="submit" class="btn main-btn btn-block mx-auto mb-3" style="font-size: large;">
                          <div class="spinner hidden" id="spinner"></div>
                          <span id="button-text">Pagar ahora</span>
                        </button>
                        <div id="payment-message" class="hidden"></div>
                    </form>
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
            <div class="col-12 col-md-7 col-lg-7" style="padding-left:3rem">

                <div class="levels-container d-flex flex-column mb-4" style="font-size: .8rem">
                    <div class="header p-3 row ">
                        
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

        
        
        <div class="row background-darkpurple d-flex flex-row-reverse">
            <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                <p class="footer">*All memberships will be billed automatically on a recurring basis until canceled. If eligible for a free trial, 
                    cancel before the trial ends to avoid being charged. Offer only valid for new paid subscribers. See full terms of 
                    service here.
                </p>
                <p class="footer">MyTomillo, Inc 2025</p>
            </div>
        </div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js.js"></script>
</html>