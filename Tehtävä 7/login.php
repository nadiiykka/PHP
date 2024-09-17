<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = json_decode(file_get_contents('users.json'), true);

    $isAuthenticated = false;
    foreach ($users as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $isAuthenticated = true;
            break;
        }
    }

    if ($isAuthenticated) {
        echo "Login successfully!";
    } else {
        echo "Wrong username or password!";
    }
}
?>
