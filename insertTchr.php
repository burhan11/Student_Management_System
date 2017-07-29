<?php
$db=mysql_connect('localhost','root','');
if(!$db)
	die("Could not connect:".mysql_error());
$db_select=mysql_select_db('sms',$db);
if(!$db_select)
	die("could not connect:".mysql_error());
$name=$_POST["username"];
$fname=$_POST["Fname"];
$mname=$_POST["Mname"];
$gen=$_POST["gen"];
$rdate=$_POST["date"];
$dob=$_POST["dob"];
$Tadd=$_POST["tad"];
$Padd=$_POST["pad"];
$Mob=$_POST["mob"];
$email=$_POST["email"];
$Pin=$_POST["pin"];
$city=$_POST["city"];
$state=$_POST["state"];
$relign=$_POST["relig"];
$category=$_POST["cat"];
$UG=$_POST["UG"];
$PG=$_POST["PG"];
$dept=$_POST["dept"];
$clgnm=$_POST["clgname"];
$per=$_POST["per"];
$exp=$_POST["expe"];
$lst=$_POST["center"];
$count=0;
$query="SELECT `Count ID` FROM `Login` WHERE `Category`='Faculty'";
$result=mysql_query($query);
while($query_row=mysql_fetch_assoc($result)){
	$count=0+$query_row['Count ID'];
}
$FacultyID=$dept.(++$count+500);
$query = "INSERT INTO `teacher`(`Faculty Id`, `Name`, `Father's name`, `Mother's name`, `Gender`, `Date`, `DOB`, `Temporary Address`, `Permanent Address`, `Mob`, `Email Id`, `Pin code`, `City`, `State`, `Religion`, `Category`, `UG`, `PG`, `Teaching Dept.`, `Graduation collage`, `Percentage`, `Teaching experiance`, `Last teaching institute`)VALUES('$FacultyID','$name','$fname','$mname','$gen','$rdate','$dob'	,'$Tadd','$Padd','$Mob','$email',$Pin,'$city','$state','$relign','$category','$UG','$PG','$dept','$clgnm',$per,$exp,'$lst')";
	$result=mysql_query($query);
$pass=md5("fac@123");
$cat="Faculty";
$query="INSERT INTO `login`(`Count ID`,`Login Id`,`Password`,`Category`,`Branch`) VALUES ('$count','$FacultyID','$pass','$cat','$dept')";
$result=mysql_query($query);
if($result){
	echo "Correct";
	require 'Admin.php';
}
else 
echo mysql_error();
?>