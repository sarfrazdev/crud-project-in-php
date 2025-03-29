<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="style.css">
    <style>
      
    </style>
</head>
<body>
 <h1>CRUD Operations in PHP</h1>
    <div class="navbar">
    
        <a href="add.php">Add Record</a>
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

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <input type="submit" value="Sign Up" name="submit" class="submit-btn">
        </form>
    </div>

 

    <?php
    if (isset($_POST['submit'])) {
        $conn = mysqli_connect("localhost", "root", "", "crud");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (uid, name, email, password) VALUES ('$uid', '$name', '$email', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Record added successfully!</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }

        mysqli_close($conn);
    }
    ?>
   
    
</body>
</html>