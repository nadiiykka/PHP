<?php
$username = $_POST["username"] ?? 0;
$password = $_POST["password"] ?? 0;
$name = $_POST["name"] ?? 0;
if  ( $username ==  "username" && $password == "password")  {
    echo  "Hi, " . $name;
} else {
    echo "Wrong username or password.";
}
?>