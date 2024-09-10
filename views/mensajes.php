<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>
    
    <body class="container-fluid" style="display: flex; flex-direction: column; min-height: 100vh;">
        <div class="row background-gradient mt-5 pl-5 pt-5 pb-4">
            <h1>Mensajes</h1>
        </div>
        <div class="row" style="flex-grow: 1; height: 100%;">
            <div class="col-4 background-grape pt-3" style="padding: 2rem;">
                <div class="row">
                    <button class="btn sub-btn custom">Redactar nuevo mensaje</button>
                </div>
                <div class="row pt-3 pb-3">
                    <form class="dark input-group">
                        <button>
                            <img class="icon" src="images/buscar.png" alt="Logo">
                        </button>
                        <input type="text" class="form-control" placeholder="Buscar..." >
                    </form>
                </div>
                <div class="row align-items-center">
                    <div class="col-auto p-0">
                        <img class="profile" src="images/tomilloprofile.png" alt="Logo">
                    </div>
                    <div class="col">
                        <h5 class="p-0 pt-2 m-0">Heber Abiel Perez Jimenez</h5>
                        <p class="p-0 m-0">UwU soy Heber</p>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="green-line"></div>
                </div>
                <div class="row align-items-center">
                    <div class="col-auto p-0">
                        <img class="profile" src="images/tomilloprofile.png" alt="Logo">
                    </div>
                    <div class="col">
                        <h5 class="p-0 pt-2 m-0">Heber Abiel Perez Jimenez</h5>
                        <p class="p-0 m-0">UwU soy Heber</p>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="green-line"></div>
                </div>

            </div>
            <div class="col-8 background-violet pt-4 pb-3" style="display: flex; flex-direction: column; padding: 3rem;">
                <div class="row align-items-center">
                    <div class="col-auto p-0">
                        <img class="profile-head" src="images/tomilloprofile.png" alt="Logo">
                    </div>
                    <div class="col">
                        <h3>Heber Abiel Pérez Jiménez</h5>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="green-line"></div>
                </div>
                <div class="row chat-container" style="flex-grow: 1;">
                    <div class="col">
                        <div class="row pb-3 justify-content-start">
                            <div class="col-auto p-0">
                                <img class="profile-chat" src="images/tomilloprofile.png" alt="Logo">
                            </div>
                            <div class="col message-box pt-3 pl-3 pr-3 mx-2">
                                <h4>Heber Abiel Perez Jimenez</h4>
                                <h4>4:25 pm 09/02/2020</h4>
                                <p>
                                    Cuando me muera y me tengan que enterrar
                                    Quiero que sea con una de tus fotografías
                                    Para que no me de miedo estar abajo
                                    Para que no se me olvide como es tu cara
                                    Para imaginar que estoy contigo
                                    Y sentirme un poquito vivo
                                </p>
                            </div>
                        </div>
                        <div class="row pb-3 justify-content-end">
                            <div class="col message-box-inverse pt-3 pl-3 pr-3 mx-2">
                                <h4>Marla Judith Estrada Valdez</h4>
                                <h4>4:27 pm 09/02/2020</h4>
                                <p>
                                    Fan de caifanes spotted
                                </p>
                            </div>
                            <div class="col-auto p-0">
                                <img class="profile-chat" src="images/tomilloprofile.png" alt="Logo">
                            </div>
                        </div>
                    </div>
                </div>
                <form class="row message-box-input p-3">
                    <div class="col">
                        <h4>4:27 pm 09/02/2020</h4>
                        <textarea class="w-100" type="text" placeholder="Escribe un mensaje"></textarea>
                    </div>
                    <div class="col-auto p-0 d-flex align-items-center">
                        <button class="main-btn custom rounded-pill py-1 m-0">
                            <img class="icon" src="images/buscar.png" alt="" width="30px">
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </body>

</html>