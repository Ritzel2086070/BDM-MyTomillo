<?php
namespace Core\Middleware;

class Admin {
    public function handle() {
        if ($_SESSION['user_role'] !== 'admin') {
            header('location: /');
            exit();
        }
    }
}