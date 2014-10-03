<?php	
require 'core.php';
require  'connect.php';
if(loggedin())
{ 
if( isset($_POST["Company"]) &&!empty($_POST["Company"]) &&
	isset($_POST["Title"]) &&!empty($_POST["Title"]) &&
	isset($_POST["Year"]) &&!empty($_POST["Year"]) &&
	isset($_POST["Spec"]) &&!empty($_POST["Spec"]))
	{
	 $USN=$_SESSION["USN"];
	 $USN=$_SESSION["USN"];
	$Company= $_POST["Company"];
	$Title = $_POST["Title"];
	$Year = $_POST["Year"];
	$Spec =$_POST["Spec"];
	$Cno = $_SESSION["CNO"];
	echo $USN. ''. $Cno;
	if(isset($_POST["commentbox"])&& !empty($_POST["commentbox"]))
		{
		$achvmt = $_POST["commentbox"];
		
		$query = "UPDATE `work` SET `Cname`='$Company',`Year`='$Year',`Title`='$Title',`Specialisation`='$Spec',`Achievements`='$achvmt' WHERE `USN` ='$USN' AND `Cno`='$Cno'";
		if($query_run = mysql_query($query))
		   {
			
			{
			echo "Registered"; 
			header("Location:welcome.php");
			}
		   }
		   else echo "QUERY ERROR";
		 }
	 else
		{
		$query = "UPDATE `work` SET `Cname`='$Company',`Year`='$Year',`Title`='$Title',`Specialisation`='$Spec' WHERE `USN` ='$USN' AND `Cno`='$Cno'";
		if($query_run = mysql_query($query))
		   {
		   
			{
			echo "Registered"; 
			header("Location:welcome.php");
			}
		   }
		   else echo "QUERY ERROR";
		 } 
	 } 
	else
	  echo "All fields except Achievements required"; 
	  }
else
	{ echo "not logged in <a href ='signin.php'>Log in</a>";
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
<title>Add work experience</title>
<link rel="stylesheet" type="text/css" href="basic.css"/>
<link rel="stylesheet" type="text/css" href="animations.css"/>

</head>
<body>
<h1> R.V.C.E ALUMNI DATABASE SYSTEM </h1>

<font color = "0x00ff"  face ="times-new-roman" size= 4>
<div id="div1"> Update fields:</div>
<form action="" method="post">
<br>
Company Name <br><input type="text" name="Company" size = 10 MAXLENGTH = 25  ><br>
Title<br><input type="text" name="Title" size = 10 MAXLENGTH = 25 ><br>
Year<br><input type="text" name="Year" size = 10 MAXLENGTH = 4 
ONCHANGE= "valid(this.value)"  ><br>

Specialisation<br><input type="text" name="Spec" size = 10 MAXLENGTH = 25><br>
Achievements<br><TEXTAREA NAME = "commentbox" ROWS = 5 COLS =50 ></TEXTAREA>
<br>
<BR><input type="submit"  value="submit"><input type="reset" value= "clear">
<a href ="workadd.php">back</a>
</form>
</body>
</html>