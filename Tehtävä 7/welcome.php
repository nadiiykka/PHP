<?php

session_start();

$notesFile = sys_get_temp_dir() . '/notes.json';
$notes = [];

if (file_exists($notesFile)) {
    $notes = json_decode(file_get_contents($notesFile), true);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Notes</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container">
        <div class="left_Side">
            <h1>Note!</h1><i class='bx bx-note'></i><br><br>
            <p>Add a note here.</p><br>
            <div class="form-container">
                <form action="process-notes.php" method="post" enctype="multipart/form-data">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required><br>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea><br>
                    <label for="img">Upload Picture:</label>
                    <input type="file" id="img" name="img" accept="image/*"><br>
                    <button type="submit" class="btn">Add a note</button>
                </form>
            </div>

            <div style='margin-bottom: 70px;'></div>
            <div class="form-container">
                <label for="title">Manage Notes:</label>
                <form action="delete-notes.php" method="post">
                    <button type="submit" name="delete_all"
                        onclick="return confirm('Are you sure you want to delete all notes?');">Delete All
                        Notes</button>
                </form>
            </div>
        </div>

        <div class="right_Side">
            <h1>Noteboard</h1>
            <form action="account.php" method="post">
                <button type="submit" name="account"><i class='bx bxs-user'></i></button>
            </form>

            <?php if (isset($_SESSION['accountVisible']) && $_SESSION['accountVisible']): ?>
                <div class="account">
                    <p>Welcome to your account!</p>
                    <a href="logout.php"><button onclick="return confirm('Are you sure you want to log out?');">Logout</button></a>
                </div>
            <?php endif; ?>
            <br>
            <?php if (empty($notes)): ?>
                <p>No notes available.</p>
            <?php else: ?>
                <div class="noteboard">
                    <?php foreach ($notes as $note): ?>
                        <div class="note_container">
                            <a><?php echo htmlspecialchars($note['title']); ?></a>
                            <?php if (!empty($note['img']) && file_exists($note['img'])): ?>
                                <img src="image.php?file=<?php echo urlencode(basename($note['img'])); ?>"
                                    alt="<?php echo htmlspecialchars($note['title']); ?>">
                            <?php else: ?>
                                <p class="noimage"></p>
                            <?php endif; ?>
                            <p><?php echo htmlspecialchars($note['description']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>