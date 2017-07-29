<?php 
session_start();

if(isset($_SESSION['user_id']) && $_SESSION["cat"]=="Faculty" ){
	$count=0;


if(isset($_POST["username"]))
{
	$id=$_POST["username"];
$query="SELECT * FROM `teacher` WHERE `Faculty Id`='$id'";
$query_run=mysql_query($query);
if($query_run)
{
	$query_row=mysql_fetch_assoc($query_run);
			$nm=$query_row['Name'];
			$mob=$query_row["Mob"];
}
}
else echo mysql_error();
?>

<?php
if(isset($_POST["fid"]))
{
	$id=$_POST["fid"];
}
?>




 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>SGSITS-Student Home</title>
<link href="student.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css1/teach.css" type="text/css" charset="utf-8" />

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
                    <li><a href="#form">Add Subject</a></li>
                    <li><a href="#about">Search Student record</a></li>
                    <li><a href="#services">Upload Attendance</a></li>
                    <li><a href="#gallery">Upload Sessionals</a></li>
                	<li><a href="#contact" class="last">change password</a></li>
                </ul>
            </div>
			
		</div> <!-- end of sidebar -->  
    
        <div id="content">
       	  	<div class="scroll">
        	  <div class="scrollContainer">
				    <div class="panel" id="home">
				<br/><p/><br/><h2>Welcome: <?php if(isset($_POST["nm"])) $nm=$_POST["nm"]; echo $nm; ?></h2>  
			<div class='op' align=center>
		<a href='Check.php?nm=true'>Logout</a>
		<p/><br/>
	</div>

                </div> <!-- end of home -->
				
				<div class="panel" id="form">
                      <br/><br/><p/><p/><h2>Add subject</h2>   
						<form action="loginFaculty.php" method="post">
							<p/><label>Subject Code</label><input type="text" name="code"/>
							<p/><label>Branch</label><input type="text" name="brnch"/>
							<p/><label>Semester</label><input type="text" name="sem"/>
							<p/><input type="Submit" value="Add"/>	
							<input type="hidden" name="nm" value="<?php echo $nm; ?>"/>
							<input type="hidden" name="fid" value="<?php echo $id; ?>"/>
							</form>
                </div> <!-- end of home -->
				
        	    <div class="panel" id="about">
                    <div class="cleaner h30"></div>
                    <div id="contact_form">
					<form method="post"  action="loginFaculty.php">
		
							<br/><br/><label for="author2">Enrollment No.:</label><input type="text" id="author2" name="enroll"  class="required input_field" />
							<div class="cleaner h10"></div>
							
							<label for="author2">Branch:</label><input type="text" id="author2" name="br"  class="required input_field" />
							<div class="cleaner h10"></div>
							
							<input type="hidden" name="nm" value="<?php echo $nm; ?>"/>
							<input type="hidden" name="fid" value="<?php echo $id; ?>"/>
							<input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Search" />
							<input type="reset" class="submit_btn float_r" name="reset" id="reset" value="Reset" />
						
                    </form>
						
                  	</div>

      	      	</div> <!-- end of about us -->
				
        	    <div class="panel" id="services">
                   <p/><br/><p/><p/> <h2>Attendance</h2>
				
				<div class="Attend">
		<form action="loginFaculty.php" method="post">
			<label for="author2">Branch:</label><input type="hidden" id="author2" name="enroll" class="required input_field" />
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
			<label for="author2">Semester:</label><input type="hidden" id="author2" name="enroll" class="required input_field" />
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
			<label for="author2">Subject Code:</label><input type="text" id="author2" name="code" class="required input_field" />
							<input type="hidden" name="fid" value="<?php echo $id; ?>"/>
			<input type="hidden" name="nm" value="<?php echo $nm;?>" />
			<input type="hidden" name="cat" value="<?php echo "Attendance";?>">
			<div class="cleaner h10"></div>
							<input type="submit" class="submit_btn float_l" name="submit" id="submit" value="View List" />
		</form>
	</div>
                    
      	      	</div> <!-- end of services -->
				
        	  	<div class="panel" id="gallery">
        	      	<p/><br/><p/><p/><h2>Sessionals</h2>
						<div class="Attend">
		<form action="loginFaculty.php" method="post">
			<label for="author2">Branch:</label><input type="hidden" id="author2" name="enroll" class="required input_field" />
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
			<label for="author2">Semester:</label><input type="hidden" id="author2" name="enroll" class="required input_field" />
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
			<label for="author2">Subject Code:</label><input type="text" id="author2" name="code" class="required input_field" />
			<input type="hidden" name="nm" value="<?php echo $nm;?>"/>
							<input type="hidden" name="fid" value="<?php echo $id; ?>"/>
			<input type="hidden" name="cat" value="<?php echo "Sessional";?>">
			<div class="cleaner h10"></div>
	        <input type="submit" class="submit_btn float_l" name="submit" id="submit" value="View List" />
		</form>
	</div>
			
					
      	      	</div> <!-- end of gallery -->
				
	        	    <div class="panel" id="contact">
                  <p/><br/><p/><p/> <h2><?php echo $nm; ?></h2>
                    <h5>Account details</h5>
                    <div class="cleaner h30"></div>
                    <div id="contact_form">
					<form method="post" name="contact" action="UpdatePass.php">
					  <?php if(isset($_POST["fid"]))$id=$_POST["fid"]; ?>
					  
							<label for="author2">Faculty Id:</label><input type="text" id="author2" name="enroll" value="<?php echo $id; ?>" class="required input_field" />
							<div class="cleaner h10"></div>
							
					
						<label for="email">Old Password:</label><input type="password" name="old" id="text" class="required" />
							<div class="cleaner h10"></div>
							
							<label for="text">New Password:</label><input type="password" id="text" name="passnew"  class="required"/>
							<div class="cleaner h10"></div>

							<label for="text">Confirm Password:</label><input type="password" id="text" name="pass"  class="required"/>
							<div class="cleaner h10"></div>
							<input type="hidden" name="fid" value="<?php echo $id; ?>">
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
if(isset($_POST["enroll"])&&isset($_POST["br"])&&isset($_POST["nm"])){
$enroll=$_POST["enroll"];
 $br=$_POST["br"];
 $nm=$_POST["nm"];
 $id=$_POST["fid"];
$count=1;
?>	
<html>
<style>
	.search{
		display:block;
		margin-left:50%;
	}
</style>
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
                    <li><a href="#form">Add Subject</a></li>
                    <li><a href="#about">Search Student record</a></li>
                    <li><a href="#services">Upload Attendance</a></li>
                    <li><a href="#gallery">Upload Sessionals</a></li>
                	<li><a href="#contact" class="last">change password</a></li>
                </ul>
            </div>
			
		</div> <!-- end of sidebar -->  
        <div id="content">
       	  	<div class="scroll" class="search">
        	  <div class="scrollContainer">

			<h2>Academic Record </h2>
					<?php
					require 'Connection.php';
					$query="SELECT * FROM `$br student` WHERE `Enrollment No`='$enroll'";
					$result=mysql_query($query);
					if($result){
					$query_row=mysql_fetch_assoc($result);
					$sem=array(8);
					for($i=1;$i<9;$i++)
					$sem[$i]=$query_row["Sem$i"];
					}
					?>
					<h3><?php echo $query_row["Name"]; echo "<p/>".$enroll;?> </h3>
					<?php if($sem[1]==0){
							echo "<h3>No Record found</h3>";
						}
					else{
						?>
					<table border=1 cellspacing=1 width="500">
					<tr>
					<td>Semester</td><td>SGPA/CGPA</td><td>Result</td>
					</tr>
					<?php
					}
					for($i=1;$i<8;$i++)
					{
					if($sem[$i]==0){
					break;
					}
					?>
					<tr>
					<td><?php echo $i;?></td><td><?php echo $sem[$i];?></td><td><?php if($sem[$i]>4.5) echo "Pass"; else echo "Fail";?></td>
					</tr>
					<?php } ?>
					</table> 
							<form action="loginFaculty.php" method="post">
		<input type="hidden" name="nm" value="<?php echo $nm; ?>">					
		<input type="hidden" name="fid" value="<?php echo $id; ?>">					
		<input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Ok" />
		 </form>

				</div>
			</div>
		</div>
	</div>
		</div>
</body>
</html>
<?php	die(); } ?>


<!--My subject-->

<?php
if(isset($_POST["code"])&&isset($_POST["brnch"])&&isset($_POST["sem"])){
require 'Connection.php';
 $code=$_POST["code"];
$sem=$_POST["sem"];
$br=$_POST["brnch"];
$query="CREATE TABLE `$code` ( `Enrollment No` VARCHAR(15) NOT NULL , `Name` VARCHAR(50) NOT NULL , `Branch` VARCHAR(6) NOT NULL , `Attendance` DOUBLE NOT NULL DEFAULT '0' , `Sessionals` DOUBLE NOT NULL DEFAULT '0' , PRIMARY KEY (`Enrollment No`)) ENGINE = InnoDB"; 
$execute=mysql_query($query);
if(!$execute){
	echo mysql_error();
}
$query="SELECT * FROM `$br student` WHERE `Semester`='$sem'";
$query_run=mysql_query($query);
if($query_run)
{
	$count=1;
	while($query_row=mysql_fetch_assoc($query_run))
		{
			$id=$query_row['Enrollment No'];
			$nm=$query_row['Name'];
			$q="INSERT INTO `$code` (`Enrollment No`,`Name`,`Branch`) VALUES ('$id','$nm','$br')";
			$result=mysql_query($q);
			if(!$result)
				echo mysql_error();
		}
}
else echo mysql_error();
}
?>



<!--Attendance  -->
<?php  
if(isset($_POST["cat"])&&isset($_POST["code"])&&isset($_POST["branch"])&&isset($_POST["sem"])){
 $code=$_POST["code"];
 $br=$_POST["branch"];
	$sem=$_POST["sem"];
 $nm=$_POST["nm"];
 $cat=$_POST["cat"];
$id=$_POST["fid"];
$count=1;
?>	
<html>
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
                    <li><a href="#form">Add Subject</a></li>
                    <li><a href="#about">Search Student record</a></li>
                    <li><a href="#services">Upload Attendance</a></li>
                    <li><a href="#gallery">Upload Sessionals</a></li>
                	<li><a href="#contact" class="last">change password</a></li>
                </ul>
            </div>
			
		</div> <!-- end of sidebar -->  
        <div id="content">
       	  	<div class="scroll" class="search">
        	  <div class="scrollContainer">

			<h2>Student List </h2>
					<body>
					<form action="LoginFaculty.php" method="post">
					<table class="tab" border=2 cellspacing=2>
					<tr><td>Enrollment No</td><td>Name</td><td><?php if($cat=="Attendance") echo "Attendance(in %)"; else echo "Marks (out of 50)";?></td></tr>
					<?php
					require "Connection.php";
					$query="SELECT * FROM `$code`";
					$query_run=mysql_query($query);
					if($query_run)
					{
					$c=1;
					echo "sklmd"; 
					while($query_row=mysql_fetch_assoc($query_run))
					{
					$enroll=$query_row['Enrollment No'];
					$name=$query_row['Name'];

					?>
					<input type="hidden" value="<?php echo $code; ?>" name="code" />
					<input type="hidden" value="<?php echo $enroll; ?>" name="id<?php echo $c;?>" />
					<tr><td><?php echo $enroll;?></td><td><?php echo $name;?></td><td><input type='text' name="attend<?php echo $c;?>"/></td></tr>

					<?php $c++;
					?>
					<?php } ?>
					<input type="hidden" value="<?php echo $c; ?>" name="count"/>
					<input type="hidden" value="<?php echo $nm;?>" name="nm"/>
					<input type="hidden" value="<?php echo $id;?>" name="fid"/>
					<input type="hidden" value="<?php echo $cat;?>" name="cat"/>
					<tr><td></td><td align=center><input type="Submit" Value="Upload"/></td></tr>
					</table>
					</form>
					<?php
					}?>
				</div>
			</div>
		</div>
	</div>
		</div>
</body></html>
<?php }?>


<?php 
if(isset($_POST["attend1"])&&$_POST["cat"]=="Attendance"){
 $code=$_POST["code"];
 $c=$_POST["count"];
for($i=1;$i<$c;$i++)
{
 $j=$_POST["attend$i"];
$id=$_POST["id$i"];
require 'Connection.php';
$q="UPDATE `$code` SET `Attendance`='$j' WHERE `Enrollment No`='$id'";
$res=mysql_query($q);
if(!$res)
	die(mysql_error());
}
if($res){
echo "Attendance is Updated";	
}
}
?>

<!-- end of Attendance-->


<!--Sessionals-->
<?php
if(isset($_POST["attend1"])&&$_POST["cat"]=="Sessional"){
$code=$_POST["code"];
$count=$_POST["count"];
for($i=1;$i<$count;$i++)
{
$j=$_POST["attend$i"];
$id=$_POST["id$i"];
require 'Connection.php';
$q="UPDATE `$code` SET `Sessionals`='$j' WHERE `Enrollment No`='$id'";
$res=mysql_query($q);
if(!$res)
	echo mysql_error();
else
	echo mysql_error();
}
}

}

?>