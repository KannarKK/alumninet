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
   $query = "SELECT * FROM `curr_address` WHERE";
   $flag=0;
   $true=0;
   $Fname ='';
   $Lname='';
   $USN='';
   $Dept='';
   $sub_flag=1;
   $sub_query = "SELECT * FROM `alumni` WHERE";
//if USN is set..get the details by using USN.
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
			$sub_query .= " `Dept`='$Dept' and";
			 $nameflag=1;
		}
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
		if(($nameflag==0)&& (isset($_POST["CHname"])))
		{
			if($query_run=mysql_query($sub_query))
			{
			 $query_num_rows = mysql_num_rows($query_run);
			if($query_num_rows !=0)
				{ 
				global $Fname,$Lname;
				if(isset($_POST["CHname"]))
										{$Fname  =mysql_result($query_run,0,'Fname');
									      $Lname  =mysql_result($query_run,0,'Lname');
										  }
				}
			
			}
			else echo "Query error 4";
		}
	
	
	}
	else
	{
	 //USN is not set.... check if any of the other variable "CITY", "DEPT" are set.
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
							$sub_flag=1;
							$sub_query.=" `Dept` ='$Dept' and";
				        }
					}
		//result of append of Fname,Lname and City
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
				//echo $USN.$Fname.$Lname;
				}
		  } 
		  else {echo "QUERY ERROR 1"; }
	    }
    }
//else in any case use the other details
  $flag=0;
  $query = "SELECT * FROM `curr_address` WHERE";
  $temp = $query;
  $nameflag=0;
  if($USN!='')
     { 
	   $flag=1;
	   $query.=" `USN` = '$USN' and";
	 }
	if(isset($_POST["City"]) && !empty($_POST["City"]))
		{ $flag=1;
		  $City = $_POST["City"];
		  $query.=" `City` ='$City' and";
		}
	 if(isset($_POST["USN"]) && isset($_POST["City"]) && isset($_POST["Fname"])&& isset($_POST["Lname"])&& isset($_POST["Dept"])
            	 && empty($_POST["Fname"])&& empty($_POST["USN"])&& empty($_POST["City"])&& empty($_POST["USN"]) && !empty($_POST["Dept"] ))
				 $flag=0; //only Department was set
	
    if($flag==1)
     	{	
			$query=substr($query,0,(strlen($query)-4));
		    //echo $query;
			if	($query_run=mysql_query($query))
	        {
			   $query_num_rows = mysql_num_rows($query_run);
			    if($query_num_rows ==0)
						echo "<BR><script>alert('No result found!!!')</script>";
				else
				{	  
				   //check if DEPT field is set, then retreive only those with the specific department
					 if(isset($_POST["Dept"]) &&!empty($_POST["Dept"]))
			       {       
					  $Dt=  $_POST["Dept"];
					  if($Dt!=0)
						{   global $Dept;
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
						}
				    }
							   
								 echo "<center><br>RESULT of search <br>";
								  echo "<center>";
								echo "<table CELLPADDING=10 border =1 >";
								if(isset($_POST["CHUSN"]))echo "<th>USN</th>";
								if(isset($_POST["CHname"]))echo "<th>Name</th>";
								if(isset($_POST["CHDept"])) echo "<th>Dept</th>";
								if(isset($_POST["CHCAddr"]))echo "<th>Current Address</th>";
								if(isset($_POST["CHPAddr"]))echo "<th>Permanent Address</th>";
								if(isset($_POST["CHmail"]))echo "<th>Mail id</th>";
								
								
						while ($row = mysql_fetch_array($query_run))
						{
							   echo "<tr>";
							   if(isset($_POST["CHUSN"]))echo "<td>".$row['USN']."</td>";
							   if(isset($_POST["CHname"]))
							      {
								    
							       $q = "SELECT * FROM `alumni` WHERE `USN`='".$row['USN']."'";
								   $res = mysql_query($q);
								   global $Fname ,$Lname,$Dept;
								   $Fname= mysql_result($res,0,'Fname');
								   $Lname= mysql_result($res,0,'Lname');
								   $Dept = mysql_result($res,0,'Dept');
   								         echo "<td>".$Fname.' '.$Lname."</td>";
									
									}
									
								 //to get the permanent address of the specified USN...
								 
								 $q = "SELECT * FROM `perm_address` WHERE `USN`= '".$row['USN']."'";
								 $res  =mysql_query($q);
								 $prow= mysql_fetch_array($res);
							   if(isset($_POST["CHDept"]))
											echo "<td>".$Dept."</td>";
							   if(isset($_POST["CHCAddr"]))echo "<td>".$row['Houseno'].','.$row['Street'].','.$row['City'].','.$row['State'].','.$row['Country'].','.$row['Zip'].'<br><br>Phone:&nbsp;&nbsp;&nbsp;'.$row['Mobile']."</td>";
							    if(isset($_POST["CHPAddr"]))echo "<td>".$prow['Houseno'].','.$prow['Street'].','.$prow['City'].','.$prow['State'].','.$prow['Country'].','.$prow['Zip'].'<br><br>Phone:&nbsp;&nbsp;&nbsp;'.$prow['Phone']."</td>";
							  
							   if(isset($_POST["CHmail"]))echo "<td>".$row['Mail']."</td>";
								echo "</tr>";
						}
						echo "</table>";		
			    }		
		    }
		    else
			  echo "Query error";
  	    }
	else
	 { 
	  
	  if(isset($_POST["USN"]) && isset($_POST["City"]) && isset($_POST["Fname"])&& isset($_POST["Lname"])&& isset($_POST["Dept"])
            	 && empty($_POST["Fname"])&& empty($_POST["USN"])&& empty($_POST["City"])&& empty($_POST["USN"]) && !empty($_POST["Dept"] ))
				{
				$flag=0; //only Department was set
				$Dt=  $_POST["Dept"];
					  if($Dt!=0)
						{   global $Dept;
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
						}
				$q = "SELECT * FROM `alumni` WHERE `Dept`='".$Dept."'";
				$res = mysql_query($q);
				
				$mail='';
				$caddr='';
				
				 echo "<center><br>RESULT of search <br>";
								  echo "<center>";
								echo "<table CELLPADDING=10 border =1 >";
								if(isset($_POST["CHUSN"]))echo "<th>USN</th>";
								if(isset($_POST["CHname"]))echo "<th>FirstName</th>";
								if(isset($_POST["CHDept"])) echo "<th>Dept</th>";
								if(isset($_POST["CHCAddr"]))echo "<th>Current Address</th>";
								if(isset($_POST["CHPAddr"]))echo "<th>Permanent Address</th>";
								if(isset($_POST["CHmail"]))echo "<th>Mail id</th>";
				
				while ($row = mysql_fetch_array($res))
				{ 
				$USN = $row['USN'];
				$name =$row['Fname'].' '.$row['Lname'] ;
				$mail='';
				$caddr='';
				$paddr='';
				
				if(isset($_POST["CHCAddr"]))
					{
					   $query = "SELECT * FROM `curr_address` WHERE `USN`='$USN'";
					   $query_run =mysql_query($query);
					   $r =mysql_fetch_array($query_run);
					   $caddr = $r['Houseno'].','.$r['Street'].','.$r['City'].','.$r['State'].','.$r['Country'].','.$r['Zip'].'<br><br>Phone:&nbsp;&nbsp;&nbsp;'.$r['Mobile'];
					   if(isset($_POST["CHmail"]))
						   $mail =$r['Mail'];
						
					   }
				if(isset($_POST["CHPAddr"]))
					{
					 $query = "SELECT * FROM `perm_address` WHERE `USN`='$USN'";
					   $query_run =mysql_query($query);
					   $r =mysql_fetch_array($query_run);
					   $paddr = $r['Houseno'].','.$r['Street'].','.$r['City'].','.$r['State'].','.$r['Country'].','.$r['Zip'].'<br><br>Phone:&nbsp;&nbsp;&nbsp;'.$r['Phone'];
					   
					}
					 echo "<tr>";
							   if(isset($_POST["CHUSN"]))echo "<td>".$USN."</td>";
							   if(isset($_POST["CHname"]))
							      
   								         echo "<td>".$name."</td>";
									
								
									
								 
							   if(isset($_POST["CHDept"]))
											echo "<td>".$Dept."</td>";
							   if(isset($_POST["CHCAddr"]))echo "<td>".$caddr."</td>";
							    if(isset($_POST["CHPAddr"]))echo "<td>".$paddr."</td>";				  
							   if(isset($_POST["CHmail"]))echo "<td>".$mail."</td>";
								echo "</tr>";
				
				
				}
				echo "</table>";
				
				}
	  else
	  echo "Enter atleast one search feature";
	 }
}
else if(!loggedin())
{
echo "You are not logged in: <a href=\"signin.php\">Sign in</a>";
die();
}
?>
