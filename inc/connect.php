<?php
$localhost = "your localhost name";
$username = "your username";
$password = "your password";
$connect = mysql_connect($localhost, $username, $password);
if(! $connect ){
  die('Could not connect: ' . mysql_error());
} 
?>