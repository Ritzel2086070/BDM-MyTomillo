<?php
namespace Core\Middleware;

class Admin {
    public function handle() {
        if ($_SESSION['user']['rol'] !== 'admin') {
            header('location: /');
            exit();
        }
    }
}