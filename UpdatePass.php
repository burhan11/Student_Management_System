<?php
require 'Connection.php';
if(isset($_POST['pass'])){
  $ps=$_POST['pass'];
  $id=$_POST['enroll'];
  $pass=md5($ps);
}
else{
	echo "Password field is not empty";
}
$query="UPDATE `Login` SET `Password`='$pass' WHERE `Login Id`='$id'";
$result=mysql_query($query); 

if($result)
{
	echo "Password changed successfully";
	include 'index.php';
}
