<?php
// hw8.php - Handles serving the correct audio file from a query string

if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filepath = __DIR__ . '/' . $file;

    if (file_exists($filepath)) {
        header('Content-Type: audio/mpeg');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        http_response_code(404);
        echo "Audio file not found.";
        exit;
    }
}
?>
