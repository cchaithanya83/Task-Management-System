
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
        .message-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            border-color: black;
        }
        .message-box h4 {
            margin: 0;
            color: black;
        }
        .message-box span {
            font-size: 12px;
            color: #888;
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
    <font face="Harlow Solid Italic" size="10px" color="white">Welcom <?php echo $_GET['varname']; ?></font>
    <a href="index.php"><-back</a>

</div>
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
            
            $now = new DateTime();
            $string = $_POST['newtxt'];
            $username=$_GET['varname'];
            $txt = '<div class="message-box">';
            $txt .= '<h4>' . $string . '</h4>';
            $txt .= '<span>' . $username . ' - ' . $now->format('Y-m-d H:i:s') . '</span>';
            $txt .= '</div>';

            $text = $txt . $text;
            
		$handle=fopen($file,'w') or die("Cannot open file : $file");
		fwrite($handle,$text);
		fclose($handle);
        echo '<script>window.location.href = "chat.php?varname=' . $username . '";</script>';
        }

		?>
	</body>
</html>