<?php
require 'core.php';
require 'connect.php';

$year = $_SESSION["batch"];
//echo $_SESSION["Fest"];
$_SESSION["fest"]= $_SESSION["Fest"];
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
								echo "<th>USN</th>";
								echo "<th>FirstName</th>";
								echo "<th>LastName</th>";
								echo "<th>Mail</th>";

			while($row = mysql_fetch_array($query_run))
			{
			$USN = $row['USN'];
			 $q = "SELECT `Mail` FROM `curr_address` WHERE `USN`= '$USN'";
			 $res  =mysql_query($q);
			 $mail= mysql_result($res,0,'Mail');

					   echo "<tr>";
					   echo "<td>".$row['USN']."</td>";
					    echo "<td>".$row['Fname']."</td>";
						 echo "<td>".$row['Lname']."</td>";
						  echo "<td>".$mail."</td>";
					  
						echo "</tr>";
				}
				echo "</table>";
			 }
			 
			 echo "<a href='mail.php'>Send mail</a>";

}
else echo "QUERY ERROR";

?>