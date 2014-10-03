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
<form target="_blank" action="contactstudent1.php" method="POST">
<div align ="center">Input only the search parameters <br>
USN:<br><input type ="text" name= "USN" maxlength="10"> <br>
First name :<br><input type ="text" name= "Fname" maxlength="30" > <br>
Last name :<br><input type ="text" name= "Lname" maxlength="30" > <br><br>
DEPARTMENT &nbsp;&nbsp; <SELECT NAME ="Dept" SIZE= 0 >
		<OPTION VALUE= "0">None
		<OPTION VALUE = "1">CSE
		<OPTION VALUE = "2" >ISE
		<OPTION VALUE = "3" >ECE
		<OPTION VALUE = "4" >EEE
		<OPTION VALUE = "5" >IT
		<OPTION VALUE = "6" >TCE
		<OPTION VALUE = "7" >CE
		<OPTION VALUE = "8" >IEM
		<OPTION VALUE = "9" >ME
		<OPTION VALUE = "10" >BT
		</SELECT> <BR><BR>
City :<br><input type ="text" name= "City" maxlength="30" > <br>
		
		Select the output details to appear:<br><br>
<div id ="div1" class="form_container">
	<input  name="CHUSN"  type="checkbox"  checked ="checked"/>USN<br>
	<input  name="CHFname"  type="checkbox"  checked ="checked"  />First Name<br>
	<input  name="CHLname"  type="checkbox"   checked ="checked" />Last Name<br>
	<input  name="CHDept"  type="checkbox"    checked ="checked"/>Department<br>
	<input  name="CHAddr"  type="checkbox"   checked ="checked" />Current Address<br>
	<input  name="CHphone"  type="checkbox"    checked ="checked"/>phone no<br>
	<input  name="CHmail"  type="checkbox"    checked ="checked"/>mail<br>
	
<input type= "submit" value="Submit"></div>
<div align="center"><a href ="search.php">Back</a></div>
</form>
</body>
</html>