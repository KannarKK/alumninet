<?php
require 'core.php';
require 'connect.php';
if(loggedin() && getfield('Type')=='admin')
{


if(isset($_POST["user"]) && !empty($_POST["user"]))
{
	$username= $_POST["user"];

	$query ="DELETE FROM `users` WHERE `Name`='$username'";
	if($res= mysql_query($query))
	{
	echo "DONE";
	}
	else
	   echo " Query error";
}

}
else
{
echo "You are not logged in: <a href=\"login.php\">Log in?</a>";
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
<div align ="center">Enter Username of the profile: <br>
User name:<br><input type="text" name ="user"><br>
<input type= "submit" value="Click">
<a href ="welcome2.php">back</a></div>
</form>
</body>
</html>

