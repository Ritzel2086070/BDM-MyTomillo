<?php require 'partials/head.php'?>
<?php require 'partials/nav.php'?>
<script src="cards.js" defer></script>
    
    <body class="container-fluid background-grape" style="display: flex; flex-direction: column; min-height: 100vh;">
        
    <?php
    switch ($rol) {
        case 'estudiante':
            require 'partials/profile/student.php';
            break;
        case 'maestro':
            require 'partials/profile/teacher.php';
            break;
        case 'admin':
            require 'partials/profile/admin.php';
            break;
    }
    ?>

    <?php require 'partials/footer.php'?>