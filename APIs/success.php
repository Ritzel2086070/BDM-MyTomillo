<?php

require dirname(__DIR__, 1) . '/vendor/autoload.php';

require 'secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$paymentIntentId = $_GET['payment_intent'];
$paymentIntent = \Stripe\PaymentIntent::retrieve($paymentIntentId);

$selectedCourses = json_decode($paymentIntent->metadata->selected_courses, true);

error_log(json_encode($selectedCourses));

foreach ($selectedCourses as $course) {
    $bool = $course['porNivel'] == true ? 1 : 0;
    $db->query("CALL sp_buy_cursos(?, ?, ?, ?)", [
        $_SESSION['user']['id_rol'],
        $course['ID_curso'],
        $bool,
        $course['ID_nivel']
    ]);
}

$_SESSION['success'] = "Pago realizado exitosamente";
$_SESSION['delete_local'] = true;
header('Location: /dashboard');
exit;