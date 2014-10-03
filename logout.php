<?php
require 'core.php';
echo $http_referer;
session_destroy();
header('Location:signin.php');
?>