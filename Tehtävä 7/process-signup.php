<?php
session_start();

if (strlen($_POST["password"]) < 8) {
    $_SESSION['error1'] = 'Password must be at least 8 characters!';
    header('Location: signup.php');
    exit();
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    $_SESSION['error1'] = 'Password must contain at least one letter!';
    header('Location: signup.php');
    exit();
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    $_SESSION['error1'] = 'Password must contain at least one number!';
    header('Location: signup.php');
    exit();
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    $_SESSION['error1'] = 'Passwords must match!';
    header('Location: signup.php');
    exit();
}

$json_file = __DIR__ . "/users.json";

$users = [];
if (file_exists($json_file)) {
    $json_data = file_get_contents($json_file);
    if ($json_data !== false) {
        $users = json_decode($json_data, true);
    }
} else {
    echo "File doesn't exist.";
    exit();
}

foreach ($users as $user) {
    if ($user['username'] === $_POST["username"]) {
        $_SESSION['error1'] = 'Username already taken.';
        header('Location: signup.php');
        exit();
    }
}

$new_user = [
    "username" => $_POST["username"],
    "password" => $_POST["password"]
];

$users[] = $new_user;

if (file_put_contents($json_file, json_encode($users, JSON_PRETTY_PRINT)) === false) {
    echo "Failed to save user data.";
    exit();
}

header("Location: index.php");
exit;
?>
