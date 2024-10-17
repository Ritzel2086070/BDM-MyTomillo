<?php

use Core\Response;

function dd($var)
{
    header("HTTP/1.0 500");
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

function view($path,$attributes = [])
{
    extract($attributes);
    require base_path('views/') . $path;
}

function card_generator($name, $author, $price, $rating, $students) {
    ob_start(); // Start output buffering
    include base_path('views/partials/card.curso.php'); // Include the template file
    $card = ob_get_clean(); // Get the buffer contents
    return $card;
}
