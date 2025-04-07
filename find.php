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
    <div class="form-container">
        <form action="" method="post">
        <div class="form-group">
                <label for="uid">Uid:</label>
                <input type="text" name="uid" id="uid" required>
            </div>

            <input type="submit" value="Find Record" name="find" class="submit-btn">
        </form>
    </div>

    <?php
    if (isset($_POST['find'])) {
        $conn = mysqli_connect("localhost", "root", "", "crud");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $uid = mysqli_real_escape_string($conn, $_POST['uid']);

        $sql = "SELECT * FROM users WHERE uid = '$uid'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Uid:" .$row['uid'] . "</p>";
                echo "Name:". $row['name'] . "</p>";
                echo "Emai:" . $row['email'] . "</p>";
            }
        } else {
            echo "<p>No record found.</p>";
        }

        mysqli_close($conn);
    }
    ?>
</body>
</html>
