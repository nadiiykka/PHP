<?php
session_start();

if (isset($_SESSION['accountVisible'])) {
    unset($_SESSION['accountVisible']);  
} else {
    $_SESSION['accountVisible'] = true;  
}

header('Location: welcome.php');
exit();
?>
