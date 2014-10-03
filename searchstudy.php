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
<form target="_blank" action="searchstudy1.php" method="POST">
<div align ="center"><b>Input only the search parameters</b> <br>
USN<br><input type ="text" name= "USN" maxlength="30" > <br>
First name :<br><input type ="text" name= "Fname" maxlength="30" > <br>
Last name :<br><input type ="text" name= "Lname" maxlength="30" > <br>
College<br><input type ="text" name= "College" maxlength="30"> <br>
Substream<br><input type ="text" name= "Stream" maxlength="30"> <br>
Course Type:<SELECT NAME ="Course" SIZE= 0 >
		<OPTION VALUE="0">don't use
		<OPTION VALUE = "1">MBA
		<OPTION VALUE = "2" >MS
		<OPTION VALUE = "3" >MTech.
		<OPTION VALUE = "4" >PhD	
		</SELECT> <BR>


<br><br>
		<b>Select the output details to appear:</b><br>
<div id ="div1" class="form_container">
	<input  name="CHUSN"  type="checkbox"  checked ="checked"/>USN<br>
	<input  name="CHFname"  type="checkbox"  checked ="checked"  />First Name<br>
	<input  name="CHLname"  type="checkbox"   checked ="checked" />Last Name<br>
	<input  name="CHCollege"  type="checkbox"   checked ="checked" />College<br>
	<input  name="CHStream"  type="checkbox"    checked ="checked"/>Stream<br>
	<input  name="CHCourse"  type="checkbox"  checked ="checked" />Course Type<br>
	<input  name="CHYear"  type="checkbox"  checked ="checked" />Year<br>
	
<input type= "submit" value="Submit"></div>
<div align="center"><a href ="search.php"><h3>Back</h3></a></div>
</form>
</body>
</html>