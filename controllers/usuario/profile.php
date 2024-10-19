<?php

if (isset($_SESSION['user'])) {
    if($_SESSION['user']['rol'] == 'estudiante') {
        header('Location: /profile-student');
    }
    if($_SESSION['user']['rol'] == 'maestro') {
        header('Location: /profile-teacher');
    }
    if($_SESSION['user']['rol'] == 'admin') {
        header('Location: /profile-admin');
    }
}