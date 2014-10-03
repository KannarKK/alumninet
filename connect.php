<?php
$host=  "localhost";
$user ="root";
$pass = "";
$db= "ads";

if(!@mysql_connect($host,$user,$pass) || !@mysql_select_db($db))
 die(mysql_error());


?>