<?php

namespace Core\Middleware;

class Authenticated
{
    public function handle()
    {
        if (! $_SESSION['user'] ?? false) {
            $_SESSION['delete_local'] = true;
            header('location: /');
            exit();
        }
    }
}