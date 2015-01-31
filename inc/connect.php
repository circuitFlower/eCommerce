<?php
$localhost = 'localhost';
$username = 'root';
$password = 'root';
$connect = mysql_connect($localhost, $username, $password);
if(! $connect ){
  die('Could not connect: ' . mysql_error());
} 
?>