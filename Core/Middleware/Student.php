<?php
namespace Core\Middleware;

class Admin {
    public function handle() {
        if ($_SESSION['user_role'] !== 'student') {
            header('location: /');
            exit();
        }
    }
}