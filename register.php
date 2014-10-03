<?php	
require 'core.php';
require 'connect.php';
//session_start();
if(!loggedin())
{ 

if( isset($_POST["username"]) &&!empty($_POST["username"]) &&
	isset($_POST["password"]) &&!empty($_POST["password"]) &&
	isset($_POST["password_rep"]) &&!empty($_POST["password_rep"]) &&
	isset($_POST["fname"]) &&!empty($_POST["fname"]) &&
	isset($_POST["lname"]) &&!empty($_POST["lname"])&&
	isset($_POST["type"]) &&!empty($_POST["type"]) &&
	isset($_POST["phone"]) &&!empty($_POST["phone"]))
	{
	$username= $_POST["username"];
	$fname= $_POST["fname"];
	$lname =$_POST["lname"];
	$password=$_POST["password"];
	$password_again= $_POST["password_rep"];
	$type =$_POST["type"];
	$phone_no=  $_POST["phone"];
	echo $type;
	if($password !=$password_again)
		echo "Passwords do not match";
	else if(strlen($password)<=3) echo "Password length should be atleast 4";
     else 
		{
		$query = "SELECT `ID` FROM `users` WHERE `name`='$username'";
		if($query_run=mysql_query($query))
			{
				$num_of_rows = mysql_num_rows($query_run);
				if($num_of_rows !=0)
					echo "USER already exists";
				else
					{
					switch($type)
					{
					case '1': $Type= "alumni";break;
					case '2': $Type= "student";break;
					case '3': $Type = "professor";break;
					}
					$pass_hash = md5($password);  //hash calculated
					$query= "INSERT INTO `users` VALUES ('','$username','$pass_hash','$Type')";
					if($query_run = mysql_query($query))
						{ 
						 echo "Registered";
						 $query= "SELECT `ID` FROM `users` WHERE `name`='".mysql_real_escape_string($username)."'";
						 $query_run = mysql_query($query);
						  $user_id = mysql_result($query_run,0,'ID');
						 $query= "INSERT INTO `userinfo` VALUES ('$user_id','$fname','$lname','$phone_no')";
						if($query_run = mysql_query($query))
							{ 
							 echo "Registered";
							 if($Type=='alumni')
								{
								 
									$_SESSION["fname"]= $fname;
									$_SESSION["lname"]= $lname;
									header("Location:registeralumni.php");
								}
								else
								header("Location:signin.php");
							}
						else
							echo "Couldn't register. Try later";
					}
					else
						echo "Couldn't register. Try later";
					}
			}
			else echo "QUERY ERROR";
		}
		
	}
	else echo "All fields are required";
	

}
else if(loggedin())
{
echo "You are already logged in: <a href=\"logout.php\">Log out?</a>";
die();
}

?>
<script>
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

<form name= "register" action="register.php" method="POST" onsubmit="return validateForm();">
<div align ="center">Enter your details: <br>
Username :<br><input type ="text" name= "username" maxlength="30" value= "<?php if(isset($username)) echo $username;?>"> <br>
Password :<br><input type="password" name ="password"><br>
Password again:<br> <input type="password" name ="password_rep"><br >
First name :<br><input type ="text" name= "fname" maxlength="30" value= "<?php if(isset($fname)) echo $fname;?>"> <br>
Last name :<br><input type ="text" name= "lname" maxlength="30" value= "<?php if(isset($lname)) echo $lname;?>"> <br>
Phone no :<br><input type ="text" name= "phone" maxlength="11"
ONCHANGE= 
"var pattern=/[^0-9]/; if(((this.value)<=0) ||(pattern.test(this.value)))
				{
				  
				  alert('Invalid phone number. Please enter again'); 
				  location.reload();
				  }"><BR> 
<BR><BR>Select Type &nbsp;&nbsp; <SELECT NAME ="type" SIZE= 0 >
		<OPTION VALUE = "1">alumni
		<OPTION VALUE = "2" >student
		<OPTION VALUE = "3" >teacher
		
		</SELECT>

<input type= "submit" value="Register"></div>
<div align="center"><a href ="signin.php">Back</a></div>
</form>
