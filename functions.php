<?php


function card_generator($name, $author, $price, $rating, $students) {
    ob_start(); // Start output buffering
    include 'views/partials/card.curso.php'; // Include the template file
    $card = ob_get_clean(); // Get the buffer contents
    return $card;
}
