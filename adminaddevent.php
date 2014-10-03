<?php	
require 'core.php';
require 'connect.php';
//session_start();
if(loggedin())
{ 

if(isset($_POST["Ename"])&& !empty($_POST["Ename"]) &&
isset($_POST["Batch"])&& !empty($_POST["Batch"]) &&
isset($_POST["Date"])&& !empty($_POST["Date"]) &&
isset($_POST["Desc"])&& !empty($_POST["Desc"]))
{
$Ename = $_POST["Ename"];
$Batch = $_POST["Batch"];
$_SESSION["batch"]= $Batch;

$Date = $_POST["Date"];
$Desc = $_POST["Desc"];


$query ="INSERT INTO `rvce` VALUES ('','$Batch','$Ename','$Date','$Desc')";
if($query_run = mysql_query($query))
{
	echo "done";
	$q = "SELECT * FROM `rvce` WHERE `Batch`='$Batch' AND `Eventname`= '$Ename'";
	if($res = mysql_query($q))
	{
	$y =mysql_result($res,0,'Festno');
	echo $y."<script>alert('Correct');</script>";
	$_SESSION["Fest"] = $y;

	}
	else
	  echo "<script>alert('Wrong');</script>";

	header('Location:sendmail.php');
}
else
	echo "Query error";
	

}
else
	echo "All fields are required";
}
else if(!loggedin())
{
echo "You are not logged in: <a href=\"login.php\">Log in?</a>";
die();
}

?>
<script>
	function valid(age)
{

var pattern=/[^0-9]/;
	if(((age)<=0) ||(pattern.test(age)))
				{
				  
				  alert('Invalid phone number. Please enter again'); 
				  location.reload();
				  }
 var today = new Date();
var y= today.getFullYear();
if(age<=1963 || age>y)
   {
    alert("Year invalid!");
	location.reload();
	}
	
}

function allLetter(uname) 
{ var letters = /^[A-Za-z]+$/; 
   if(uname.value.match(letters)) { return true; }
   else { 
	   uname.focus(); return false; } 
} 
function lengthRange(inputtxt, minlength, maxlength)  
{     
   var userInput = inputtxt.value;    
   if(userInput.length >= minlength && userInput.length <= maxlength)  
      {       
        return true;      
      }  
   else  
      {       
    alert("Please input a number with" +maxlength+ " characters");         
        return false;     
      }    
}  
function validateForm()
{
var x=document.register.fname;
var y= document.register.lname;
var phone = document.register.phone;
if (x==null || x==""||y==null||y=="")
  {
  alert("First name must be filled out");
  return false;
  }
 if(!allLetter(x)||!allLetter(y))
 {
   alert('Name (first/last) must have alphabet characters only');
 return false;
  }
  
  if(phone.value.length<10 ||phone.value.length>11)
	 { 
	 alert("Please input a number with 10 characters");
	 return false;
	 }
		return true;
}
</script>

<form name= "register" action="" method="POST" >
<div align ="center">Enter your details: <br>
<br>
Event Name <br><input type="text" name="Ename" size = 15 MAXLENGTH = 25  ><br>
Batch<br><input type="number" name="Batch" size = 4 MAXLENGTH =4 ONCHANGE= "valid(this.value)" ><br>
Date<br><input type="date" name="Date"  size = 10><br>
Details<br><TEXTAREA NAME = "Desc" ROWS = 5 COLS =50 ></TEXTAREA>
<br>
<BR><input type="submit"  value="submit"><input type="reset" value= "clear">
<div align="center"><a href ="welcome2.php">Back</a></div>
</form>
