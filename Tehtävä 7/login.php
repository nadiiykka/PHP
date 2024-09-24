<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $fileContent = file_get_contents('users.json');
    if ($fileContent === false) {
        echo "Failed to read user data file.";
        exit();
    }

    $users = json_decode($fileContent, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo 'Failed to decode user data: ' . json_last_error_msg();
        exit();
    }

    $isAuthenticated = false;
    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $isAuthenticated = true;
            break;
        }
    }

    if ($isAuthenticated) {
        session_regenerate_id();
        header("Location: welcome.php");
        exit();
    } else {
        $_SESSION['error'] = 'Wrong username or password!';
        header('Location: index.php');
        exit();
    }
}
?>
