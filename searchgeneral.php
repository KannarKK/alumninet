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
<form target="_blank" action="searchgeneral1.php" method="POST">
<div align ="center">Input only the search parameters <br>
USN:<br><input type ="text" name= "USN" maxlength="10"> <br>
First name :<br><input type ="text" name= "Fname" maxlength="30" > <br>
Last name :<br><input type ="text" name= "Lname" maxlength="30" > <br>
Year of Joining<br><input type ="text" name= "YOJ" maxlength="10"> <br>
Year of Passing: <br><input type ="text" name= "YOP" maxlength="10"> <br>
Age:<br> <input type="number" name="age" value= "<?php if(isset($age)) echo $age;?>" 
ONCHANGE= 
"var pattern=/[^0-9]/; if(((this.value)<=0) ||(pattern.test(this.value)))
				alert('Invalid age. Please enter again')"><BR> 
Sex:<BR>
<input type="radio" name="sex" value="M" >Male 
<input type="radio" name="sex" value="F">Female
<BR><BR>
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
Select the output details to appear:<br><br>
<div id ="div1" class="form_container">
	<input  name="CHUSN"  type="checkbox"  checked ="checked"/>USN<br>
	<input  name="CHFname"  type="checkbox"  checked ="checked"  />First Name<br>
	<input  name="CHLname"  type="checkbox"   checked ="checked" />LName<br>
	<input  name="CHYOJ"  type="checkbox"   checked ="checked" />Year of Joining<br>
	<input  name="CHYOP"  type="checkbox"    checked ="checked"/>Year Of Passing<br>
	<input  name="CHDept"  type="checkbox"  checked ="checked" />Department<br>
	<input  name="CHAge"  type="checkbox"    checked ="checked"/>Age<br>
	<input  name="CHSex"  type="checkbox"    checked ="checked"/>Sex<br> </div>
	
<input type= "submit" value="Submit"></div>
<div align="center"><a href ="search.php">Back</a></div>
</form>
</body>
</html>