<?php
require 'core.php';
require 'connect.php';

$Fest = $_SESSION["fest"];

$year = $_SESSION["batch"];
$query ="SELECT * FROM `alumni` WHERE `YOJ`= '$year'";
if($query_run = mysql_query($query))
{
	   $query_num_rows = mysql_num_rows($query_run);
			if($query_num_rows ==0)
				echo "<BR><h3>No result found!!!";
			else
			{   
							   echo "<center><br>Invitee List of Batch ".$year."<br>";
								echo "<center>";
								echo "<table CELLPADDING=10 border =1 ><b>";
								echo "<th>Mail address </th>";
								echo "<th>Mail info</th>";
								echo "<th>Mail status</th>";
            
			
			   $q = "SELECT * FROM `rvce` WHERE `Festno`= '$Fest'";
			   if($r =mysql_query($q))
			    {
			       $Eventname = mysql_result($r,0,'Eventname');
				   $Details = mysql_result($r,0,'Details');
				   $Date = mysql_result($r,0,'Date');
				 
			   
						while($row = mysql_fetch_array($query_run))
						{
						echo "<tr>";
						$USN = $row['USN'];
						 $q = "SELECT `Mail` FROM `curr_address` WHERE `USN`= '$USN'";
						 $res  =mysql_query($q);
						 $mail= mysql_result($res,0,'Mail');

						   $to = $mail;
							$subject = $Eventname;
							$message = "Hello,".$Details." on date = ".$Date;
							echo "<td>".$mail."</td>";
							echo "<td>".$message."</td>";
							$from = "admin@rvcealumni.in";
							$headers = "From:" . $from;
							if(mail($to,$subject,$message,$headers))
							echo "<td>"."Success"."</td>";
							else echo "<td>"."Failure"."</td>";
								 
									echo "</tr>";
							}
							echo "</table>";
				}
				else echo "Query error";
			 }
			 
			 echo "<a href='welcome2.php'>Back</a>";

}
else echo "QUERY ERROR";
?>