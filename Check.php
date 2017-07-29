<?php
session_start();
if(isset($_GET['nm'])){
			session_destroy();
			require 'index.php';
			die();
		}
require 'Connection.php';
$id=$_POST["username"];
$pass=$_POST["pass"];
 $p=md5($pass);	
$query="SELECT * FROM `Login` WHERE `Login Id`='$id' AND `Password`='$p'";
if($result=mysql_query($query))
{
	$query_row=mysql_fetch_assoc($result);
	 $cat=$query_row['Category'];
 $query_num_rows=mysql_num_rows($result);
if($query_num_rows==0){
	echo "Invalid Id/password";
	require 'index.php';
}
else if($query_num_rows==1)
{
	$user_id=mysql_result($result,0,'Login Id');
	//$ps=mysql_result($result,0,'Password');
		$_SESSION['user_id']=$user_id;
	 $_SESSION['cat']=$cat;
}
else echo mysql_error();
}


	if($cat=="Admin"){
		include 'Admin.php';
	}			
	else if($cat=="Student"){
	require 'Loginstud1.php';
	}	
	else if($cat=="Faculty")
	require 'LoginFaculty.php';
	else echo mysql_error();
?>