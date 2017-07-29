<!-- Update Student -->
<?php

session_start();
if(isset($_SESSION["user_id"]) && $_SESSION["cat"]=="Admin" )
{
if(isset($_POST["up"]))
{
		require "Connection.php";
		echo $id=$_POST["id"];
		$name=$_POST['nm'];
		$fname=$_POST['Fname'];
		$mname=$_POST['Mname'];
		$gen=$_POST['gen'];
		$rdate=$_POST['date'];
		$dob=$_POST['dob'];
		$Tadd=$_POST['tad'];
		$Padd=$_POST['pad'];
		$MP=$_POST['MP'];
		$Mob=$_POST['mob'];
		$email=$_POST['email'];
		$Pin=$_POST['pin'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$relign=$_POST['relig'];
		$category=$_POST['cat'];
		$course=$_POST['course'];
		$branch=$_POST['branch'];
		$board=$_POST['board'];
		$per10=$_POST['ten'];
		$per12=$_POST['twel'];
		$EnrollId=$branch;
		 $EnrollId;
		 $branch;
		$query="UPDATE `$branch student` SET `Name`='$name',`Father's name`='$fname',`Mother's name`='$mname',`Gender`='$gen',`Date`='$rdate',`DOB`='$dob',`Temporary Address`='$Tadd',`Permanent Address`='$Padd',`MP Domicile`='$MP',`Mob`='$Mob',`Email Id`='$email',`Pin code`='$Pin',`City`='$city',`State`='$state',`Religion`='$relign',`Category`='$category',`Course name`='$course',`Branch name`='$branch',`School board`='$board',`10th percentage`='$per10',`12th percentage`='$per12' WHERE `Enrollment No`='$id'";
		$result=mysql_query($query);
		if($result)
		{
			echo "Record is Updated";
		//	require "Admin.php";
		//	die();
		}
		else{
			echo mysql_error();
		}

}
?>

<?php
if(isset($_POST["edit"])&&isset($_POST["br"])&&isset($_POST["nm"])){
require "Connection.php";
$br=$_POST['br'];
$nm=$_POST['nm'];
$id=$_POST["enid"];
$query="SELECT * FROM `$br student` WHERE `Enrollment No`='$id'";
$result=mysql_query($query);
if($result)
{				
$query_row=mysql_fetch_assoc($result);
			$id=$query_row['Enrollment No'];
			$name=$query_row['Name'];
			$fname=$query_row["Father's name"];
			$mname=$query_row["Mother's name"];
			$gen=$query_row['Gender'];
			$rdate=$query_row['Date'];
			$dob=$query_row['DOB'];
			$Tadd=$query_row['Temporary Address'];
			$Padd=$query_row['Permanent Address'];
			$MP=$query_row['MP Domicile'];
			$Mob=$query_row['Mob'];
			$email=$query_row['Email Id'];
			$Pin=$query_row['Pin code'];
			$city=$query_row['City'];
			$state=$query_row['State'];
			$relign=$query_row['Religion'];
			$category=$query_row['Category'];
			$course =$query_row['Course name'];
			$branch=$query_row['Branch name'];
			$board=$query_row['School board'];
			$per10=$query_row['10th percentage'];
			$per12=$query_row['12th percentage'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Student-Registration Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="default.css"/>
    </head>
    <body>    
        <form action="Admin.php" method="post" class="register">
            <h1>Enrolled Id:<?php echo $id; ?></h1>
            <fieldset class="row2">
                <legend>Personal Details
                </legend>
                <p>
                    <label>Name 
                    </label>
                    <input type="text" name="nm" value="<?php echo $name; ?>" class="long"/>
                </p>
                <p>
                    <label>Father's Name
                    </label>
                    <input type="text" name="Fname" value="<?php echo $fname; ?>" placeholder="Enter Father`s name" class="long"/>
                </p>
                <p>
                    <label>Mother'sName
                    </label>
                    <input type="text" name="Mname" value="<?php echo $mname; ?>" placeholder="Enter Mother`s name" class="long"/>
                </p>
                <p>
                    <label>Email Id
                    </label>
                    <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter email" class="long"/>
                </p>
                <p>
                    <label>Phone No.
                    </label>
                     <input type="tel" name="mob" value="<?php echo $Mob; ?>" placeholder="Enter Contact no." maxlength="12"/>
                </p>
                <p>
                    <label>Temporary Add
                    </label>
                    <input class="long" type="text" name="tad" value="<?php echo $Tadd; ?>" />

                </p>
				<p>
                    <label>Permanent Add
                    </label>
                    <input class="long" type="text" name="pad" value="<?php echo $Padd; ?>" placeholder="Enter Permanent address"/>

                </p>
            </fieldset>
			
			
            <fieldset class="row3">
                <legend>Further Information
                </legend>
				<p>
				<label>Registration date:</label><input type="date" name="date" value="<?php echo $rdate; ?>"/>
				</p>
				<p>
                    <label>Gender</label>
                    <input type="radio" name="gen" value="male"/>Male
					<input type="radio" name="gen" value="female"/>Female 
				</p>
                <p>
                    <label>Date of Birth 
                    </label><input type="date" name="dob" value="<?php echo $dob; ?>"/>
				</p>
                <p>
                    <label>City 
                    </label>
                    
                    <input  type="text" name="city" placeholder="Enter City" value="<?php echo $city; ?>"  maxlength="10"/>
                </p>
                <p>
                    <label>Pincode
                    </label>
                    <input type="text" name="pin" placeholder="Enter Pincode" value="<?php echo $Pin; ?>" value="" />
                </p>
                <p>
                    <label>State
                    </label>
                    <input type="text" name="state" placeholder="Enter state" value="<?php echo $state; ?>"/>
                </p>
				<p><label>MP Domicile:</label>
					<input type="radio" name="MP" value="Yes"/>Yes
					<input type="radio" name="MP" value="No"/>No
				</p>
				<p>
                    <label>Category
                    </label>
                    <select name="cat">
		<option value="Select">Select</option>
		<option value="Gen">General</option>
		<option value="OBC-NCL">OBC-NCL</option>
		<option value="SC">SC</option>
		<option value="ST">ST</option>
					</select>
                </p>
				<p>
                     <label>Religion
                    </label>
                    <input type="text" value="<?php echo $relign; ?>" placeholder="Enter Religion" name="relig"/>
                </p>
            </fieldset>
		
<fieldset class="row1">
                <legend>Academic Details
                </legend>
                <p>
                    <label>Class 10th % 
                    </label>
                    <input type="text" value="<?php echo $per10; ?>" placeholder="Percentage" name="ten" size="5"/>
                    <label>Course
                    </label>
                    <select name="course">
						<option value="Select">Select</option>
						<option value="BE">BE</option>
					</select>
                </p>
                <p>
			       <label>Class 12th %
                    </label>
                  <input type="text" value="<?php echo $per12; ?>" placeholder="Percentage" name="twel" size="5"/>  
				  <label>Branch</label>
                    <select name="branch">
						<option value="Select">Select</option>
						<option value="CS">Computer Science</option>
						<option value="IT">Information Tech</option>
						<option value="CE">Civil Engg</option>
						<option value="ME">Mechenical Engg</option>
						<option value="EC">Electrical</option>
						<option value="IP">Idustrial Production</option>
						<option value="EI">Electronics</option>
					</select>
                </p>
				<p>
                    <label>School Board Name 
                    </label><input type="text" value="<?php echo $board; ?>"  name="board" size="30"/>
                </p>
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Conditions
                </legend>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>I accept the <a href="#">Terms and Conditions</a></label>
                </p>
            </fieldset>
			<input type="hidden" name="up"/>
            <input type="hidden" name="id" value="<?php echo $id;?>" />
            <input type="hidden" name="branch" value="<?php echo $branch;?>" />
            <input type="hidden" name="hidden" value="hidden" />
		<div><button class="button">Register &raquo;</button></div>
        </form>
    </body>
</html>

<?php
}
else echo mysql_error();
die();
}
?>
<!--Update end -->


<?php
if(isset($_POST["branch"])&& isset($_POST["hidden"]))
{
?>
<html>
<head>

<style>
	#body{
		display:box;
	//	width:2000px;
		//height:1000px;
		//outline:2px solid brown;	
//		background-image: url(images1/tooplate_main.png);
		background-color:blanchedalmond;
	}
	
	table{
		-webkit-transform:translate(50px,180px);
		}
	#head{
//		text-align:center;
		color:purple;
		-webkit-transform:translate(1000px,100px);		
	}
	
	#close{
		color:purple;
//		-webkit-transform:translate(100px,100px);
	}
</style>
</head>
<body id='body'>
	
<?php
require "Connection.php";
$br=$_POST["branch"];
$query="SELECT * FROM `$br student` ";
$result=mysql_query($query);
if($result)
{
?>
<div id="close"><form action="Admin.php" method="post">
	<button>Close</button>
</form>
</div>
<div class="table-responsive">
<h1 id="head" >List of Students Enrolled</h1>
<table class="table table-bordered table-hover table-condensed" width="2200" height='10'  border=2 >
		<tr class="tr"><td></td><td></td>
		<th align=center >Enrollment No</th>
		<th align=center >Name</th>
		<th align=center  >Father's name</th>
		<th align=center width='100'>Mother's name</th>
		<th align=center width='100'>Gender</th>
		<th align=center width='100'>Registration Date</th>
		<th align=center width='100'>DOB</th>
		<th align=center width='100'>Temporary Address</th>
		<th align=center width='100'>Permanent Address</th>
		<th align=center width='100'>MP Domicile</th>
		<th align=center width='100'>Mob</th>
		<th align=center width='100'>Email Id</th>
		<th align=center width='100'>Pin code</th>
		<th align=center width='100'>City</th>
		<th align=center width='100'>State</th>
		<th align=center width='100'>Religion</th>
		<th align=center width='100'>Category</th>
		<th align=center width='100'>Course name</th>
		<th align=center width='100'>Branch name</th>
		<th align=center width='100'>School board</th>
		<th align=center width='100'>10th percentage</th>
		<th align=center width='100'>12th percentage</th>
		</tr>		
<?php
			while($query_row=mysql_fetch_assoc($result))
			{
					$id=$query_row["Enrollment No"];
					$name=$query_row["Name"];
			$fname=$query_row["Father's name"];
			$mname=$query_row["Mother's name"];
			$gen=$query_row["Gender"];
			$rdate=$query_row["Date"];
			$dob=$query_row["DOB"];
			$Tadd=$query_row["Temporary Address"];
			$Padd=$query_row["Permanent Address"];
			$MP=$query_row["MP Domicile"];
			$Mob=$query_row["Mob"];
			$email=$query_row["Email Id"];
			$Pin=$query_row["Pin code"];
			$city=$query_row["City"];
			$state=$query_row["State"];
			$relign=$query_row["Religion"];
			$category=$query_row["Category"];
			$course=$query_row["Course name"];
			$branch=$query_row["Branch name"];
			$board=$query_row["School board"];
			$per10=$query_row["10th percentage"];
			$per12=$query_row["12th percentage"];
?>	
<tr><td align=center width='100'>
<form action='Admin.php' method="post">
<input type='hidden' value="<?php echo $br;?>" name='br'/>
<input type='hidden' value="<?php echo $name;?>" name='nm'/>
<input type='hidden' value="<?php echo $id;?>" name='enid'/>
<input type="hidden"  name="edit"/>
<button>Edit</button>
</form>
</td>
<td align=center width='100'>
<form action='Admin.php' method='POST'>
<input  type='hidden' value=<?php echo $id; ?> name='id'/>
<input type="hidden" value=<?php echo $br; ?> name="br"/>
<input type="hidden" name="del" />
<button class="btn btn-primary">Delete</button>
</form>
</td>

<td align=center width='100'><?php echo $id; ?></td>
<td align=center width='100'><?php echo $name; ?></td>
<td align=center width='100'><?php echo $fname; ?></td>
<td align=center width='100'><?php echo $mname; ?></td>
<td align=center width='100'><?php echo $gen; ?></td>
<td align=center width='100'><?php echo $rdate; ?></td>
<td align=center width='100'><?php echo $dob; ?></td>
<td align=center width='100'><?php echo $Tadd; ?></td>
<td align=center width='100'><?php echo $Padd; ?></td>
<td align=center width='100'><?php echo $MP; ?></td>
<td align=center width='100'><?php echo $Mob; ?></td>
<td align=center width='100'><?php echo $email; ?></td>
<td align=center width='100'><?php echo $Pin; ?></td>
<td  align=center width='100'><?php echo $city; ?></td>
<td align=center width='100'><?php echo $state; ?></td>
<td align=center width='100'><?php echo $relign; ?></td>
<td  align=center width='100'><?php echo $category; ?></td>
<td align=center width='100'><?php echo $course; ?></td>
<td align=center width='100'><?php echo $branch; ?></td>
<td align=center width='100'><?php echo $board; ?></td>
<td align=center width='100'><?php echo $per10 ;?></td>
<td align=center width='100'><?php echo $per12; ?></td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html> 
<?php
}
die();
}
?>


<?php
if(isset($_POST["id"])&&isset($_POST["br"])&&isset($_POST["del"]))
{
	require "Connection.php";
//$brnch=$_POST["brnch"];
 $id=$_POST["id"];
 $br=$_POST["br"];
	$s="DELETE FROM `$br student` WHERE `Enrollment No`='$id'";
	$res=mysql_query($s);
	if(!$res)
		echo mysql_error();
	$s="DELETE FROM `Login` WHERE `Login Id`='$id'";
	$res=mysql_query($s);
	if(!$res)
		echo mysql_error();
?>
<html>
<head>

<style>
	#body{
		display:box;
	//	width:2000px;
		//height:1000px;
		//outline:2px solid brown;	
//		background-image: url(images1/tooplate_main.png);
		background-color:blanchedalmond;
	}
	
	table{
		-webkit-transform:translate(50px,180px);
		}
	#head{
//		text-align:center;
		color:purple;
		-webkit-transform:translate(1000px,100px);		
	}
	
	#close{
		color:purple;
//		-webkit-transform:translate(100px,100px);
	}
</style>
</head>
<body id='body'>
	
<?php
require "Connection.php";
$query="SELECT * FROM `$br student` ";
$result=mysql_query($query);
if($result)
{
?>
<div id="close"><form action="Admin.php" method="post">
	<button>Close</button>
</form>
</div>
<div class="table-responsive">
<h1 id="head" >List of Students Enrolled</h1>
<table class="table table-bordered table-hover table-condensed" width="2200" height='10'  border=2 >
		<tr class="tr"><td></td><td></td>
		<th align=center >Enrollment No</th>
		<th align=center >Name</th>
		<th align=center  >Father's name</th>
		<th align=center width='100'>Mother's name</th>
		<th align=center width='100'>Gender</th>
		<th align=center width='100'>Registration Date</th>
		<th align=center width='100'>DOB</th>
		<th align=center width='100'>Temporary Address</th>
		<th align=center width='100'>Permanent Address</th>
		<th align=center width='100'>MP Domicile</th>
		<th align=center width='100'>Mob</th>
		<th align=center width='100'>Email Id</th>
		<th align=center width='100'>Pin code</th>
		<th align=center width='100'>City</th>
		<th align=center width='100'>State</th>
		<th align=center width='100'>Religion</th>
		<th align=center width='100'>Category</th>
		<th align=center width='100'>Course name</th>
		<th align=center width='100'>Branch name</th>
		<th align=center width='100'>School board</th>
		<th align=center width='100'>10th percentage</th>
		<th align=center width='100'>12th percentage</th>
		</tr>		
<?php
			while($query_row=mysql_fetch_assoc($result))
			{
					$id=$query_row["Enrollment No"];
					$name=$query_row["Name"];
			$fname=$query_row["Father's name"];
			$mname=$query_row["Mother's name"];
			$gen=$query_row["Gender"];
			$rdate=$query_row["Date"];
			$dob=$query_row["DOB"];
			$Tadd=$query_row["Temporary Address"];
			$Padd=$query_row["Permanent Address"];
			$MP=$query_row["MP Domicile"];
			$Mob=$query_row["Mob"];
			$email=$query_row["Email Id"];
			$Pin=$query_row["Pin code"];
			$city=$query_row["City"];
			$state=$query_row["State"];
			$relign=$query_row["Religion"];
			$category=$query_row["Category"];
			$course=$query_row["Course name"];
			$branch=$query_row["Branch name"];
			$board=$query_row["School board"];
			$per10=$query_row["10th percentage"];
			$per12=$query_row["12th percentage"];
?>	
<tr><td align=center width='100'>
<form action='Admin.php' method="post">
<input type='hidden' value="<?php echo $br;?>" name='br'/>
<input type='hidden' value="<?php echo $name;?>" name='nm'/>
<input type='hidden' value="<?php echo $id;?>" name='enid'/>
<input type="hidden"  name="edit"/>
<button>Edit</button>
</form>
</td>
<td align=center width='100'>
<form action='Admin.php' method='POST'>
<input  type='hidden' value=<?php echo $id; ?> name='id'/>
<input type="hidden" value=<?php echo $br; ?> name="br"/>
<input type="hidden" name="del" />
<button class="btn btn-primary">Delete</button>
</form>
</td>

<td align=center width='100'><?php echo $id; ?></td>
<td align=center width='100'><?php echo $name; ?></td>
<td align=center width='100'><?php echo $fname; ?></td>
<td align=center width='100'><?php echo $mname; ?></td>
<td align=center width='100'><?php echo $gen; ?></td>
<td align=center width='100'><?php echo $rdate; ?></td>
<td align=center width='100'><?php echo $dob; ?></td>
<td align=center width='100'><?php echo $Tadd; ?></td>
<td align=center width='100'><?php echo $Padd; ?></td>
<td align=center width='100'><?php echo $MP; ?></td>
<td align=center width='100'><?php echo $Mob; ?></td>
<td align=center width='100'><?php echo $email; ?></td>
<td align=center width='100'><?php echo $Pin; ?></td>
<td  align=center width='100'><?php echo $city; ?></td>
<td align=center width='100'><?php echo $state; ?></td>
<td align=center width='100'><?php echo $relign; ?></td>
<td  align=center width='100'><?php echo $category; ?></td>
<td align=center width='100'><?php echo $course; ?></td>
<td align=center width='100'><?php echo $branch; ?></td>
<td align=center width='100'><?php echo $board; ?></td>
<td align=center width='100'><?php echo $per10 ;?></td>
<td align=center width='100'><?php echo $per12; ?></td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html> 
<?php
}
die();
}
?>
<!--END OF STUDENT-->




<!--Update Faculty-->
<?php
if(isset($_POST["upfac"]))
{
		require "Connection.php";
		$id=$_POST["fid"];
		$name=$_POST['username'];
		$fname=$_POST['Fname'];
		$mname=$_POST['Mname'];
		$gen=$_POST['gen'];
		$rdate=$_POST['date'];
		$dob=$_POST['dob'];
		$Tadd=$_POST['tad'];
		$Padd=$_POST['pad'];
		$Mob=$_POST['mob'];
		$email=$_POST['email'];
		$Pin=$_POST['pin'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$relign=$_POST['relig'];
		$category=$_POST['cat'];
		$UG =$_POST['UG'];
		$PG=$_POST['PG'];
		$dept=$_POST['dept'];
		$clg=$_POST['clgname'];
		$per=$_POST['per'];
		$expe=$_POST['expe'];
		$lst=$_POST['center'];
		$query="UPDATE `teacher` SET `Name`='$name',`Father's name`='$fname',`Mother's name`='$mname',`Gender`='$gen',`Date`='$rdate',`DOB`='$dob',`Temporary Address`='$Tadd',`Permanent Address`='$Padd',`Mob`='$Mob',`Email Id`='$email',`Pin code`='$Pin',`City`='$city',`State`='$state',`Religion`='$relign',`Category`='$category',`UG`='$UG',`PG`='$PG',`Teaching Dept.`='$dept',`Graduation collage`='$clg',`Percentage`='$per',`Teaching experiance`='$expe',`Last teaching institute`='$lst' WHERE `Faculty Id`='$id'";
		$result=mysql_query($query);
		if($result)
		{
			echo "Record is Updated";
		//	require "Admin.php";
		//	die();
		}
		else{
			echo mysql_error();
		}
}
?>






<?php
if(isset($_POST["ed"]) && isset($_POST["facid"]))
{
	require "Connection.php";
$id=$_POST['facid'];
$query="SELECT * FROM `teacher` WHERE `Faculty Id`='$id'";
$result=mysql_query($query);
if($result)
{				
		$query_row=mysql_fetch_assoc($result);
			$id=$query_row['Faculty Id'];
			$name=$query_row['Name'];
			$fname=$query_row["Father's name"];
			$mname=$query_row["Mother's name"];
			$gen=$query_row['Gender'];
			$rdate=$query_row['Date'];
			$dob=$query_row['DOB'];
			$Tadd=$query_row['Temporary Address'];
			$Padd=$query_row['Permanent Address'];
			$Mob=$query_row['Mob'];
			$email=$query_row['Email Id'];
			$Pin=$query_row['Pin code'];
			$city=$query_row['City'];
			$state=$query_row['State'];
			$relign=$query_row['Religion'];
			$category=$query_row['Category'];
			$UG =$query_row['UG'];
			$PG=$query_row['PG'];
			$dept=$query_row['Teaching Dept.'];
			$clg=$query_row['Graduation collage'];
			$per=$query_row['Percentage'];
			$expe=$query_row['Teaching experiance'];
			$lst=$query_row['Last teaching institute'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Teacher-Registration Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="teacherf.css"/>
    </head>
    <body>   
        <form action="Admin.php" method="post" class="register">
            <h1>Faculty Id:<?php echo $id;?></h1>
            <fieldset class="row2">
                <legend>Personal Details
                </legend>
                <p>
				
                    <label>Name 
                    </label>
                    <input type="text" name="username" value="<?php echo $name;?>" class="long"/>
                </p>
                <p>
                    <label>Father's Name
                    </label>
                    <input type="text" name="Fname" value="<?php echo $fname;?>" class="long"/>
                </p>
                <p>
                    <label>Mother's Name
                    </label>
                    <input type="text" name="Mname" value="<?php echo $mname;?>" class="long"/>
                </p>
                <p>
                    <label>Email Id
                    </label>
                    <input type="text" name="email" value="<?php echo $email;?>" class="long"/>
                </p>
                <p>
                    <label>Phone No.
                    </label>
                     <input type="text" name="mob" value="<?php echo $Mob;?>" maxlength="12"/>
                </p>
                <p>
                    <label>Temporary Add.
                    </label>
                    <input class="long" type="text" name="tad" value="<?php echo $Tadd;?>" value=""/>

                </p>
				<p>
                    <label>Permanent Add.
                    </label>
                    <input class="long" type="text" name="pad" value="<?php echo $Padd;?>" value=""/>

                </p>
            </fieldset>
            <fieldset class="row3">
                <legend>Further Information
                </legend>
				<p>
				<label>Registration date:</label><input type="date" name="date" value="<?php echo $rdate;?>"/>
				</p>

                <p>
                    <label>Gender</label>
                    <select name="gen">
						<option value="Select">Select</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
                </p>
                <p>
                    <label>Date of Birth 
                    </label><input type="date" name="dob" value="<?php echo $dob;?>"/>

                </p>
                <p>
                    <label>City 
                    </label>
                    
                    <input  type="text" name="city" value="<?php echo $city;?>" maxlength="10"/>
                </p>
                <p>
                    <label>Pincode
                    </label>
                    <input type="text" name="pin" value="<?php echo $Pin;?>" />
                </p>
				<p>
                    <label>State
                    </label>
                    <input type="text" value="<?php echo $state;?>" name="state"/>
                </p>
				<p>
                    <label>Category
                    </label>
                    <select name="cat">
		<option value="Select">Select</option>
		<option value="Gen">General</option>
		<option value="OBC-NCL">OBC-NCL</option>
		<option value="SC">SC</option>
		<option value="ST">ST</option>
</select>
                </p>
				<p>
                     <label>Religion
                    </label>
                    <input type="text" value="<?php echo $relign;?>" name="relig"/>
                </p>
                
            </fieldset>
            <fieldset class="row1">
                <legend>Academic Details
                </legend>
                <p>
                    <label>Graduation Degree
                    </label>
                    <input type="text" name="per" value="<?php echo $per;?>" placeholder="%"/>
                    <label>Under Graduation In </label>
                    <select name="UG">
						<option value="None">None</option>
						<option value="BE">BE</option>
						<option value="BTECH">BTECH</option>
						<option value="BPh">BPh</option>
						<option value="BCA">BCA</option>
						<option value="BSC">BSc</option>
					</select>
					
                </p>
				<p>
				<label>Graduation Collage name</label>
					<input type="text" name="clgname" value="<?php echo $clg;?>"/>
	
                
                    <label>Post Graduation In
                    </label>
                    <select name="PG">		
						<option value="None">None</option>
						<option value="ME">ME</option>
						<option value="MTECH">MTECH</option>
						<option value="MPh">MPh</option>
						<option value="MCA">MCA</option>
						<option value="MSc">MSc</option>
					</select>
                    </label>
					
                </p>
				<p>
					<label>Teaching Department
                    </label>
                    <select name="dept">
						<option value="Select">Select</option>
						<option value="CS">Computer</option>
						<option value="CE">Civil</option>
						<option value="ME">Mechanical</option>
						<option value="EC">Electrical</option>
						<option value="IP">Industrial Production</option>
						<option value="IT">Information Technology</option>
						<option value="EI">Electronic And Instrumentation</option>
					</select>
                    	

				</p>
					
				<p>
                    <label>Teaching Experiance
                    </label>
                    <input class="long" type="text" name="expe" value="<?php echo $expe;?>"/>

                </p>
				
				<p>
                    <label>Last Teaching Institute
                    </label>
                    <input class="long" type="text" name="center" value="<?php echo $lst;?>"/>

                </p>
            </fieldset>

			
            <fieldset class="row4">
                <legend>Terms and Conditions
                </legend>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>I accept the <a href="#">Terms and Conditions</a></label>
                </p>
            </fieldset>
			<input type="hidden" name="upfac"/>
			<input type="hidden" name="upt"/>
			<input type="hidden" name="fid" value="<?php echo $id;?>"/>
            <div><button class="button">Register &raquo;</button></div>
        </form>
    </body>
</html>
<?php
}
die();
}
?>

<!-- Update end-->

<!--Faculty-->
<?php
if(isset($_GET["id"]) || isset($_POST["upt"]) && isset($_POST["fid"]))
{
require "Connection.php";
$query="SELECT * FROM `teacher` ";
$result=mysql_query($query);
if($result)
{
?>
<html>
<head>
<style>
	#body{
		display:box;
	//	width:2000px;
		//height:1000px;
		//outline:2px solid brown;	
//		background-image: url(images1/tooplate_main.png);
		background-color:blanchedalmond;
	}
	
	table{
		-webkit-transform:translate(5%,100%);
		}
	
	#head{
//		text-align:center;
		color:purple;
		-webkit-transform:translate(1000px,100px);		
	}	
</style>
</head>
<body id="body">
<div id="close"><form action="Admin.php" method="post">
	<button>Close</button>
</form>
</div>
	 
<h1 id="head">List of Teachers</h1>
<div class="table-responsive">
	<table border=1 width="2200" height='10'>
		<tr class="tr"><td></td><td></td>
		<th align=center width='100'>Faculty Id</th>
		<th align=center width='100'>Name</th>
		<th align=center width='100'>Father's name</th>
		<th align=center width='100'>Mother's name</th>
		<th align=center width='100'>Gender</th>
		<th align=center width='100'>Registration Date</th>
		<th align=center width='100'>DOB</th>
		<th align=center width='100'>Temporary Address</th>
		<th align=center width='100'>Permanent Address</th>
		<th align=center width='100'>Mob</th>
		<th align=center width='100'>Email Id</th>
		<th align=center width='100'>Pin code</th>
		<th align=center width='100'>City</th>
		<th align=center width='100'>State</th>
		<th align=center width='100'>Religion</th>
		<th align=center width='100'>Category</th>
		<th align=center width='100'>UG</th>
		<th align=center width='100'>PG</th>
		<th align=center width='100'>Teaching Dept.</th>
		<th align=center width='100'>Graduation Collage</th>
		<th align=center width='100'>Graduation Percentage</th>
		<th align=center width='100'>Teaching experiance</th>
		<th align=center width='100'>Last Teaching Institute</th>
		</tr>					
		<?php				
			while($query_row=mysql_fetch_assoc($result))
			{
					$id=$query_row["Faculty Id"];
					$name=$query_row["Name"];
			$fname=$query_row["Father's name"];
			$mname=$query_row["Mother's name"];
			$gen=$query_row["Gender"];
			$rdate=$query_row["Date"];
			$dob=$query_row["DOB"];
			$Tadd=$query_row["Temporary Address"];
			$Padd=$query_row["Permanent Address"];
			$Mob=$query_row["Mob"];
			$email=$query_row["Email Id"];
			$Pin=$query_row["Pin code"];
			$city=$query_row["City"];
			$state=$query_row["State"];
			$relign=$query_row["Religion"];
			$category=$query_row["Category"];
			$UG=$query_row["UG"];
			$PG=$query_row["PG"];
			$dept=$query_row["Teaching Dept."];
			$clg=$query_row["Graduation collage"];
			$per=$query_row["Percentage"];
			$exp=$query_row["Teaching experiance"];
			$lst=$query_row["Last teaching institute"];
?>
<tr><td align=center width='100'>
<form action='Admin.php' method="post">
<input type='hidden' value="<?php echo $id;?>" name='facid'/>
<input type="hidden" name="ed"/>
<input class='but'  type='submit' value='Edit'/>
</form>
</td>
<td align=center width='100'>
<form action='Admin.php' method="post">
<input  type='hidden' value="<?php echo $id; ?>" name='fact'/>
<input type="hidden" value="del" name="del" />
<input class='button' type='submit' value='Delete'/>
</form>
</td>

<td align=center width='100'><?php echo $id; ?></td>
<td align=center width='100'><?php echo $name; ?></td>
<td align=center width='100'><?php echo $fname; ?></td>
<td align=center width='100'><?php echo $mname; ?></td>
<td align=center width='100'><?php echo $gen; ?></td>
<td align=center width='100'><?php echo $rdate; ?></td>
<td align=center width='100'><?php echo $dob; ?></td>
<td align=center width='100'><?php echo $Tadd; ?></td>
<td align=center width='100'><?php echo $Padd; ?></td>
<td align=center width='100'><?php echo $Mob; ?></td>
<td align=center width='100'><?php echo $email; ?></td>
<td align=center width='100'><?php echo $Pin; ?></td>
<td  align=center width='100'><?php echo $city; ?></td>
<td align=center width='100'><?php echo $state; ?></td>
<td align=center width='100'><?php echo $relign; ?></td>
<td  align=center width='100'><?php echo $category; ?></td>
<td align=center width='100'><?php echo $UG; ?></td>
<td align=center width='100'><?php echo $PG; ?></td>
<td align=center width='100'><?php echo $dept; ?></td>
<td align=center width='100'><?php echo $clg; ?></td>
<td align=center width='100'><?php echo $per; ?></td>
<td align=center width='100'><?php echo $exp; ?></td>
<td align=center width='100'><?php echo $lst; ?></td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>
<?php 
		if(mysql_fetch_assoc($result))
			echo "Record not found";
}
else{
			echo "Please Select an option";	
}
die();			
}
?>




<?php
if(isset($_POST["fact"]) && isset($_POST["del"]))
{
	
require "Connection.php";
 $id=$_POST["fact"];
	$s="DELETE FROM `teacher` WHERE `Faculty Id`='$id'";
	$res=mysql_query($s);
	if(!$res)
		echo mysql_error();
		$s="DELETE FROM `Login` WHERE `Login Id`='$id'";
	$res=mysql_query($s);
	if(!$res)
		echo mysql_error();


	
	require "Connection.php";
$query="SELECT * FROM `teacher` ";
$result=mysql_query($query);
if($result)
{
?>
<html>
<head>
<style>
	#body{
		display:box;
	//	width:2000px;
		//height:1000px;
		//outline:2px solid brown;	
//		background-image: url(images1/tooplate_main.png);
		background-color:blanchedalmond;
	}
	
	table{
		-webkit-transform:translate(5%,100%);
		}
		
		#head{
//		text-align:center;
		color:purple;
		-webkit-transform:translate(1000px,100px);		
	}
</style>
</head>
<body id="body">
<div id="close"><form action="Admin.php" method="post">
	<button>Close</button>
</form>
</div>
	 
<h1 id="head">List of Teachers</h1>
<div class="table-responsive">
	<table   border=1 >
		<tr class="tr"><td></td><td></td>
		<th align=center width='100'>Faculty Id</th>
		<th align=center width='100' >Name</th>
		<th align=center width='100' >Father's name</th>
		<th align=center width='100'>Mother's name</th>
		<th align=center width='100'>Gender</th>
		<th align=center width='100'>Registration Date</th>
		<th align=center width='100'>DOB</th>
		<th align=center width='100'>Temporary Address</th>
		<th align=center width='100'>Permanent Address</th>
		<th align=center width='100'>Mob</th>
		<th align=center width='100'>Email Id</th>
		<th align=center width='100'>Pin code</th>
		<th align=center width='100'>City</th>
		<th align=center width='100'>State</th>
		<th align=center width='100'>Religion</th>
		<th align=center width='100'>Category</th>
		<th align=center width='100'>UG</th>
		<th align=center width='100'>PG</th>
		<th align=center width='100'>Teaching Dept.</th>
		<th align=center width='100'>Graduation Collage</th>
		<th align=center width='100'>Graduation Percentage</th>
		<th align=center width='100'>Teaching experiance</th>
		<th align=center width='100'>Last Teaching Institute</th>
		</tr>					
<?php				
			while($query_row=mysql_fetch_assoc($result))
			{
					$id=$query_row["Faculty Id"];
					$name=$query_row["Name"];
			$fname=$query_row["Father's name"];
			$mname=$query_row["Mother's name"];
			$gen=$query_row["Gender"];
			$rdate=$query_row["Date"];
			$dob=$query_row["DOB"];
			$Tadd=$query_row["Temporary Address"];
			$Padd=$query_row["Permanent Address"];
			$Mob=$query_row["Mob"];
			$email=$query_row["Email Id"];
			$Pin=$query_row["Pin code"];
			$city=$query_row["City"];
			$state=$query_row["State"];
			$relign=$query_row["Religion"];
			$category=$query_row["Category"];
			$UG=$query_row["UG"];
			$PG=$query_row["PG"];
			$dept=$query_row["Teaching Dept."];
			$clg=$query_row["Graduation collage"];
			$per=$query_row["Percentage"];
			$exp=$query_row["Teaching experiance"];
			$lst=$query_row["Last teaching institute"];
?>
<tr><td align=center width='100'>
<form action='Admin.php' method='POST'>
<input type='hidden' value="<?php echo $id;?>" name='facid'/> 
<input type="hidden" name="ed"/>
<input class='but'  type='submit' value='Edit'/>
</form>
</td>
<td align=center width='100'>
<form action='Admin.php'>
<input  type='hidden' value="<?php echo $id; ?>" name='fact'/>
<input type="hidden" value="del" name="del" />
<input class='button' type='submit' value='Delete'/>
</form>
</td>

<td align=center width='100'><?php echo $id; ?></td>
<td align=center width='100'><?php echo $name; ?></td>
<td align=center width='100'><?php echo $fname; ?></td>
<td align=center width='100'><?php echo $mname; ?></td>
<td align=center width='100'><?php echo $gen; ?></td>
<td align=center width='100'><?php echo $rdate; ?></td>
<td align=center width='100'><?php echo $dob; ?></td>
<td align=center width='100'><?php echo $Tadd; ?></td>
<td align=center width='100'><?php echo $Padd; ?></td>
<td align=center width='100'><?php echo $Mob; ?></td>
<td align=center width='100'><?php echo $email; ?></td>
<td align=center width='100'><?php echo $Pin; ?></td>
<td  align=center width='100'><?php echo $city; ?></td>
<td align=center width='100'><?php echo $state; ?></td>
<td align=center width='100'><?php echo $relign; ?></td>
<td  align=center width='100'><?php echo $category; ?></td>
<td align=center width='100'><?php echo $UG; ?></td>
<td align=center width='100'><?php echo $PG; ?></td>
<td align=center width='100'><?php echo $dept; ?></td>
<td align=center width='100'><?php echo $clg; ?></td>
<td align=center width='100'><?php echo $per; ?></td>
<td align=center width='100'><?php echo $exp; ?></td>
<td align=center width='100'><?php echo $lst; ?></td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>
<?php 
		if(mysql_fetch_assoc($result))
			echo "Record not found";
}
else{
			echo "Please Select a Correct option";	
}
die();			
}
?>

<!--END of Faculty-->

<?php
/*if(isset($_SESSION['user_id'])){
	echo $_SESSION["user_id"];
	$count=0;
}

else echo mysql_error();
*/?>

<?php
require "Connection.php";
$q="SELECT * FROM `login` WHERE `Category`='Admin'";
$res=mysql_query($q);
if($res){
	$row=mysql_fetch_assoc($res);
	$AdminId=$row["Login Id"];
}
else echo mysql_error();

?>




 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>SGSITS-Admin</title>
<link href="student.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css1/Admin.css" type="text/css" charset="utf-8" />

</head>
<body>
	
<div id="slider">
    <div id="tooplate_wrapper">
    	
        <div id="tooplate_sidebar">
        	
            <div id="header">
            	<h1><a href="#">Welcome Burhan</a></h1>
            </div>

            <div id="menu">
                <ul class="navigation">
                	<li><a href="#home" class="selected">Home</a></li>
                    <li><a href="#form">Registration of Students</a></li>
                    <li><a href="#about">Registration of Teachers</a></li>
                    <li><a href="#services">Student list</a></li>
                    <li><a href="Admin.php?id='fact'">Faculty list</a></li>
                    <li><a href="#gallery">Upload Grades</a></li>
                    <li><a href="#news">Upload important News</a></li>
                	<li><a href="#contact" class="last">change password</a></li>
                </ul>
            </div>
			
		</div> <!-- end of sidebar -->  
    
        <div id="content">
       	  	<div class="scroll">
        	  <div class="scrollContainer">
				    <div class="panel" id="home">
				<p/><p/><p/><h2>Welcome: Admin</h2>  
			<div class='op' align=center>
		<a href='Check.php?nm=true'>Logout</a>
		<p/><br/>
	</div>

                </div> <!-- end of home -->
				
				<div class="panel" id="form">
                      <p/><br/><p/><br/><p/><h3>For Student Registration</h3><a href="Studentf.html">click here</a>          
						</br></p>
				</div> <!-- end of home -->
				
        	    <div class="panel" id="about">
                        <p/><br/><p/><br/><p/><h3>For Teacher Registration</h3><a href="techerf.html">click here</a>          		
                
      	      	</div> <!-- end of about us -->
				
        	    <div class="panel" id="services">
						<form action="Admin.php" method="post">
					<p/><br/><p/><br/><p/><a href="#"><h2>Select branch</h2></a>
							<input type="radio" name="branch" value="CS"/>CS
							<input type="radio" name="branch" value="CE"/>CE
							<input type="radio" name="branch" value="IT"/>IT
							<input type="radio" name="branch" value="MECH"/>MECH
							<input type="radio" name="branch" value="EC"/>EC
							<input type="radio" name="branch" value="IP"/>IP
							<input type="radio" name="branch" value="EI"/>EI
							<input type="submit" value="View list"/>
							<input type="hidden" name="hidden" value="hid"/>
						</form>					
			 	</div> <!-- end of services -->
			
				<div class="panel" id="faculty">
				
				</div>
			
        	  	<div class="panel" id="gallery">
        	      	<h2>Gradings</h2>
	<head>
		<style>
			table{
				display:box;
				width:50%;
				height:30%;
				-webkit-transform:translate(50%,100%);
			}
		</style>
	</head>
	<div>
		<form action="Admin.php" method="post">
			<label for="author2">Enrollment No:</label><input type="text" id="author2" name="enroll" class="required input_field" />
			<div class="cleaner h10"></div>
			<label for="author2">Branch:</label><input type="hidden" id="author2" name="branch" class="required input_field" />
									<select name="branch">
										<option value="None">None</option>
										<option value="CS">CS</option>
										<option value="CE">CE</option>
										<option value="ME">ME</option>
										<option value="EC">EC</option>
										<option value="IP">IP</option>	
										<option value="IT">IT</option>
										<option value="EI">EI</option>
									</select>
			<div class="cleaner h10"></div>
			<label for="author2">Semester:</label><input type="hidden" id="author2" name="sem" class="required input_field" />
									<select name="sem">
										<option value="None">None</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>	
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
									</select>
			<div class="cleaner h10"></div>
			<label for="author2">SGPA:</label><input type="text" id="author2" name="sgpa" class="required input_field" />
			<div class="cleaner h10"></div>
		
			<input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Upload"/>
		</form>
	</div>
<?php
if(isset($_POST['enroll'])&&isset($_POST['sem'])&&isset($_POST['sgpa'])&isset($_POST["branch"])){
require "Connection.php";
 $id=$_POST['enroll'];
 $br=$_POST['branch'];
 $i=$_POST['sem'];
 $sgpa=$_POST['sgpa'];
$query="UPDATE `$br student` SET `Sem$i`='$sgpa' WHERE `Enrollment No`='$id'";
$result=mysql_query($query);
if($result){
}
else echo mysql_error();
}
?>
					
					
					
      	      	</div> <!-- end of gallery -->
				
				<div class="panel" id="news">
                    <p/><br/><p/><h5>Upload News</h5>
                    <div class="cleaner h30"></div>
                    <div id="contact_form">
                      	<form method="post"  action="Admin.php">
							<label for="author2">Title:</label><input type="text" id="author2" name="title" class="required input_field" />
							<div class="cleaner h10"></div>
					
							<label for="text">Message:</label><textarea id="text" name="msg" rows="0" cols="0" class="required"></textarea>
							<div class="cleaner h10"></div>
							
							<input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Upload" />
							<input type="reset" class="submit_btn float_r" name="reset" id="reset" value="Reset" />
						
                    	</form>
						
                  	</div>
        	  	</div>					
					
	        	    <div class="panel" id="contact">
                   <p/><br/><p/> <h5>Account details</h5>
                    <div class="cleaner h30"></div>
                    <div id="contact_form">
					<form method="post" name="contact" action="UpdatePass.php">
					  
							<label for="author2">Admin Id:</label><input type="text" id="author2" name="enroll" value="<?php echo $AdminId ?>" class="required input_field" />
							<div class="cleaner h10"></div>
							
						<label for="email">Old Password:</label><input type="password" name="old" id="text" class="required" />
							<div class="cleaner h10"></div>
							
							<label for="text">New Password:</label><input type="password" id="text" name="passnew"  class="required"/>
							<div class="cleaner h10"></div>

							<label for="text">Confirm Password:</label><input type="password" id="text" name="pass"  class="required"/>
							<div class="cleaner h10"></div>
							
							<input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Change" />
							<input type="reset" class="submit_btn float_r" name="reset" id="reset" value="Reset" />
						
                    	</form>
						
                  	</div>
        	  	</div>

				</div> <!-- end of scroll -->
		</div>
		
        <div class="cleaner"></div>
	</div>
    </div> <!-- end of content -->
	
   <div id="footer">
        Copyright ©Developer: <b>Anand Sajankar & Burhanuddin Dabriwala</b>© 2016 
       
	</div>

</div>
</body>
</html>

<?php
}
?>