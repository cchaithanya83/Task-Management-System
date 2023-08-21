
<!DOCTYPE html>
<html>
<head>
    <title>Create Ticket</title>
</head>
<body>
    <h1>Create Ticket</h1>
    <form method="POST" action="">
        <label>Title: <input type="text" name="title" required></label><br>
        <label>Description: <textarea name="description" required></textarea></label><br>
        <input type="submit" value="Create Ticket">
    </form>
    <?php
$conn = mysqli_connect("localhost", "root", "", "miniproject");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$username = $_GET['varname'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $status="open";

    $sql = "INSERT INTO tickets (title, description, status, username) VALUES ('$title', '$description', '$status','$username')";
    if (mysqli_query($conn, $sql)) {
        echo "<p>Ticket Raised successfully.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
$conn->close();
?>
</body>
</html>
