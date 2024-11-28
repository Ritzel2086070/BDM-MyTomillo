<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$inputData = json_decode(file_get_contents('php://input'), true);
$ID_recurso = $inputData['ID_recurso'] ?? null;

$recurso = $db->query("SELECT archivo, tipo FROM RECURSOS WHERE ID_recurso = ?", [
    $ID_recurso
])->find();

if ($recurso) {
    $mimeToExtension = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'application/pdf' => 'pdf',
        'image/gif' => 'gif',
        'text/plain' => 'txt',
        'application/msword' => 'doc',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
        'application/vnd.ms-excel' => 'xls',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
        'application/zip' => 'zip',
        'application/x-rar-compressed' => 'rar',
        'video/mp4' => 'mp4',
        'audio/mpeg' => 'mp3',
        'application/vnd.ms-powerpoint' => 'ppt',
        'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
        'application/octet-stream' => 'mp4',
    ];

    $mimeType = $recurso['tipo'];
    $extension = $mimeToExtension[$mimeType] ?? 'bin'; 

    //header('Content-Type: application/json');
    //echo json_encode([
      //  'size' => mb_strlen($recurso['archivo'], '8bit'),
        //'type' => $mimeType
    //]);
    //exit;


    

    header('Content-Type: ' . $mimeType);
    header('Content-Disposition: attachment; filename="downloaded_file.' . $extension . '"');
    header('Content-Length: ' . mb_strlen($recurso['archivo'], '8bit'));

    echo $recurso['archivo'];
    exit;
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'File not found']);
    exit;
}