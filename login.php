<?php

if(isset($_POST["username"])  && !empty($_POST["username"]) &&
	isset($_POST["password"])  && !empty($_POST["password"]))
{
 $username = $_POST["username"];
 $password = $_POST["password"];
 $password_hash =md5($password);
 $query= "SELECT `ID`,`Type` FROM `users` WHERE `name`='".mysql_real_escape_string($username)."' AND `password`= '".mysql_real_escape_string($password_hash)."'";
 if($query_run = mysql_query($query))
 {
	$query_num_rows = mysql_num_rows($query_run);
	if($query_num_rows==0)
		echo "INVALID USERNAME/PASSWORD combination";
	 else if($query_num_rows==1)
	 { 
	   $user_id = mysql_result($query_run,0,'ID');
	   $type =mysql_result($query_run,0,'Type');
	   $_SESSION["user_id"]=$user_id;
	    $query= "SELECT `USN` FROM `alumni` WHERE `ID`='$user_id'";
		
		
		if($query_run = mysql_query($query))
		{
		    $USN = mysql_result($query_run,0,'USN');
			$_SESSION["USN"] =$USN;
			
		   switch($type)
		   {
		   case 'admin': $welcome = 'welcome2.php'; break;
		   case 'alumni': $welcome = 'welcome.php'; break;
		   case 'student': $welcome = 'welcome3.php'; break;
		   case 'professor': $welcome = 'welcome4.php'; break;
		   }
		   
		   header('Location:'.$welcome);
		  }
		  echo "Error 1 23";
	 }
      
 }
 else
 {  echo "Query error";
    }
 
 }
else
 echo "You must enter a username or password";

?>
<font color = "0x00ff"  face ="sans-serif" size= 4>
<div id="div1" >Signin </div>
<form action="<?php echo $current_file;?>" method="post">
UserName: <input type="text" name="username"><BR>

Password: &nbsp;<input type="password" name="password"><br>
<BR><input type="submit"  value="Login">
<BR><a href ="register.php">New user? Register here</a>
</form>
</font>
