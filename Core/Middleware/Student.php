<?php
namespace Core\Middleware;

class Student {
    public function handle() {
        if ($_SESSION['user']['rol'] !== 'estudiante') {
            header('location: /');
            exit();
        }
    }
}