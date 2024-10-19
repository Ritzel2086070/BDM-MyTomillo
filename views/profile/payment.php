<div class="row p-5" style="width: 100%;">
    <h2 style="width: 100%;">Tarjetas y cuentas</h2>
    <div class="col-6">
        <div id="saved-cards"></div>

        <div class="cards-container my-3 mx-0 px-3">
            
            <!-- Card Number -->
            <div class="form-group">
                <label for="card-number-element">Card Number</label>
                <div id="card-number-element"></div> <!-- Stripe Card Number Element -->
            </div>
            <div class="row">
                <div class="col-6">
                    <!-- Expiry Date -->
                    <div class="form-group">
                        <label for="card-expiry-element">Expiry Date</label>
                        <div id="card-expiry-element"></div> <!-- Stripe Expiry Date Element -->
                    </div>
                </div>
                <div class="col-6">
                    <!-- CVC -->
                    <div class="form-group">
                        <label for="card-cvc-element">CVC</label>
                        <div id="card-cvc-element"></div> <!-- Stripe CVC Element -->
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center align-items-center">
                <button id="save-card-button" class="sub-btn custom" style="margin: 0rem; margin-bottom: 0.5rem;">Agregar método de pago</button>
            </div>
        </div>
        
        
    </div>
    <div class="col-6">
        <div id="selected-card" class="cards-container my-3" style="display: none; border-color: white;">
            <div class="img-container" style="width: 30%; height: auto; background-color: #062872; border-radius: 10px; padding: 10px; margin: 10px;">
                <img id="img-card" src="" style="width: 100%; height: 80px; object-fit: contain;">
            </div>
            <p  id="card-last-num" style="margin: 10px; width: 50%;"></p>
        </div>
    </div>
</div>