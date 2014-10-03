<?php	
require 'core.php';
require  'connect.php';
if(loggedin())
{ 
if( isset($_POST["Company"]) &&!empty($_POST["Company"]) )
	{
	echo $USN=$_SESSION["USN"];
	$Company= $_POST["Company"];
	
	$query ="SELECT * FROM `work` WHERE `Cname`='$Company' AND `USN`='$USN'";
	if($query_run=mysql_query($query))
		{
		   $query_num_rows = mysql_num_rows($query_run);
			if($query_num_rows ==0)
				echo "<BR><h3>No result found!!!";
			else
			{
			  echo "<br>LIST OF EXISTING WORK INFO:<br>";
			  echo "<center>";
						echo "<table CELLPADDING=10 border =1 >";
				while ($row = mysql_fetch_array($query_run)){
					//$data[] = $row;
					//foreach ($data as $row){
						
						echo "<tr>";
					   echo "<td>".$row['Cno']."</td>";
					   echo "<td>".$row['Cname']."</td>";
					   echo "<td>".$row['Title']."</td>";
					   echo "<td>".$row['Year']."</td>";
					   echo "<td>".$row['Specialisation']."</td>";
						echo "</tr>";
						
					   
					//}
					
				}
				echo "</table>";
				echo "Please remember the Company number before clicking Next <br>";
				echo "<a href ='workupdate2.php'>Next</a>";
			
			}
			
		}
		else
			echo "Query error";
		
	 }
	else
	  echo "All fields required";
	  }
else
	echo "not logged in <a href ='login.php'>Log in</a>";

	?>

<! DOCTYPE html PUBLIC = "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Add work experience</title>
<link rel="stylesheet" type="text/css" href="basic.css"/>
<link rel="stylesheet" type="text/css" href="animations.css"/>

</head>
<body>
<h1> R.V.C.E ALUMNI DATABASE SYSTEM </h1>

<font color = "0x00ff"  face ="times-new-roman" size= 4>
<div id="div1"> Enter search detail:</div>
<form action="" method="post">
<br>
Company Name <br><input type="text" name="Company" size = 10 MAXLENGTH = 25  ><br>
<br>
<BR><input type="submit"  value="submit"><input type="reset" value= "clear">
<a href ="workadd.php">back</a>
</form>
</body>
</html>