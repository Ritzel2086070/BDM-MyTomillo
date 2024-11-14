<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Get the input data
$inputData = json_decode(file_get_contents('php://input'), true);
$ID_curso = $inputData['ID_curso'] ?? null;
$ID_nivel = $inputData['ID_nivel'] ?? null;
$ID_clase = $inputData['ID_clase'] ?? null;

// Retrieve the video from the database (this assumes the video is stored as a BLOB)
$video = $db->query("SELECT video FROM CLASES WHERE ID_curso = ? AND ID_nivel = ? AND ID_clase = ?", [
    $ID_curso,
    $ID_nivel,
    $ID_clase
])->find();

// If the video exists, stream it
if ($video) {
    // Set headers to stream the video (ensure correct content-type for MP4)
    header('Content-Type: video/mp4');
    header('Content-Length: ' . strlen($video['video']));  // Optional: Set the content length

    // Output the video content as a stream
    echo $video['video']; // Directly echo the binary data

    // Exit after sending the video
    exit;
} else {
    // Return a JSON error response if the video is not found
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Video not found']);
    exit;
}
