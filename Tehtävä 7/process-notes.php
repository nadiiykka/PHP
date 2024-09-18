<?php

$title = $_POST['title'];
$description = $_POST['description'];
$uploadedFilePath = '';

if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
    $tempDir = sys_get_temp_dir();
    $uploadedFilePath = $tempDir . '/' . basename($_FILES['img']['name']);
    
    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadedFilePath)) {
        echo 'Файл успішно завантажено та збережено у тимчасовій директорії: ' . $uploadedFilePath;
    } else {
        echo 'Не вдалося завантажити файл.';
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
    'img' => $uploadedFilePath
];

$notes[] = $newNote;

if (file_put_contents($notesFile, json_encode($notes)) === false) {
    echo 'Не вдалося зберегти замітки у файл.';
    exit();
}

header('Location: welcome.php');
exit();

?>