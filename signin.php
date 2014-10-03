<html>
<head>
<title>signin</title>
<link rel="stylesheet" type="text/css" href="basic.css"/>
</head>
<body>
<h1> R.V.C.E ALUMNI DATABASE SYSTEM </h1>
</body>
</html>
<?php 	
require 'core.php';
require 'connect.php';
if(loggedin())
{  $name= getfield("Name");

  echo "You are logged in as".$name."<br>";
  
  echo "<a href ='logout.php'>Log out</a>";

}
else 
  include 'login.php';
?>
<! DOCTYPE html PUBLIC = "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
