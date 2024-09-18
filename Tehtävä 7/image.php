<?php
$file = $_GET['file'];
$tempDir = sys_get_temp_dir();
$filePath = $tempDir . '/' . basename($file);

if (file_exists($filePath)) {
    header('Content-Type: ' . mime_content_type($filePath));
    readfile($filePath);
    exit();
} else {
    http_response_code(404);
    echo 'File not found.';
    exit();
}
?>
