
<?php	
require 'core.php';
require  'connect.php';
if(loggedin())
{
if( isset($_POST["course"]) &&!empty($_POST["course"]) &&
	isset($_POST["stream"]) &&!empty($_POST["stream"]) &&
	isset($_POST["college"]) &&!empty($_POST["college"]) &&
	isset($_POST["year"]) &&!empty($_POST["year"]))
	{ 
		echo $USN= $_SESSION["USN"];
		$cc =$_POST["course"];
		switch($cc)
		{
		case '1': $course= "MBA"; break;
		case '2': $course= "MS"; break;
		case '3': $course= "MTech."; break;
		case '4': $course= "PhD."; break;
		}
	
	$stream =$_POST["stream"];
	$college= $_POST["college"];
	$year = $_POST["year"];
	
	 $query= "SELECT `USN` FROM `higherstudies` WHERE `USN`='$USN'";
	  if($query_run = mysql_query($query))
	  {
		  $query_num_rows = mysql_num_rows($query_run);
		 
			$query = "INSERT INTO `higherstudies` VALUES ('','$USN','$course','$stream','$college','$year')";
			if($query_run = mysql_query($query))
				{
				echo "Registered! <a href='welcome.php'>Go back</a>"; 
				
				}
			else echo "QUERY ERROR1";
		   }
		   else "Entry exists!.. Change in Update!";
	}
	else echo "Enter all fields";
}
else
{
echo "You are not logged in..Log in? <a href= \"signin.php\">Login</a>";
  die();
 }

?>
<script>
	function valid(age)
{

var pattern=/[^0-9]/;
	if(((age)<=0) ||(pattern.test(age)))
				{
				  
				  alert('Invalid phone number. Please enter again'); 
				  location.reload();
				  }
 var today = new Date();
var y= today.getFullYear();
if(age<=1963 || age>y)
   {
    alert("Year invalid!");
	location.reload();
	}
	
}
</script>
<! DOCTYPE html PUBLIC = "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>ADS</title>
<link rel="stylesheet" type="text/css" href="basic.css"/>
<link rel="stylesheet" type="text/css" href="animations.css"/>

</head>
<body>
<h1> R.V.C.E ALUMNI DATABASE SYSTEM </h1>
<font color = "0x00ff"  face ="times-new-roman" size= 4>
<align= "right"><a href= "welcome.php">Back</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href ="logout.php">Log out</a></align><br></font>
<font color = "0x00ff"  face ="times-new-roman" size= 4>
<div id="div1"> Enter your details here:</div>
<form action="" method="post">
<br>
<font color = "0xfafabc"  face ="times-new-roman" size= 4><u>Higher Studies:</u><br></font>
Course Type:<SELECT NAME ="course" SIZE= 0 >
		<OPTION VALUE = "1">MBA
		<OPTION VALUE = "2" >MS
		<OPTION VALUE = "3" >MTech.
		<OPTION VALUE = "4" >PhD	
		</SELECT> <BR>
Substream:<br><input type="text" name="stream"><BR> 
College:<BR><input type="text" name="college" size ="40" ><br>
Year of joining:<br> <input type="text" name="year" size = 4 MAXLENGTH = 4 
ONCHANGE= "valid(this.value)"  ><br>

</font>
<BR><input type="submit"  value="submit"><input type="reset" value= "clear">
</form>
</body>
</html>