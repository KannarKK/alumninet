<?php	
require 'core.php';
require 'connect.php';
//session_start();
if(loggedin())
{ 
   if( isset($_POST["password"]) &&!empty($_POST["password"]) &&
	isset($_POST["password_rep"]) &&!empty($_POST["password_rep"]) &&
	isset($_POST["fname"]) &&!empty($_POST["fname"]) &&
	isset($_POST["lname"]) &&!empty($_POST["lname"])&&
	isset($_POST["phone"]) &&!empty($_POST["phone"]))
	{
	$username= '';
	$fname= $_POST["fname"];
	$lname =$_POST["lname"];
	$password=$_POST["password"];
	$password_again= $_POST["password_rep"];
    $phone_no=  $_POST["phone"];
	
	if($password !=$password_again)
		echo "Passwords do not match";
	else if(strlen($password)<=3) echo "Password length should be atleast 4";
	 else 
		{
		
		$ID = getfield('ID');
		$query = "UPDATE `userinfo` SET `Fname`='$fname',`Lname`='$lname',`Phoneno`='$phone_no' WHERE `ID`='$ID'";
		$run= mysql_query($query);
		$md5= md5($password);
		$query = "UPDATE `users` SET `Password`='$md5' WHERE `ID`='$ID'";
		$run= mysql_query($query);
		echo '<script>alert("Successful updation!");</script>';
		$Type =getfield('Type');
		
		switch($Type)
		{
		case "alumni": header('Location:welcome.php');break;
		case "admin": header('Location:welcome2.php');break;
		case "student": header('Location:welcome3.php');break;
		case "professor": header('Location:welcome4.php');break;
	     }
		 
		 
	
		}
	}
	else
		echo "All fields required *";

}
else if(!loggedin())
{
echo "You are already logged in: <a href=\"logout.php\">Log out?</a>";
die();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Update</title>
<script type="text/javascript" src="view.js"></script>
</head>
<body >
<form action="" method="POST">
<div align ="center">Enter your details: <br>
Password :<br><input type="password" name ="password"><br>
Password again:<br> <input type="password" name ="password_rep"><br >
First name :<br><input type ="text" name= "fname" maxlength="30" value= "<?php if(isset($fname)) echo $fname;?>"> <br>
Last name :<br><input type ="text" name= "lname" maxlength="30" value= "<?php if(isset($lname)) echo $lname;?>"> <br>
Phone no :<br><input type ="text" name= "phone" maxlength="11"
ONCHANGE= 
"var pattern=/[^0-9]/; if(((this.value)<=0) ||(pattern.test(this.value))||this.value.length<10)
				{
				  
				  alert('Invalid phone number. Please enter again'); 
				  location.reload();
				  }"><BR> 
<input type= "submit" value="Register"></div>
</form>
</body>
</html>