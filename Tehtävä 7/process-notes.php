<?php
$tempDir = sys_get_temp_dir();
echo "Тимчасова директорія: " . $tempDir . PHP_EOL;

$testFile = $tempDir . '/notes.json';
$content = 'Hello, world!';

if (file_exists($testFile)) {
    echo 'Вміст файлу: ' . file_get_contents($testFile);
} else {
    echo 'Файл не знайдено.';
}
?>
