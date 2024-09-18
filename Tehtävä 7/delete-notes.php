<?php

if (isset($_POST['delete_all'])) {
    $tempDir = sys_get_temp_dir();
    $notesFile = $tempDir . '/notes.json';
    
    if (file_exists($notesFile)) {
        if (unlink($notesFile)) {
            echo 'Файл з нотатками успішно видалено.<br>';
        } else {
            echo 'Не вдалося видалити файл з нотатками.<br>';
        }
    } else {
        echo 'Файл з нотатками не знайдено.<br>';
    }
    
    $files = glob($tempDir . '/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            if (unlink($file)) {
                echo 'Файл ' . basename($file) . ' успішно видалено.<br>';
            } else {
                echo 'Не вдалося видалити файл ' . basename($file) . '.<br>';
            }
        }
    }
    
    header('Location: welcome.php');
    exit();
} else {
    echo 'Запит на видалення не отримано.';
}

?>
