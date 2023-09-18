<?php
    $conn = mysqli_connect("localhost", "root", "", "miniproject");

    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sql1 = "SELECT  * FROM user"; 
$result = $conn->query($sql1);

    $username = $_GET['varname'];
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
    <link rel="stylesheet" href="style.css">
    <style>
          body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image: url('../iii.jpeg'); /* Set the background image here */
    background-size: cover; /* Ensure the image covers the entire body */
    background-repeat: no-repeat; /* Prevent image repetition */
    background-attachment: fixed; /* Fix the image in place */
}

        .topnav {
            background-color: #333;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .topnav a:hover {
            background-color: #4c704c;
            color: #fff;
            border-radius: 2px;
            padding: 5px;
        }

        .hehe{
            margin-top: 100px;
        }
        h1 {
            margin-top: 20px;
            text-align: center;
            color:#444;
        }

        .back {
            margin-left: auto;
            background-color: transparent;
    color: #fff;
        }

        form {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        input[type="number"],
        select {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="topnav">
    
<a href="viewtask.php?varname=<?php echo $_GET['varname'] ?>">View Tasks</a>
<a href="ticket.php?varname=<?php echo $_GET['varname'] ?>">View Ticket</a>
<a href="../chat.php?varname=<?php echo $_GET['varname'] ?>">Chat Box</a>
<button id="backButton" class="back">Back</button>
<script>
        var backButton = document.getElementById('backButton');
        backButton.addEventListener('click', function() {
            window.history.back();
        });
    </script>
</div>

<h1>Create Task</h1>
<div class="hehe">
<form method="POST">
    <label>User Name:
        <select name="user_name">
            <option value="" selected disabled>Select User Name</option>
            <?php
            while ($row = $result->fetch_assoc()) {
                if($row['type']=='user'){
                echo '<option value="' . $row['user_name'] . '">' . $row['user_name'] . '</option>';
            }
            }
            ?>
        </select>
    </label>
    <label>Email:
        <input type="email" name="email" required>
    </label>

    <label>Task Description:
        <textarea name="task_description" required></textarea>
    </label>
    <label>Progress:
        <input type="number" name="progress" required>
    </label>
    <input type="submit" value="Create Task">
</form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];

    $task_description = $_POST['task_description'];
    $progress = $_POST['progress'];

    $sql = "INSERT INTO task (user_name, Email, task, progress) VALUES ('$user_name', '$email','$task_description', $progress)";
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