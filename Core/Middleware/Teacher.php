<?php
namespace Core\Middleware;

class Admin {
    public function handle() {
        if ($_SESSION['user_role'] !== 'teacher') {
            header('location: /');
            exit();
        }
    }
}