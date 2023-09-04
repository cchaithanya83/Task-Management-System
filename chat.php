<?php $conn = mysqli_connect("localhost", "root", "", "miniproject");
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}?>
<html>
	<head>
		<title>chat</title>
        <style>
            .topnav {
            background-color: #333;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
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
        body {
            font-family: Arial, sans-serif;
            background-color: #d9e8ff;
            margin: 0;
            padding: 20px;
        }
        .message-user {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            border-color: black;
            text-align: right;
            background-color: #a9e8ea;
        }
        .message-user h4 {
            margin: 0;
            color: black;
        }
        .message-user span {
            font-size: 12px;
            color: #888;
        }
        .message-admin {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            border-color: black;
            background-color: #a9d8ea;
        }
        .message-admin h4 {
            margin: 0;
            color: black;
        }
        .message-admin span {
            font-size: 12px;
            color: #888;
        }
        .back{
            margin-left: 60vw;
            background-color: transparent;
            color: #fff;
        }
        

    </style>
    <script>
        var shouldReload = true;
    function noreload(){
        shouldReload = false;
     }
     function reload(){
        shouldReload = true;
     }
     function checkReload() {
            if (shouldReload) {
                location.reload();
            }
        }

        setInterval(checkReload, 1000);
      </script>
	</head>
	<body>
    <div class="topnav">
    <img src="123.png" width="15%" height="10%">
    <button id="backButton" class="back">Back</button>
<script>
        var backButton = document.getElementById('backButton');
        backButton.addEventListener('click', function() {
            window.history.back();
        });
    </script>

</div>
<font face="Harlow Solid Italic" size="10px" color="black">WELCOME <?php echo $_GET['varname']; ?></font>
		<form method="POST">
            <input type="text" name="newtxt" onfocus="noreload()" blur="reload()">
            <input type="submit" value="Send">
        </form>
        
		<?php
		$file="chat.txt";
		$handle=fopen($file,'r') or die("Cannot open file : $file");
		$text=fread($handle,filesize($file));
		fclose($handle);
        echo "$text";
    
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_name=$_GET['varname'];
        $query="select type from user where   user_name='$user_name'";
        $result=$conn->query($query);
        $row=mysqli_fetch_array($result);
        $type=$row['type'];
        if ($type == "user")
        {
            $now = new DateTime();
            $string = $_POST['newtxt'];
            $username=$_GET['varname'];
            $txt = '<div class="message-user">';
            $txt .= '<h4>' . $string . '</h4>';
            $txt .= '<span>' . $username . ' - ' . $now->format('Y-m-d H:i:s') . '</span>';
            $txt .= '</div>';

            $text = $txt . $text;
        }   
        else
        {
            $now = new DateTime();
            $string = $_POST['newtxt'];
            $username=$_GET['varname'];
            $txt = '<div class="message-admin">';
            $txt .= '<h4>' . $string . '</h4>';
            $txt .= '<span>' . $username . ' - ' . $now->format('Y-m-d H:i:s') . '</span>';
            $txt .= '</div>';

            $text = $txt . $text;
        }         
            
		$handle=fopen($file,'w') or die("Cannot open file : $file");
		fwrite($handle,$text);
		fclose($handle);
        echo '<script>window.location.href = "chat.php?varname=' . $username . '";</script>';
        }

		?>
	</body>
</html>