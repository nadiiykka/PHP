<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$json_file = __DIR__ . "/users.json";

if (file_exists($json_file)) {
    $json_data = file_get_contents($json_file);
    $users = json_decode($json_data, true);
} else {
    $users = [];
}

foreach ($users as $user) {
    if ($user['email'] === $_POST["email"]) {
        die("Email already taken");
    }
}

$new_user = [
    "name" => $_POST["name"],
    "email" => $_POST["email"],
    "password_hash" => $password_hash
];

$users[] = $new_user;

file_put_contents($json_file, json_encode($users, JSON_PRETTY_PRINT));

header("Location: signup-success.html");
exit;

?>
