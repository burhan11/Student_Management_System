<?php
$db=mysql_connect('','941202','burhan786');
if(!$db)
	die("Could not Connect :".mysql_error());
$db_select=mysql_select_db("Sms",$db);
if(!$db_select)
	die("Could not Connect :".mysql_error());

?>