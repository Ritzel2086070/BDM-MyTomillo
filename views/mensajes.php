<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>

<script src="js/mensajes.js"></script>
    
    <body class="container-fluid" style="display: flex; flex-direction: column; min-height: 100vh;">
        <div class="row background-gradient mt-5 pl-5 pt-5 pb-4">
            <h1>Mensajes</h1>
        </div>
        <div class="row" style="flex-grow: 1; height: 100%;">
            <div class="col-4 background-grape pt-3" style="padding: 2rem;">
                <div class="row">
                    <button onclick="BuscarDestinatario()" class="btn sub-btn custom">Redactar nuevo mensaje</button>
                </div>
                <div class="row pt-3 pb-3">
                    <form class="dark input-group">
                        <input type="text" class="form-control" id="searchInput" oninput="filterUsers()" placeholder="Buscar..." >
                    </form>
                </div>
                
                <div id="dmsList">
                </div>

            </div>
            <div class="col-8 background-violet pt-4 pb-3" style="display: flex; flex-direction: column; padding: 3rem;">
                <div class="row align-items-center">
                    <div class="col-auto p-0">
                        <img 
                            id="destinatarioFoto"
                            class="profile-head" 
                            src="images/tomilloprofile.png" 
                            alt="Logo" 
                            onerror="this.src='/images/tomilloprofile.png';"
                        >
                    </div>
                    <div class="col">
                        <h3 id="destinatarioName"></h5>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="green-line"></div>
                </div>
                <div class="row chat-container" style="flex-grow: 1;">
                    <div class="col" id="chatMessages">
                        
                    </div>
                </div>
                <form onsubmit="return sendMessage()" class="row message-box-input p-3">
                    <div class="col">
                        <input type="hidden" id="chatID">
                        <input type="hidden" id="destinatarioID">
                        <textarea id="textareaMensaje" class="w-100" type="text" placeholder="Escribe un mensaje"></textarea>
                    </div>
                    <div class="col-auto p-0 d-flex align-items-center">
                        <button class="main-btn custom rounded-pill py-1 m-0">
                            <img class="icon" src="images/paper.png" alt="" width="30px">
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </body>

</html>