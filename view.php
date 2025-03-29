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
        <a href="add.php">Add Record</a>
        <a href="find.php">Find Record</a>
        <a href="update.php">Update Record</a>
        <a href="delete.php">Delete Record</a>
        <a href="view.php">View Records</a>
       
    </div>
    
   <?php


$conn = mysqli_connect("localhost", "root", "", "crud");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>Uid</th><th>Name</th><th>Email</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['uid'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}

mysqli_close($conn);
?>
   
   
   
    
</body>
</html>