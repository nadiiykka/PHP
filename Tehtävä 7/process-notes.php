<?php

session_start();

$title = $_POST['title'];
$description = $_POST['description'];
$uploadedFilePath = '';
$bgcolor = $_POST['bgcolor'];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';

if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $tempDir = sys_get_temp_dir();
    
    $uploadedFilePath = $tempDir . '/' . uniqid() . '_' . basename($_FILES['img']['name']);
    
    $fileType = mime_content_type($_FILES['img']['tmp_name']);
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    
    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadedFilePath)) {
            echo 'Файл успішно завантажено та збережено у тимчасовій директорії: ' . $uploadedFilePath;
        } else {
            echo 'Не вдалося завантажити файл.';
        }
    } else {
        echo 'Недопустимий формат файлу.';
        $uploadedFilePath = '';
    }
} else {
    echo 'Файл не завантажено або сталася помилка.';
}

$notesFile = sys_get_temp_dir() . '/notes.json';
$notes = [];

if (file_exists($notesFile)) {
    $notes = json_decode(file_get_contents($notesFile), true);
}

$newNote = [
    'title' => $title,
    'description' => $description,
    'img' => $uploadedFilePath,
    'username' => $username,
    'bgcolor' => $bgcolor
];

$notes[] = $newNote;

if (file_put_contents($notesFile, json_encode($notes)) === false) {
    echo 'Не вдалося зберегти замітки у файл.';
    exit();
}

header('Location: welcome.php');
exit();
?>
