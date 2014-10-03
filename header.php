
<?php 	
//index.php
require 'core.php';
require 'connect.php';
if(loggedin())
{  $name= getfield("name");

  echo "You are logged in".$name."<br>";
  echo "<a href ='logout.php'>Log out</a>";

}
else
  include 'login.php';
  // header('Location:try.php');
echo md5('alex');
//session_destroy();
?>