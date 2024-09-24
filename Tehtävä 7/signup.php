<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <h1>Sign up</h1>

        <form action="process-signup.php" method="post">
            <div class="input-box">
                <input type="text" id="name" name="username" placeholder="Name" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="email" id="email" name="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>

            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input-box">
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Repeat password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <?php if (isset($_SESSION['error1'])): ?>
                <p style="color: red;"><?php echo $_SESSION['error1']; ?></p>
                <?php unset($_SESSION['error1']); ?>
            <?php endif; ?>

            <button class="btn">Sign up</button>

            <div class="register-link">
                <p>Already have an account? <a href="index.php">Log in</a></p>
            </div>
        </form>
    </div>
</body>

</html>