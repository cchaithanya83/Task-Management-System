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
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('../images\ \(1\).jpeg'); /* Set the background image here */
            background-size: cover; /* Ensure the image covers the entire body */
            background-repeat: no-repeat; /* Prevent image repetition */
            background-attachment: fixed;
        }
        
        .topnav {
            background-color: #333;
            overflow: hidden;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .org {
            font-family: 'Harlow Solid Italic', sans-serif;
            font-size: 24px;
        }
        
        .topnav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        .topnav a:hover{
            background-color: #4c704c;
            color: #fff;
            border-radius: 2px;
            padding: 5px;;
        }
        
        .dashboard {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            margin: 20px;
            min-height: 60vh;
            float: left;
        }
        
        .dashboard h2 {
            font-size: 24px;
        }
        
        .dashboard ul {
            list-style-type: none;
            padding: 0;
        }
        
        .dashboard li {
            margin-bottom: 10px;
        }
        
        .dashboard a {
            text-decoration: none;
            color: #007bff;
        }
        
        .dashboard a:hover{
            background-color: #bfd9ff;
            color:#333;
            padding: 2px;
            border-radius: 2px;
        }
        .content {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            overflow: auto;
        }
        
        .task {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1{
            text-align: center;
        }

        .back {
            margin-left: auto;
            background-color: transparent;
             color: #fff;
        }

    </style>
</head>

<body>
<div class="topnav">

<a href="create_ticket.php?varname=<?php echo $var_value ?>">Raise a Ticket</a>
    <br>
    <br>
    <a href="ticket.php?varname=<?php echo $var_value ?>">View a Ticket</a>
    <br>
    <br>
    <a href="../chat.php?varname=<?php echo $var_value ?>">Chat Box</a> 
    <div class="back">   
    <button id="backButton" class="back">Back</button>
<script>
        var backButton = document.getElementById('backButton');
        backButton.addEventListener('click', function() {
            window.history.back();
        });
    </script>
    </div>
</div>
<h1><span class="org">Welcome <?php echo $var_value ?></span></h1>
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
    
</div>

<div class="content">
    <?php
    $result->data_seek(0); // Reset the result set pointer
    while ($rows = $result->fetch_assoc()) {
        if ($rows['user_name'] == $var_value) {
            echo '<div class="task" id="task_' . $rows['id'] . '">';
            echo '<h3>Task: ' . $rows['task'] . '</h3>';
            echo '<p>Email: ' . $rows['Email'] . '</p>';
            echo '<p>Progress: ' . $rows['progress'] . '</p>';
            echo '</div>';
        }
    }
    ?>
</div>

</body>
</html>

