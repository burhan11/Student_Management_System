<?php
require "Connection.php";
$name=$_POST["username"];
$fname=$_POST["Fname"];
$mname=$_POST["Mname"];
$gen=$_POST["gen"];
$rdate=$_POST["date"];
$dob=$_POST["dob"];
$Tadd=$_POST["tad"];
$Padd=$_POST["pad"];
$MP=$_POST["MP"];
$Mob=$_POST["mob"];
$email=$_POST["email"];
$Pin=$_POST["pin"];
$city=$_POST["city"];
$state=$_POST["state"];
$relign=$_POST["relig"];
$category=$_POST["cat"];
$course=$_POST["course"];
$branch=$_POST["branch"];
$board=$_POST["board"];
$per10=$_POST["ten"];
$per12=$_POST["twel"];
$sem=1;
$count=0;
$query="SELECT `Count ID` FROM `Login` WHERE `Category`='Student'";
$result=mysql_query($query);
while($query_row=mysql_fetch_assoc($result)){
	$count=$query_row['Count ID'];
}
$EnrollId="0801".$branch.(++$count+100);
echo $EnrollId;
echo $branch;
	$query="INSERT INTO `$branch student`(`Enrollment No`,`Name`,`Father's name`,`Mother's name`,`Gender`,`Date`,`DOB`,`Temporary Address`,`Permanent Address`,`MP Domicile`,`Mob`,`Email Id`,`Pin code`,`City`,`State`,`Religion`,`Category`,`Semester`,`Course name`,`Branch name`,`School board`,`10th percentage`,`12th percentage`)VALUES('$EnrollId','$name','$fname','$mname','$gen','$rdate','$dob','$Tadd','$Padd','$MP','$Mob','$email',$Pin,'$city','$state','$relign','$category','$sem','$course','$branch','$board',$per10,$per12)";
$result=mysql_query($query);
if($result){
		$pass="abc123";
		$p=md5($pass);
		$cat="Student";
		$query="INSERT INTO `login`(`Count ID`,`Login Id`, `Password`, `Category`,`Branch`) VALUES ('$count','$EnrollId','$p','$cat','$branch')";
		$result=mysql_query($query);
	if($result){
		echo "Your login id and temperory password<br/>ID = ".$EnrollId."<br/>PASSWORD = ".$pass."<br/>Please take a note of it";
			require 'Admin.php';
	}
else {
	echo "Duplicate entry for primary key is not allowed";
	}
//$q="INSERT INTO `Attendance` (`Enrollment No`,`Name`,`Branch`)VALUES('$EnrollId','$name','$branch')";
//$res=mysql_query($q);
//if(!$res)
//	echo mysql_error();
}
else echo mysql_error();
?>
