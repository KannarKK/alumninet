<! DOCTYPE html PUBLIC = "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Search</title>
<link rel="stylesheet" type="text/css" href="basic.css"/>
<link rel="stylesheet" type="text/css" href="animations.css"/>


</head>
<body>
<h1> R.V.C.E ALUMNI DATABASE SYSTEM </h1>

<div id="div1"> <h2>Mail us at: <br>kirankannarkk.lris@gmail.com
				  <br>madankumar1993@gmail.com</h2></div>
</body>
</html>

<?php
require 'core.php';
require 'connect.php';

echo "<script>alert('Direct Feature not yet available. Hang on! For now,please mail us with username, not your name!')</script>"; 

         $Type =getfield('Type');
		
		switch($Type)
		{
		case "alumni":echo "<a href ='welcome.php'>Back to Home Page</a>"; break;
		case "student": echo "<a href ='welcome3.php'>Back to Home Page</a>";break;
		case "professor": echo "<a href ='welcome4.php'>Back to Home Page</a>";break;
	     }



?>
