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
</body>
</html>
<?php	
require 'core.php';
require 'connect.php';
if(loggedin())
{ $flag=0;
  $query = "SELECT * from `alumni` WHERE";
  $temp= $query;
  if(isset($_POST["USN"]) &&!empty($_POST["USN"]))
   {$flag=1;
      $USN=  $_POST["USN"];
     $query .= " `USN`='$USN' and";
	}
	if(isset($_POST["Fname"]) &&!empty($_POST["Fname"]))
   {$flag=1;
      $Fname=  $_POST["Fname"];
     $query .= " `Fname`='$Fname' and";
	}
	if(isset($_POST["Lname"]) &&!empty($_POST["Lname"]))
   {$flag=1;
      $Lname=  $_POST["Lname"];
     $query .= " `Lname`='$Lname' and";
	}
	if(isset($_POST["YOJ"]) &&!empty($_POST["YOJ"]))
   {$flag=1;
      $YOJ=  $_POST["YOJ"];
     $query .= " `YOJ`='$YOJ' and";
	}
	if(isset($_POST["YOP"]) &&!empty($_POST["YOP"]))
   {$flag=1;
      $YOP=  $_POST["YOP"];
     $query .= " `YOP`='$YOP' and";
	}
	if(isset($_POST["Dept"]) &&!empty($_POST["Dept"]))
   {       
      $Dt=  $_POST["Dept"];
	  if($Dt!=0)
	    {   
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
			$query .= " `Dept`='$Dept' and";
			 $flag=1;
		}
	}
	if(isset($_POST["age"]) &&!empty($_POST["age"]))
   {$flag=1;
      $Age=  $_POST["age"];
     $query .= " `Age`='$Age' and";
	}
	if(isset($_POST["sex"]) &&!empty($_POST["sex"]))
   {
      $Sex=  $_POST["sex"];
	  if($Sex=="M")
     $query .= " `Sex`='M' and";
	 else if($Sex=="F")
     $query .= " `Sex`='F' and";
	 $flag=1;
	}
	if($flag==1)$query=substr($query,0,(strlen($query)-4));
	if($temp==$query && $flag==0)
	 { echo "<h3>Select some data!";
	 }
	else
	//echo $query;
	if($query_run=mysql_query($query))
	{
	   $query_num_rows = mysql_num_rows($query_run);
			if($query_num_rows ==0)
				echo "<BR><h3>No result found!!!";
			else
			{
								echo "<center><br>RESULT of search <br>";
								echo "<center>";
								echo "<table CELLPADDING=10 border =1 ><b>";
								if(isset($_POST["CHUSN"]))echo "<th>USN</th>";
								if(isset($_POST["CHFname"]))echo "<th>FirstName</th>";
								if(isset($_POST["CHLname"]))echo "<th>LastName</th>";
								if(isset($_POST["CHYOJ"]))echo "<th>Year of Joining</th>";
								if(isset($_POST["CHYOP"]))echo "<th>Year of Passing</th>";
								if(isset($_POST["CHDept"]))echo "<th>Department</th>";
								if(isset($_POST["CHAge"]))echo "<th>Age</th>";
								if(isset($_POST["CHSex"]))echo "<th>Sex</th></b>";
				while ($row = mysql_fetch_array($query_run)){
					   echo "<tr>";
					   if(isset($_POST["CHUSN"]))echo "<td>".$row['USN']."</td>";
					   if(isset($_POST["CHFname"]))echo "<td>".$row['Fname']."</td>";
					   if(isset($_POST["CHLname"]))echo "<td>".$row['Lname']."</td>";
					   if(isset($_POST["CHYOJ"]))echo "<td>".$row['YOJ']."</td>";
					   if(isset($_POST["CHYOP"]))echo "<td>".$row['YOP']."</td>";
					   if(isset($_POST["CHDept"]))echo "<td>".$row['Dept']."</td>";
					   if(isset($_POST["CHAge"]))echo "<td>".$row['Age']."</td>";
					   if(isset($_POST["CHSex"]))echo "<td>".$row['Sex']."</td>";
						echo "</tr>";
				}
				echo "</table>";	
					
				
			}		
		}
		else
			echo "Query error";
}
else if(!loggedin())
{
echo "You are not logged in: <a href=\"signin.php\">Sign in</a>";
die();
}
?>