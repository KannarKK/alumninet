<?php
//-------------------------SEARCH PAGE COMMON-------------------------------------------------

require 'core.php';
require 'connect.php';
if(!loggedin())
{ 
  echo "You are not logged in..Log in? <a href= \"signin.php\">Login</a>";
  die();
 }

  if( isset($_POST["element_1"]) &&!empty($_POST["element_1"]))
  {
    $val = $_POST["element_1"];
	switch($val)
	{
	case 1: header('Location:searchgeneral.php');break;
	case 2: header('Location:searchwork.php');break;
	case 3: header('Location:searchstudy.php');break;
	case 4: $type = getfield(Type);
		     switch($type)
			 {
	            case "alumni":
				case "student":header('Location:contactsearchstudent.php');break;
				case "admin":
				case "professor": header('Location:contactsearchprof.php');break;
				}
	}
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Search</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Search</a></h1>
		<form id="form_617792" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Search</h2>
			<p></p>
			<div align ="right"><a href ='logout.php'>Log out</a></div>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Choose an option </label>
		<span>
			<input id="element_1_1" name="element_1" class="element radio" type="radio" value="1" checked="checked"/>
<label class="choice" for="element_1_1">Search for general info</label>
<input id="element_1_2" name="element_1" class="element radio" type="radio" value="2" />
<label class="choice" for="element_1_2">Search based on Work</label>
<input id="element_1_3" name="element_1" class="element radio" type="radio" value="3" />
<label class="choice" for="element_1_3">Search based on Higher Studies </label>
<input id="element_1_4" name="element_1" class="element radio" type="radio" value="4" />
<label class="choice" for="element_1_4">Search on Contact Info</label>

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