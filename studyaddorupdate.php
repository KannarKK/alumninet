<?php

require 'core.php';
require 'connect.php';
if(!loggedin())
{ 
  echo "You are not logged in..Log in? <a href= \"signin.php\">Login</a>";
  die();
 }
 else  if(getfield("Type")!="alumni")
  {echo "You are not logged in..Log in <a href= \"signin.php\">Login</a>";
  die();
  }
  if( isset($_POST["element_1"]) &&!empty($_POST["element_1"]))
  {
   if($_POST["element_1"]==1)
    header('Location:alumnistudyinsert.php');
    if($_POST["element_1"]==2)
    header('Location:alumniupdate.php');
	
	
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
	
		<h1><a>Welcome Alumni</a></h1>
		<form id="form_617792" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Welcome Alumni</h2>
			<p></p>
			<div align ="right">
			<a href ='welcome.php'>Back To Home    </a>
			<a href ='alumupdateoptions.php'>Back   </a>
			<a href ='logout.php'>Log out</a></div>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Choose an option </label>
		<span>
			<input id="element_1_1" name="element_1" class="element radio" type="radio" value="1" checked="checked"/>
<label class="choice" for="element_1_1">Add higher studies info</label>
<input id="element_1_2" name="element_1" class="element radio" type="radio" value="2" />
<label class="choice" for="element_1_2">Update existing study info</label>


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