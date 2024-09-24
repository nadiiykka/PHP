<?php
session_start();

$_SESSION['account'] = 'Your account!';
header('Location: welcome.php');
exit();

?>