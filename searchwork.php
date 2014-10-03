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
<form target ="_blank" action="searchwork1.php" method="POST">
<div align ="center">Input only the search parameters <br>
Company Name<br><input type ="text" name= "Company" maxlength="10"> <br>
USN<br><input type ="text" name= "USN" maxlength="30" > <br>
Year<br><input type ="text" name= "Year" maxlength="30" > <br>
Title<br><input type ="text" name= "Title" maxlength="30"> <br>
First name :<br><input type ="text" name= "Fname" maxlength="30" > <br>
Last name :<br><input type ="text" name= "Lname" maxlength="30" > <br>

Select the output details to appear:<br><br>
<div id ="div1" class="form_container">
	<input  name="CHUSN"  type="checkbox"  checked ="checked"/>USN<br>
	<input  name="CHFname"  type="checkbox"  checked ="checked"  />First Name<br>
	<input  name="CHLname"  type="checkbox"   checked ="checked" />Last Name<br>
	<input  name="CHCompany"  type="checkbox"   checked ="checked" />Company name<br>
	<input  name="CHYear"  type="checkbox"    checked ="checked"/>Year<br>
	<input  name="CHTitle"  type="checkbox"  checked ="checked" />Title<br>
	<input  name="CHSpec"  type="checkbox"    checked ="checked"/>Specialisation<br>
	<input  name="CHAchvmt"  type="checkbox"    checked ="checked"/>Achievements<br> </div>
	
<input type= "submit" value="Submit"></div>
<div align="center"><a href ="search.php">Back</a></div>
</form>
</body>
</html>