<?php
require 'core.php';
require 'connect.php';
if(!loggedin())
{ 
  echo "You are not logged in..Log in? <a href= \"signin.php\">Login</a>";
  die();
 }
 else  if(getfield("Type")!="student")
  {echo "You are not logged in..Log in? <a href= \"signin.php\">Login</a>";
  die();
  }
  
  if( isset($_POST["element_1"]) &&!empty($_POST["element_1"]))
  {
   $val = $_POST["element_1"];
	switch($val)
	{
	case 1: header('Location:search.php');break;
	case 2: header('Location:updateprofile.php');break;
	case 3: header('Location:contactus.php');break;
	}
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Welcome Student</a></h1>
		<form id="form_617792" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Welcome Student</h2>
			<p></p>
			<div align ="right"><a href ='logout.php'>Log out</a>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Choose an option </label>
		<span>
			<input id="element_1_1" name="element_1" class="element radio" type="radio" value="1" checked="checked"/>
			<label class="choice" for="element_1_1">Search</label>
			<input id="element_1_2" name="element_1" class="element radio" type="radio" value="2" />
			<label class="choice" for="element_1_2">Update your profile</label>
			<input id="element_1_4" name="element_1" class="element radio" type="radio" value="3" />
			<label class="choice" for="element_1_4">Contact us</label>

		</span> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="617792" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
			</ul>
		</form>	
	</div>
	<img id="bottom" src="bottom.png" alt="">
	</body>
</html>