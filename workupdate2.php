
<?php	
require 'core.php';
require  'connect.php';
if(loggedin())
{
if( isset($_POST["Cno"]) &&!empty($_POST["Cno"]))
{
	$_SESSION["CNO"] = $_POST["Cno"];
	header("Location:workupdate3.php");
	
	}
	else echo "Enter all fields";
}
else
{
echo "You are not logged in..Log in? <a href= \"signin.php\">Login</a>";
  die();
 }

?>

<! DOCTYPE html PUBLIC = "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Register</title>
<link rel="stylesheet" type="text/css" href="basic.css"/>
<link rel="stylesheet" type="text/css" href="animations.css"/>

</head>
<body>
<h1> R.V.C.E ALUMNI DATABASE SYSTEM </h1>
<font color = "0x00ff"  face ="times-new-roman" size= 4>
<align= "right"><a href= "workupdate.php">Back</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href ="logout.php">Log out</a></align><br></font>
<font color = "0x00ff"  face ="times-new-roman" size= 4>
<div id="div1"> Enter Company Number to edit info:</div>
<form action="" method="post">
<br>
Company number:<br> <input type="text" name="Cno" size = 4 MAXLENGTH = 4 >
</font>
<BR><input type="submit"  value="submit"><input type="reset" value= "clear">
</form>
</body>
</html>