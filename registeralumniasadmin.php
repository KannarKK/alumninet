<?php	
require 'core.php';
require  'connect.php';
if(loggedin())
{ 
if( isset($_POST["USN"]) &&!empty($_POST["USN"]) &&
	isset($_POST["age"]) &&!empty($_POST["age"]) &&
	isset($_POST["sex"]) &&!empty($_POST["sex"]) &&
	isset($_POST["Dept"]) &&!empty($_POST["Dept"]) &&
	isset($_POST["YOJ"]) &&!empty($_POST["YOJ"]) &&
	isset($_POST["YOP"]) &&!empty($_POST["YOP"])&&
	isset($_POST["mail"]) &&!empty($_POST["mail"]) &&
	isset($_POST["PHno"]) &&!empty($_POST["PHno"])&&
	isset($_POST["PStreet"]) &&!empty($_POST["PStreet"]) &&
	isset($_POST["PCity"]) &&!empty($_POST["PCity"]) &&
	isset($_POST["PState"]) &&!empty($_POST["PState"]) &&
	isset($_POST["PCountry"]) &&!empty($_POST["PCountry"]) &&
	isset($_POST["PZip"]) &&!empty($_POST["PZip"])&&
	isset($_POST["PPhone"]) &&!empty($_POST["PPhone"])&&
	isset($_POST["CHno"]) &&!empty($_POST["CHno"])&&
	isset($_POST["CStreet"]) &&!empty($_POST["CStreet"]) &&
	isset($_POST["CCity"]) &&!empty($_POST["CCity"]) &&
	isset($_POST["CState"]) &&!empty($_POST["CState"]) &&
	isset($_POST["CCountry"]) &&!empty($_POST["CCountry"]) &&
	isset($_POST["CZip"]) &&!empty($_POST["CZip"])&&
	isset($_POST["CMobile"]) &&!empty($_POST["CMobile"]))
	{

	$USN= $_POST["USN"];
	$age= $_POST["age"];
	$sex =$_POST["sex"];
	$Dt=$_POST["Dept"];
	switch($Dt)
	{
	case '1': $Dept= "CSE"; break;
	case '2': $Dept= "ISE"; break;
	case '3': $Dept= "ECE"; break;
	case '4': $Dept= "EEE"; break;
	case '5': $Dept= "IT"; break;
	case '6': $Dept= "TCE"; break;
	case '7': $Dept= "CE"; break;
	case '8': $Dept= "IEM"; break;
	case '9': $Dept= "ME"; break;
	case '10': $Dept= "BT"; break;
	}
	$YOJ=$_POST["YOJ"];
	$YOP=$_POST["YOP"];
	$mail= $_POST["mail"];
	$PHno= $_POST["PHno"];
	$PStreet= $_POST["PStreet"];
	$PCity =$_POST["PCity"];
	$PState=$_POST["PState"];
	$PCountry= $_POST["PCountry"];
	$PZip =$_POST["PZip"];
	$PPhone=  $_POST["PPhone"];
	$CHno= $_POST["CHno"];
	$CStreet= $_POST["CStreet"];
	$CCity =$_POST["CCity"];
	$CState=$_POST["CState"];
	$CCountry= $_POST["CCountry"];
	$CZip =$_POST["CZip"];
	$CMobile=  $_POST["CMobile"];
	$fname=  $_SESSION["fname"];
	$lname= $_SESSION["lname"];
	
	  $query= "SELECT `ID` FROM `userinfo` WHERE `Fname`='".$_SESSION["fname"]."' AND `Lname`='".$_SESSION["lname"]."'";
	  if($query_run = mysql_query($query))
	  {
			    $user_id = mysql_result($query_run,0,'ID');
				$query= "INSERT INTO `alumni` VALUES ('$user_id','$USN','$fname','$lname','$YOJ','$YOP','$Dept','$age','$sex')";
				if($query_run = mysql_query($query))
				{
				
				$query= "INSERT INTO `perm_address` VALUES ('$USN','$PHno','$PStreet','$PCity','$PState','$PCountry','$PZip','$PPhone')";
					if($query_run = mysql_query($query))
					{
					$query= "INSERT INTO `curr_address` VALUES ('$USN','$CHno','$CStreet','$CCity','$CState','$CCountry','$CZip','$CMobile','$mail')";
						if($query_run = mysql_query($query))
						{
						echo "REGISTERED";
						header("Location:welcome2.php");
						}
						else echo "QUERY ERROR 0";
					}
					else
						echo "QUERY ERROR1";
				}
				else
				  echo "QUERY ERROR2";
	  
	  }
	  else
		echo "ERROR3";
	  
	 }
else
  echo "All fields required";
  }
	?>

<! DOCTYPE html PUBLIC = "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Register</title>
<link rel="stylesheet" type="text/css" href="basic.css"/>
<link rel="stylesheet" type="text/css" href="animations.css"/>

</head>
<body>
<h1> R.V.C.E ALUMNI DATABASE SYSTEM </h1>

<font color = "0x00ff"  face ="times-new-roman" size= 4>
<div id="div1"> Enter your details here:</div>
<form action="registeralumniasadmin.php" method="post">
<br>
USN:<br> <input type="text" name="USN" size = 10 MAXLENGTH = 10 value= "<?php if(isset($USN)) echo $USN;?>" ><BR>
Age:<br> <input type="number" name="age" value= "<?php if(isset($age)) echo $age;?>" 
ONCHANGE= 
"var pattern=/[^0-9]/; if(((this.value)<=0) ||(pattern.test(this.value)))
				alert('Invalid age. Please enter again')"><BR> 
Sex:<BR>
<input type="radio" name="sex" value="M" >Male 
<input type="radio" name="sex" value="F">Female
<BR><BR>
DEPARTMENT &nbsp;&nbsp; <SELECT NAME ="Dept" SIZE= 0 >
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
		</SELECT> <BR>
Year of joining: <input type="text" name="YOJ" size = 4 MAXLENGTH = 4  value= "<?php if(isset($YOJ)) echo $YOJ;?>">
Year of graduation:<input type="text" name="YOP" size = 4 MAXLENGTH = 4  value= "<?php if(isset($YOP)) echo $YOP;?>"><BR><br>

Mail-id:<br> <input type="text" name="mail" size=30 value= "<?php if(isset($mail)) echo $mail;?>"><br><br>

<font color = "0xfafabc"  face ="times-new-roman" size= 4><u>Permanent Address:</u><br></font>
Houseno<input type="text" name="PHno" size = 10 MAXLENGTH = 5 value= "<?php if(isset($PHno)) echo $PHno;?>" >
Street<input type="text" name="PStreet" size = 10 MAXLENGTH = 15 value= "<?php if(isset($PStreet)) echo $PStreet;?>" >
City<input type="text" name="PCity" size = 10 MAXLENGTH = 15  value= "<?php if(isset($PCity)) echo $PCity;?>"><br>
State<input type="text" name="PState" size = 10 MAXLENGTH = 15 value= "<?php if(isset($PState)) echo $PCountry;?>" >
Country<input type="text" name="PCountry" size = 10 MAXLENGTH = 15  value= "<?php if(isset($PCountry)) echo $PCountry;?>">
Pincode(zip)<input type="text" name="PZip" size = 10 MAXLENGTH = 6 value= "<?php if(isset($PZip)) echo $PZip;?>" ><BR>
Phoneno:<input type="text" name="PPhone" size = 10 MAXLENGTH = 12 value= "<?php if(isset($PPhone)) echo $PPhone?>" ><BR><br>

<font color = "0xfafabc"  face ="times-new-roman" size= 4><u>Current Address:</u><br></font>
Houseno<input type="text" name="CHno" size = 10 MAXLENGTH = 5 >
Street<input type="text" name="CStreet" size = 10 MAXLENGTH = 15 >
City<input type="text" name="CCity" size = 10 MAXLENGTH = 15 ><br>
State<input type="text" name="CState" size = 10 MAXLENGTH = 15 >
Country<input type="text" name="CCountry" size = 10 MAXLENGTH = 15 >
Pincode(zip)<input type="text" name="CZip" size = 10 MAXLENGTH = 6 ><BR>
Mobileno<input type="text" name="CMobile" size = 10 MAXLENGTH = 12 value= "<?php if(isset($CMobile)) echo $CMobile;?>" ><BR>

</font>
<BR><input type="submit"  value="submit"><input type="reset" value= "clear">
<a href="welcome2.php">Back</a>
</form>
</body>
</html>