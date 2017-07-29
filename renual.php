<?php
session_start();
if(isset($_SESSION["user_id"]) && $_SESSION["cat"]=="Student" )
{
	require "Connection.php";
 $id=$_GET['id'];
$query="SELECT * FROM `Login` WHERE `Login Id`='$id'";
$result=mysql_query($query);
if($result)
{
	$query_row=mysql_fetch_assoc($result);
	$br=$query_row['Branch'];
	$query="SELECT * FROM `$br student` WHERE `Enrollment No`='$id'";
	$r=mysql_query($query);
	if($r)
	{
		$query_row=mysql_fetch_assoc($r);
		$nm=$query_row['Name'];
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
			$course=$query_row['Course name'];
			$branch=$query_row['Branch name'];
			$board=$query_row['School board'];
			$per10=$query_row['10th percentage'];
			$per12=$query_row['12th percentage'];
			
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
		<style>
			#imp{
					color:red;
				}
	
		</style>
		<title>Student-Registration Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="default.css"/>
    </head>
    <body>    
        <form action="loginstud1.php" method="post" class="register">
            <h1>Enrolled Id:<?php echo $id; ?></h1>
            <fieldset class="row2">
                <legend>Personal Details
                </legend>
                <p>
                    <label>Name 
                    </label>
                    <input type="text" name="nm" value="<?php echo $nm;?>" class="long"/>
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
                    <input class="long" type="text" name="tad" value="<?php echo $Tadd; ?>" placeholder="Enter Temporary address" value=""/>

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
				<label>Renual Reg. date:</label><input type="date" name="date" />
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
                    <label>Course
                    </label>
                    <select name="course">
						<option value="Select">Select</option>
						<option value="BE">BE</option>
					</select>
                	<label>Admission Year</label>
				<input type="date" name="date" value="<?php echo $rdate; ?>" />
			</p>
                <p>
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
               
				<label>Name of Last Exam</label>
								<select name='exam'>
									<option value='Nov 2016'>Nov-Dec 2016</option>
									<option value='April 2016'>April-May 2016</option>
									<option value='Nov 2015'>Nov-Dec 2015</option>
									<option value='April 2015'>March-April 2015</option>
									<option value='December 2014'>December-Jan 2014</option>
									<option value='April 2014'>April-May 2014</option>
								<select/>

				</p>
<p/><br/><p id='imp'>Note:- Take a Print of this form and attach it with a challan of required Fees and Submit to collage's Account office.</p>   
            </fieldset>
            <fieldset class="row4">
                <legend>Terms and Conditions
                </legend>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>I accept the <a href="#">Terms and Conditions</a></label>
                </p>
            </fieldset>

		<input type="hidden" name="nm" value="<?php echo $nm; ?>">			
		<input type="hidden" name="br" value="<?php echo $br; ?>">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
	
            <div><button class="button">Register &raquo;</button></div>
        </form>
    </body>
</html>
<?php
}
?>