<?php
$conn = mysqli_connect("localhost", "root", "", "miniproject");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM task ORDER BY user_name ASC ";
$result = $conn->query($sql);
$var_value = $_GET['varname'];

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Task</title>
</head>

<body>
<div class="topnav">
    <font face="Harlow Solid Italic" size="10px" color="white" class="org">Welcome <?php echo $var_value ?></font>
    <a href="../index.html"><-back</a>
</div>

<div class="dashboard">
    <h2>Dashboard</h2>
    <ul>
        <?php
        while ($rows = $result->fetch_assoc()) {
			if ($rows['user_name'] == $var_value) {
            echo '<li><a href="#task_' . $rows['id'] . '">' . $rows['task'] . '</a></li>';
			}
        }
        ?>
    </ul>
    <a  href="create_ticket.php?varname=<?php  echo $var_value?>"  >Raise a Ticket</a>
	<a  href="ticket.php?varname=<?php  echo $var_value?>"  >View a Ticket</a>
	<a  href="../chat.php?varname=<?php  echo $var_value?>"  >Chat BOx</a>
</div>

<div class="content">
    <?php
    $result->data_seek(0); // Reset the result set pointer
    while ($rows = $result->fetch_assoc()) {
        if ($rows['user_name'] == $var_value) {
            echo '<div class="task" id="task_' . $rows['id'] . '">';
            echo '<h3>' . $rows['user_name'] . '</h3>';
            echo '<p>Email: ' . $rows['Email'] . '</p>';
            echo '<p>Phone: ' . $rows['Phone'] . '</p>';
            echo '<p>Task: ' . $rows['task'] . '</p>';
            echo '<p>Progress: ' . $rows['progress'] . '</p>';
            echo '</div>';
        }
    }
    ?>
</div>

</body>
</html>
