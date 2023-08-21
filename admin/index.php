<?php
$conn = mysqli_connect("localhost", "root", "", "miniproject");
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql1 = "SELECT  user_name FROM user"; 
$result = $conn->query($sql1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>

</head>
<body>
<div class="topnav">
    <font face="Harlow Solid Italic" size="10px" color="black">Welcom <?php echo $_GET['varname']; ?></font>
    <a href="../index.html"><-back</a>

</div>
<a href="ticket.php?varname=<?php  echo $_GET['varname']?>">view ticket</a>
<a  href="../chat.php?varname=<?php  echo $_GET['varname']?>"  >Chat BOx</a>
<h1>Create Task</h1>
<form method="POST">
    <label>User Name: <select name=" user_name">
        <option value="" selected disabled > Select User name </option>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['user_name'] . '">' . $row['user_name'] . '</option>';
            }
            ?>
        </select></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Task Description: <textarea name="task_description" required></textarea></label><br>
    <label>Progress: <input type="number" name="progress" required></label><br>
    <input type="submit" value="Create Task">
</form>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $task_description = $_POST['task_description'];
    $progress = $_POST['progress'];

    $sql = "INSERT INTO task (user_name, Email, task, progress) VALUES ('$user_name', '$email', '$task_description', $progress)";
    if (mysqli_query($conn, $sql)) {
        echo "<p>Task created successfully.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
$conn->close();
?>
</body>
</html>
