<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>
<script src="js/pay.js" defer></script>
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
            <div id="container" class="col-12 col-md-7 col-lg-7" style="padding-left:3rem">
                
            </div>
        </div>
        
        <div class="row background-darkpurple d-flex flex-row-reverse">
            <div class="col-12 d-flex flex-column justify-content-center align-items-start">
                <p class="footer">Para acceder a los niveles, se requiere una compra mínima de $10.00 MXN. Los niveles gratuitos o de prueba no se otorgarán sin una compra realizada.
                </p>
                <p class="footer">MyTomillo, Inc 2025</p>
            </div>
        </div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js.js"></script>
</html>