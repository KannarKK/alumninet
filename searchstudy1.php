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
{
  $Fname='';
  $Lname='';
  $USN='';
  $sub_flag=1;
  $sub_query = "SELECT * FROM `alumni` WHERE";
 
  if(isset($_POST["USN"]) && !empty($_POST["USN"]))
  { 
  //if USN is set, execute $sub_query to get the alumni info
  //check if First name or lname is given to cross check with USN, if correct proceed else, die()
   global $USN; 
   $USN = $_POST["USN"];
   
   $sub_query.=" `USN` = '$USN' and";
   $sub_flag=1;
   $nameflag=0;
   if(isset($_POST["Fname"]) && !empty($_POST["Fname"]))
    { $nameflag=1;
	  $Fname = $_POST["Fname"];
	  $sub_query.=" `Fname` ='$Fname' and";
	}
	if(isset($_POST["Lname"]) && !empty($_POST["Lname"]))
    { $nameflag=1;
	  $Lname = $_POST["Lname"];
	  $sub_query.=" `Lname` ='$Lname' and";
	}
	$sub_query=substr($sub_query,0,(strlen($sub_query)-4));
	//echo $sub_query;
	if($query_run=mysql_query($sub_query))
	  {
	         $query_num_rows = mysql_num_rows($query_run);
			if($query_num_rows ==0)
				{ 
				echo "<BR><script>alert('No result found!!! The combination of USN and Fname(/)Lname doesnt exist.Retry')</script> ";
				echo "<a href ='searchstudy.php'><div align ='center'><h3>Retry?</h3></div></a>";
				die();
				}
		//now we have cross verified FName and Lname with this.	 
	  }
	  else {echo "QUERY ERROR 0"; }
	  //as of now,even if Fname and Lname coexist with USN, they are correct and can be used for the search results
    
	//now there is a possibility that both FName and Lname are not set, but user has asked for it! then we have to retreive it
		if(($nameflag==0)&& (isset($_POST["CHFname"])||isset($_POST["CHLname"])))
		{
			if($query_run=mysql_query($sub_query))
			{
			 $query_num_rows = mysql_num_rows($query_run);
			if($query_num_rows !=0)
				{ 
				global $Fname,$Lname;
				if(isset($_POST["CHFname"]))$Fname  =mysql_result($query_run,0,'Fname');
				if(isset($_POST["CHLname"]))$Lname  =mysql_result($query_run,0,'Lname');
				}
			
			}
			else echo "Query error 4";
		}
	
	
	}
	 else
	 {
	 //USN is not set.... check if any of the other variable "COLLEGE", "STREAM" "TYPE " are set.
	 //if Fname or Lname are set, retreive USN and use it.
		 $sub_query = "SELECT * FROM `alumni` WHERE";	
		 $sub_flag=0;
		if(isset($_POST["Fname"]) && !empty($_POST["Fname"]))
		{ $sub_flag=1;
		  $Fname = $_POST["Fname"];
		  $sub_query.=" `Fname` ='$Fname' and";
		}
		if(isset($_POST["Lname"]) && !empty($_POST["Lname"]))
		{ $sub_flag=1;
		  $Lname = $_POST["Lname"];
		  $sub_query.=" `Lname` ='$Lname' and";
		}
		if($sub_flag==1)
     	{	
			$sub_query=substr($sub_query,0,(strlen($sub_query)-4));
		// echo $sub_query;
		 if($query_run=mysql_query($sub_query))
		  {
				 $query_num_rows = mysql_num_rows($query_run);
				if($query_num_rows ==0)
					{ 
					echo "<BR><script>alert('No result found!!! No such person exists!.Retry')</script> ";
					echo "<a href ='searchstudy.php'><div align ='center'><h3>Retry?</h3></div></a>";
					die();
					}
			//now we have checked if a person with FNAMe and LNAme exists.. now retrieve the USN	 
				else
				{
				global $Fname,$Lname,$USN;
				$Fname= mysql_result($query_run,0,'Fname');
				$Lname= mysql_result($query_run,0,'Lname');
				$USN= mysql_result($query_run,0,'USN');
				}
		  } 
		  else {echo "QUERY ERROR 1"; }
		  }
		 }
  
   //now all global variables are set.. all we have to check now is combinations of the above and company etc...
   $flag=0;
  $query = "SELECT * FROM `higherstudies` WHERE";
  $temp = $query;
  $nameflag=0;
  if($USN!='')
     { 
	   $flag=1;
	   $query.=" `USN` = '$USN' and";
	 }
	if(isset($_POST["College"]) && !empty($_POST["College"]))
		{ $flag=1;
		  $College = $_POST["College"];
		  $query.=" `College` ='$College' and";
		}
	if(isset($_POST["Stream"]) && !empty($_POST["Stream"]))
		{ $flag=1;
		  $Stream = $_POST["Stream"];
		  $query.=" `Substream` ='$Stream' and";
		}
	if(isset($_POST["Course"]) && !empty($_POST["Course"]))
		{ 
		  $Courseval= $_POST["Course"];
		  switch($Courseval)
		  {
		  case 1: $flag=1;$Course = 'MBA';$query.=" `Type` ='$Course' and"; break;
		  case 2: $flag=1;$Course = 'MS';$query.=" `Type` ='$Course' and"; break;
		  case 3: $flag=1;$Course = 'MTech.';$query.=" `Type` ='$Course' and"; break;
		  case 4: $flag=1;$Course = 'PhD.';$query.=" `Type` ='$Course' and"; break;
		  }
		}
		
		//again there is a possibilitit that FName and Lname are not found but they have asked for it.. then we perform below operations
	if($flag==1)
     	{	
			$query=substr($query,0,(strlen($query)-4));
		    //echo $query;
			if($query_run=mysql_query($query))
	        {
			   $query_num_rows = mysql_num_rows($query_run);
			    if($query_num_rows ==0)
						echo "<BR><script>alert('No result found!!!')</script>";
				else
				{
					 echo "<center><br>RESULT of search <br>";
					  echo "<center>";
								echo "<table CELLPADDING=10 border =1 >";
								if(isset($_POST["CHUSN"]))echo "<th>USN</th>";
								if(isset($_POST["CHFname"]))echo "<th>FirstName</th>";
								if(isset($_POST["CHLname"]))echo "<th>LastName</th>";
								if(isset($_POST["CHCollege"]))echo "<th>College</th>";
								if(isset($_POST["CHCourse"]))echo "<th>Course</th>";
								if(isset($_POST["CHStream"]))echo "<th>Stream</th>";
								if(isset($_POST["CHYear"]))echo "<th>Year of Joining</th>";
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
							   if(isset($_POST["CHCollege"]))echo "<td>".$row['College']."</td>";
							   if(isset($_POST["CHStream"]))echo "<td>".$row['Substream']."</td>";
							   if(isset($_POST["CHCourse"]))echo "<td>".$row['Type']."</td>";
							   if(isset($_POST["CHYear"]))echo "<td>".$row['Year']."</td>";
								echo "</tr>";
						}
						echo "</table>";		
			    }		
		    }
		    else
			  echo "Query error";
  	    }
	else
	  echo "Enter atleast one search feature";
     
  
   
}
else if(!loggedin())
{
echo "You are not logged in: <a href=\"signin.php\">Sign in</a>";
die();
}
?>