<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>CRUD Operations in PHP</h1>
    <div class="navbar">
      
        <a href="index.php">Add Record</a>
        <a href="find.php">Find Record</a>
        <a href="update.php">Update Record</a>
        <a href="delete.php">Delete Record</a>
        <a href="view.php">View Records</a>
      
    </div>
    <h1>Update Record</h1>
    <form method="post">
        <label>Uid:</label>
        <input type="text" name="uid" required><br><br>

        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <button type="submit" name="update">Update</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $conn = mysqli_connect("localhost", "root", "", "crud");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        $sql = "UPDATE users SET name='$name', email='$email' WHERE uid='$uid'";

        if (mysqli_query($conn, $sql)) {
            echo mysqli_affected_rows($conn) > 0 ? "<p>Record updated!</p>" : "<p>No record found.</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }

        mysqli_close($conn);
    }
    ?>
</body>
</html>
