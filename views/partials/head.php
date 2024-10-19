<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyTomillo</title>
        <link rel="icon"  type="image/png" href="images/Logo.png">

        <!--Bootstrap-->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!--Style-->
        <link rel="stylesheet" href="Style.css">
        <!--Scripts-->
        <script src="js.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://js.stripe.com/v3/"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>


<script>
document.addEventListener('DOMContentLoaded', function() {
    <?php
    if ($_SESSION['errors'] ?? false) {
        $formattedErrors = nl2br($_SESSION['errors']);
        $safeErrors = json_encode($formattedErrors);
        echo "alertCustom($safeErrors);";
        $_SESSION['errors'] = null;
    }
    if ($_SESSION['success'] ?? false) {
        $formattedSuccess = nl2br($_SESSION['success']);
        $safeSuccess = json_encode($formattedSuccess);
        echo "alertSuccess($safeSuccess);";
        $_SESSION['success'] = null;
    }

    ?>
});
</script>
