<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$ID_usuario = $_GET['id'] ?? null;

$imageData = $db->query("SELECT foto FROM USUARIOS WHERE ID_usuario = ?", [$ID_usuario])->find();

if ($imageData) {
    $imageBlob = $imageData['foto'];

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->buffer($imageBlob);

    header('Content-Type: ' . $mimeType);

    echo $imageBlob;
} else {
    abort(404);
}
