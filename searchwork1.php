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
  $true=0;
  $query = "SELECT * from `work` WHERE";
  $temp= $query;
  $copy = "SELECT * from `alumni` WHERE";
  $Fname='';
  $Lname='';
  if(isset($_POST["USN"]) &&!empty($_POST["USN"]))  //if USN is set 
   {$flag=1;
      $USN=  $_POST["USN"];
	  		  
			  if(isset($_POST["Fname"]) &&!empty($_POST["Fname"]))  //if Fname or Lname set, check USN stored == USN given
			   {$flag=1; $true=1;
				  $Fname=  $_POST["Fname"]; //global $copy;
				 $copy .= " `Fname`='$Fname' and";
				}
				if(isset($_POST["Lname"]) &&!empty($_POST["Lname"]))
			   {$flag=1; $true=1;
				  $Lname=  $_POST["Lname"]; //global $copy;
				 $copy .= " `Lname`='$Lname' and";
				}
				$copy .= " `USN`='$USN' and";
			if($true==1)
			{  $copy=substr($copy,0,(strLen($copy)-4));
			//echo $copy;
			if(($query_run=mysql_query($copy)))
			{ 
				$query_num_rows = mysql_num_rows($query_run);
				//echo '<br>'.$query_num_rows;
				if($query_num_rows==0)
						/*echo '<script>$r=confirm("Invalid Parameters. No match found! Retry?");
						if ($r==true)
						  {
						<script><?php  header("Location:searchwork.php") ?></script>;
						  }
						else
						  {
						  <?php header("Location:search.php") ?>;
						  } </script>'; */
					{echo '<align="middle"><h3>'."Invalid Parameters. No match found! <a href='searchwork.php'>Retry?</a></align><script>alert('INVALID');</script>"; die();}
				else
					{
					//global $Fname,$Lname;
					$Fname= mysql_result($query_run,0,'Fname');
					$Lname= mysql_result($query_run,0,'Lname');
					
					}
			}
			}
			//else
			$query .= " `USN`='$USN' and";
			
	}
	else 
	{   //USN Not set but Fname /Lname is Set
	  $copy = "SELECT * from `alumni` WHERE";
	  if(isset($_POST["Fname"]) &&!empty($_POST["Fname"]))
			   {$flag=1; $true=1;
				  $Fname=  $_POST["Fname"];
				 $copy .= " `Fname`='$Fname' and";
				}
	   if(isset($_POST["Lname"]) &&!empty($_POST["Lname"]))
			   {$flag=1; $true=1;
				  $Lname=  $_POST["Lname"];
				 $copy .= " `Lname`='$Lname' and";
				}
				
			if($true==1)
			{
			     $copy=substr($copy,0,(strlen($copy)-4));
				 if($query_run=mysql_query($copy))
				{ 
					$USN = mysql_result($query_run,0,'USN');
					$Fname = mysql_result($query_run,0,'Fname');
					$Lname = mysql_result($query_run,0,'Lname');
					$query .= " `USN`='$USN' and";
					
				}
			}	
	}
	// User has asked for Fname OR Lname,but not specified any FName AND Lname and (or) Lname, now this has to be found out using USN (required)
	if((empty($_POST["Fname"])&& empty($_POST["Lname"])) && ((isset($_POST["CHFname"])&&!empty($_POST["CHFname"]))||(isset($_POST["CHLname"])&&!empty($_POST["CHFname"]))))
			   { 
			     if(!empty($_POST["USN"]))
					{
					$copy = "SELECT * from `alumni` WHERE `USN`='$USN'";
						if($query_run=mysql_query($copy))
						{
						$query_num_rows = mysql_num_rows($query_run);
							if($query_num_rows==0)
									echo "NO MATCH! QUERY ERROR";
							else
								{
								global $Fname,$Lname;
								$Fname = mysql_result($query_run,0,'Fname');
								$Lname= mysql_result($query_run,0,'Lname');
								
								}
						
						}
						else echo "QUERY ERROR 0";
					
					
					}
				  else
					;
				}
	
	if(isset($_POST["Company"]) &&!empty($_POST["Company"]))
   {$flag=1;
      $Company=  $_POST["Company"];
     $query .= " `Cname`='$Company' and";
	}
	if(isset($_POST["Year"]) &&!empty($_POST["Year"]))
   {$flag=1;
      $Year=  $_POST["Year"];
     $query .= " `Year`='$Year' and";
	}
	if(isset($_POST["Title"]) &&!empty($_POST["Title"]))
   {$flag=1;
      $Title=  $_POST["Title"];
     $query .= " `Title`='$Title' and";
	}
	if($flag==1)$query=substr($query,0,(strLen($query)-4));
	if($temp==$query && $flag==0)
	 { echo "<h3>Select some data!";
	 }
	else
	  {
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
								if(isset($_POST["CHCompany"]))echo "<th>Company</th>";
								if(isset($_POST["CHYear"]))echo "<th>Year</th>";
								if(isset($_POST["CHTitle"]))echo "<th>Title</th>";
								if(isset($_POST["CHSpec"]))echo "<th>Specialisation</th>";
								if(isset($_POST["CHAchvmt"]))echo "<th>Achievements</th></b>";
						
				while ($row = mysql_fetch_array($query_run)){
					   echo "<tr>";
					   if(isset($_POST["CHUSN"]))echo "<td>".$row['USN']."</td>";
					   if(isset($_POST["CHFname"]))
					   {
								    
							       $q = "SELECT * FROM `alumni` WHERE `USN`='".$row['USN']."'";
								   $res = mysql_query($q);
								   global $Fname ;
								   $Fname= mysql_result($res,0,'Fname');
   								         echo "<td>".$Fname."</td>";
									
						}
					   if(isset($_POST["CHLname"]))
					   {
								    
							       $q = "SELECT * FROM `alumni` WHERE `USN`='".$row['USN']."'";
								   $res = mysql_query($q);
								   global $Lname;
								   $Lname= mysql_result($res,0,'Lname');
   								         echo "<td>".$Lname."</td>";
									
						}
					   if(isset($_POST["CHCompany"]))echo "<td>".$row['Cname']."</td>";
					   if(isset($_POST["CHYear"]))echo "<td>".$row['Year']."</td>";
					   if(isset($_POST["CHTitle"]))echo "<td>".$row['Title']."</td>";
					   if(isset($_POST["CHSpec"]))echo "<td>".$row['Specialisation']."</td>";
					   if(isset($_POST["CHAchvmt"]))echo "<td>".$row['Achievements']."</td>";
						echo "</tr>";
				}
				echo "</table>";
					include 'FFFFF.php';
			}		
		}
		else
			echo "Query error";
	}
}
else if(!loggedin())
{
echo "You are not logged in: <a href=\"signin.php\">Sign in</a>";
die();
}
?>