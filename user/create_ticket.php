
<!DOCTYPE html>
<html>
<head>
    <title>Create Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('../huhu.avif'); /* Set the background image here */
    background-size: cover; /* Ensure the image covers the entire body */
    background-repeat: no-repeat; /* Prevent image repetition */
    background-attachment: fixed;
        }

        .topnav {
            background-color: #333;
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

        .topnav a:hover {
            background-color: #4c704c;
            color: #fff;
            border-radius: 2px;
            padding: 5px;
        }

        .back {
            margin-left: auto;
            background-color: transparent;
            color: #fff;
        }

        /* Main content styles */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 10vw;
            border: 1px solid #ccc;
            border-radius: 15px;
            background-color: #fff;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body background="download.jpeg">
<div class="topnav">
<a href="ticket.php?varname=<?php echo $_GET['varname'] ?>">View Ticket</a>
<br>
<br>
<a href="index.php?varname=<?php echo $_GET['varname'] ?>">View Task</a>
<br>
<br>
<a href="../chat.php?varname=<?php echo $_GET['varname'] ?>">Chat Box</a> 
<button id="backButton" class="back">Back</button>
<script>
        var backButton = document.getElementById('backButton');
        backButton.addEventListener('click', function() {
            window.history.back();
        });
    </script>
</div>
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
