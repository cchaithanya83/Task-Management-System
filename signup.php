<?php
    $conn = mysqli_connect("localhost", "root", "", "miniproject");

    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .box {
            width: 300px;
            padding: 20px;
            text-align: center;
            background-color: beige;
            color: #0a0707;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .box h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .box form {
            display: flex;
            flex-direction: column;
        }

        .box input {
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }

        .box input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        .box input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .box select{
            
            border-radius: 5px;
            border: none;
            padding: 10px;
        }
    </style>
</head>
<body background="images.jpeg">
    <div class="box">
        <h2>Sign Up</h2>
        <form method="post" action="">
            <input type="text" id="user_name" name="user_name" placeholder="Username" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
           <select name="Type" id="type" required>
            <option value="" selected disabled>Select user Type</option>
            <option value="user">user</option>
            <option value="admin">admin</option>
           </select>
           <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Type = $_POST['Type'];
    $sql = "INSERT INTO user (user_name, email, password, type) VALUES ('$user_name', '$email', '$password', '$Type')";

    if (mysqli_query($conn, $sql)) {
        if($Type=="user")
	{
		
		 header("location:user/index.php? varname=$user_name ");
	}
	elseif($Type=="admin")
	{
		 header("location:admin/index.php? varname=$user_name ");
	}
    } else {
        
    }
}

$conn->close();
?>