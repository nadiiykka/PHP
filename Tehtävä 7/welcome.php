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
            <h1>Note!</h1><i class='bx bx-note' ></i><br>
            <p>Add a note here.</p><br>
            <div class="form-container">
                <form action="add_note.php" method="post" enctype="multipart/form-data">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required><br>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea><br>
                    <label for="file">Upload File:</label>
                    <input type="file" id="file" name="file"><br>
                    <button type="submit" class="btn">Add a note</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>