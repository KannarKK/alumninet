<?php	
require 'core.php';
require  'connect.php';
if(loggedin())
{ 
if( 
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
   echo $USN = $_SESSION["USN"];
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
	//$fname=  $_SESSION["fname"];
	//$lname= $_SESSION["lname"];
	
	 //echo $fname;
	$query = "UPDATE `perm_address` SET `Houseno`='$PHno',`Street`='$PStreet',`City`='$PCity',`State`='$PState',`Country`='$PCountry',`Zip`='$PZip',`Phone`='$PPhone' WHERE `USN`='$USN'";
					if($query_run = mysql_query($query))
					{
					$query=  "UPDATE `curr_address` SET `Houseno`='$CHno',`Street`='$CStreet',`City`='$CCity',`State`='$CState',`Country`='$CCountry',`Zip`='$CZip',`Mobile`='$CMobile' WHERE `USN`='$USN'";
					//$query = "UPDATE `curr_address` SET `Houseno`='$CHno',`Street`='$CStreet',`City`='$CCity',`State`='$CState',`Country`='$CCountry',`Zip`='$CZip',`Mobile`='$CMobile' WHERE `USN`='$USN'";
						if($query_run = mysql_query($query))
						{
						echo "REGISTERED";
						header("Location:welcome.php");
						}
						else echo "QUERY ERROR 0";
					}
					else
						echo "QUERY ERROR1";	  
	 }
else
  echo "All fields required";
  }
  else echo "Log in please <a href= 'login.php'>log in</a>";
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
<br><br><br><br>
<form action="addressupdate.php" method="post">
<font color = "0xfafabc"  face ="times-new-roman" size= 4><u>Permanent Address:</u><br></font>
Houseno<input type="text" name="PHno" size = 10 MAXLENGTH = 5 value= "<?php if(isset($PHno)) echo $PHno;?>" >
Street<input type="text" name="PStreet" size = 10 MAXLENGTH = 15 value= "<?php if(isset($PStreet)) echo $PStreet;?>" >
City<input type="text" name="PCity" size = 10 MAXLENGTH = 15  value= "<?php if(isset($PCity)) echo $PCity;?>"><br>
State<input type="text" name="PState" size = 10 MAXLENGTH = 15 value= "<?php if(isset($PState)) echo $PCountry;?>" >
Country<input type="text" name="PCountry" size = 10 MAXLENGTH = 15  value= "<?php if(isset($PCountry)) echo $PCountry;?>">
Pincode(zip)<input type="text" name="PZip" size = 10 MAXLENGTH = 6 value= "<?php if(isset($PZip)) echo $PZip;?>" ><BR>
Phoneno:<input type="text" name="PPhone" size = 10 MAXLENGTH = 12 value= "<?php if(isset($PPhone)) echo $PPhone?>" 
ONCHANGE= 
"var pattern=/[^0-9]/; if(((this.value)<=0) ||(pattern.test(this.value)))
				{
				  
				  alert('Invalid phone number. Please enter again'); 
				  location.reload();
				  }"><BR> 

<font color = "0xfafabc"  face ="times-new-roman" size= 4><u>Current Address:</u><br></font>
Houseno<input type="text" name="CHno" size = 10 MAXLENGTH = 5 >
Street<input type="text" name="CStreet" size = 10 MAXLENGTH = 15 >
City<input type="text" name="CCity" size = 10 MAXLENGTH = 15 ><br>
State<input type="text" name="CState" size = 10 MAXLENGTH = 15 >
Country<input type="text" name="CCountry" size = 10 MAXLENGTH = 15 >
Pincode(zip)<input type="text" name="CZip" size = 10 MAXLENGTH = 6 ><BR>
Mobileno<input type="text" name="CMobile" size = 10 MAXLENGTH = 12 value= "<?php if(isset($CMobile)) echo $CMobile;?>"
ONCHANGE= 
"var pattern=/[^0-9]/; if(((this.value)<=0) ||(pattern.test(this.value)))
				{
				  
				  alert('Invalid phone number. Please enter again'); 
				  location.reload();
				  }"><BR> 

</font>
<BR><input type="submit"  value="submit"><input type="reset" value= "clear">
</form>
</body>
</html>