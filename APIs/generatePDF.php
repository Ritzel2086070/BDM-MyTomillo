<?php
require dirname(__DIR__, 1) . '/vendor/autoload.php';

// Retrieve JSON data from the request body
$input = file_get_contents('php://input');
$data = json_decode($input, true); // Decode JSON into an associative array

$estudiante = $data['estudiante'];
$maestro = $data['maestro'];
$curso = $data['curso'];
$fecha = $data['fecha'];
$ID_Curso = $data['idCurso'];
$ID_Estudiante = $data['idEstudiante'];

// Create a new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('MyApp');
$pdf->SetAuthor('MyApp');
$pdf->SetTitle('Sample PDF with Background');

// Add a page
$pdf->AddPage();

// Get page width and height
$pageWidth = $pdf->getPageWidth();
$pageHeight = $pdf->getPageHeight();

// Add background image
$imageFile = dirname(__DIR__) . '/APIs/diploma.jpg'; // Specify your background image path

$pdf->Image($imageFile, 0, 0, $pageWidth, "", '', '', '', false, 300, '', false, false, 0);

// Set font and write some text
$pdf->SetFont('Helvetica', '', 14);
$pdf->SetTextColor(0, 0, 0); // Set text color to black
$pdf->SetXY(25, 45); // Set position of the text
$pdf->Cell(130, 10, $estudiante, 0 /*border*/, 1, 'L');

//ANOTHER TEXT
$pdf->SetFont('Helvetica', '', 10);
$pdf->SetXY(20, 108); // Set position of the text
$pdf->Cell(53, 10, $maestro, 0 /*border*/, 1, 'C');

$pdf->SetXY(88, 108); // Set position of the text
$pdf->Cell(53, 10, 'Itzel Hernández', 0 /*border*/, 1, 'C');

$pdf->SetXY(38, 95); // Set position of the text
$pdf->Cell(100, 10, formatDate($fecha), 0 /*border*/, 1, 'L');

$pdf->SetFont('Helvetica', '', 14);
$pdf->SetXY(25, 61); // Set position of the text
$pdf->Cell(150, 10, $curso, 0 /*border*/, 1, 'L');

// Save the generated PDF to the server
$savePath = dirname(__DIR__) . '/public/diplomas/diploma_' . $ID_Curso . '_' . $ID_Estudiante . '.pdf'; // Create a unique file name based on the current timestamp

$pdf->Output($savePath, 'F'); // 'F' tells TCPDF to save the file to the server

echo json_encode([
    'status' => 'success',
    'file_path' => '/diplomas/' . basename($savePath) // Return the file path to the client
]);