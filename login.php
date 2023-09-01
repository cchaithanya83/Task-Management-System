<?php
$conn = mysqli_connect("localhost", "root", "", "miniproject");
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
 $user_name="";          //user name from text box
 $password="";           //password from the text box
 $Passworddb="";        //password from db
 $type="";
 $temp=0;
 
 $user_name=$_POST['user_name'];
$password=$_POST['Password'];
  $query="select type, password from user where   user_name='$user_name'";
 $result=$conn->query($query);
while($row=mysqli_fetch_array($result))
{ 
	
	 $Passworddb=$row['password'];	
	 if($Passworddb == $password)
	 {
		$type=$row['type'];
		if($type== "user")
		  $temp=1;
		else
		  $temp=2;
	 }
}
	 
	if($temp=="1")
	{
		// echo "login succesfull";
		 header("location:user/index.php? varname=$user_name ");
	}
	elseif($temp==2)
	{
		// echo "login succesfull";
		 header("location:admin/index.php? varname=$user_name ");
	}
	else
	{
		echo "Invalid data";
		header("location:index.html");		
	
	}
