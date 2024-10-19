<?php
namespace Core\Middleware;

class Teacher {
    public function handle() {
        if ($_SESSION['user']['rol'] !== 'maestro') {
            header('location: /');
            exit();
        }
    }
}