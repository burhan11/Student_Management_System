<?php
session_start();
if(isset($_SESSION['user_id']) && $_SESSION["cat"]=="Student" ){
if(isset($_POST['br'])&&isset($_POST['id'])){
require 'Connection.php';
 $br=$_POST['br'];
	$id=$_POST['id'];
}
if(!isset($_POST['br'])&&!isset($_POST['id'])){
 $br=$query_row['Branch'];
 $id=$query_row['Login Id'];
}
$query="SELECT * FROM `$br Student`";
$query_run=mysql_query($query);
if($query_run)
{
	while($query_row=mysql_fetch_assoc($query_run))
		{
			$nm=$query_row['Name'];
			$mob=$query_row['Mob'];
			if($id==$query_row['Enrollment No']){
				break;
			}
		}
}
else mysql_error();

if(isset($_POST["exam"])){
	require "Connection.php";
	$id=$_POST["id"];
	$br=$_POST["br"];
	$query="SELECT `Semester` FROM `$br student` WHERE `Enrollment No`='$id'";
	$r=mysql_query($query);
	$row=mysql_fetch_assoc($r);
	$c=$row["Semester"];
	$c++;
	$q="UPDATE `$br student` SET `Semester`='$c' WHERE `Enrollment No`='$id'";
	if($res=mysql_query($q))
		echo "Registration complete";
	else 
		echo mysql_error();
}
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>SGSITS-Student Home</title>
<link href="student.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css1/coda-slider.css" type="text/css" charset="utf-8" />

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
                    <li><a href="#about">Registration Renual</a></li>
                    <li><a href="#services">View Attendance</a></li>
                    <li><a href="#gallery">View Academic records</a></li>
                	<li><a href="#contact" class="last">change password</a></li>
                </ul>
            </div>
			
		</div> <!-- end of sidebar -->  
    
        <div id="content">
       	  	<div class="scroll">
        	  <div class="scrollContainer">
				    <div class="panel" id="home">
	<p/><br/><p/><h2>Welcome: <?php if(isset($_POST["nm"])) $nm=$_POST["nm"]; echo $nm; ?></h2>  
			<div class='op' align=center>
		<a href='Check.php?nm=true'>Logout</a>
		<p/><br/>
	</div>

                </div> <!-- end of home -->
				
				
        	    <div class="panel" id="about">
                	<p/><br/><p/><br/><h3>For Renual registeration</h3><a href="renual.php?id=<?php echo $id;?>">click here</a> 
                    
      	      	</div> <!-- end of about us -->
				
        	    <div class="panel" id="services">
                    <p/><br/><p/><br/><p/><h2>Attendance</h2>
						<form action='myAttend.php'>
						<input type='hidden' name='br' value='<?php echo $br; ?>'/>
						<input type='hidden' name='id' value='<?php echo $id; ?>'/>
						Subject Code:<input type='text' name='code'/><input type='Submit' value='View'/>
				</form>

                    
      	      	</div> <!-- end of services -->
				
        	  	<div class="panel" id="gallery">
        	      	<p/><br/><p/><br/><p/><h2>Academic Record</h2>
						<?php
						require 'Connection.php';
						$query="SELECT * FROM `$br student` WHERE `Enrollment No`='$id'";
						$result=mysql_query($query);
						if($result){
						$query_row=mysql_fetch_assoc($result);
						$nm=$query_row['Name'];
						$sem=array(8);
						for($i=1;$i<9;$i++)
						$sem[$i]=$query_row["Sem$i"];
						}
						?>
	
	<h3><?php echo $nm; echo "<p/>".$id;?> </h3>
					<?php if($sem[1]==0){
							echo "<h3>No Record found</h3>";
						}
					else{
					?>
		<table border=1 cellspacing=1 width="400" height="70" >
			<tr>
			<td>Semester</td><td>SGPA/CGPA</td><td>Result</td>
			</tr>
	<?php
			}
		for($i=1;$i<7;$i++)
		{
		if($sem[$i]==0)
			break;
	?>
			<tr>
			<td>Sem <?php echo $i;?></td><td><?php echo $sem[$i];?></td><td><?php if($sem[$i]>4.5) echo "Pass"; else echo "Fail";?></td>
			</tr>
	<?php } ?>
		</table> 
			<form action="loginstud1.php" method="post">
		<input type="hidden" name="nm" value="<?php echo $nm; ?>">			
		<input type="hidden" name="br" value="<?php echo $br; ?>">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Ok" />
		 </form>

					
      	      	</div> <!-- end of gallery -->
				
	        	    <div class="panel" id="contact">
                   <p/><h2><?php echo $nm; ?></h2>
                    <h5>Account details</h5>
                    <div class="cleaner h30"></div>
                    <div id="contact_form">
					<form method="post" name="contact" action="UpdatePass.php">
					  
							<label for="author2">Enrollment No.:</label><input type="text" id="author2" name="enroll" value="<?php echo $id ?>" class="required input_field" />
							<div class="cleaner h10"></div>
							
							<label for="author2">Branch:</label><input type="text" id="author2" name="brnch" value="<?php echo $br ?>" class="required input_field" />
							<div class="cleaner h10"></div>
					
							<label for="author2">Contact No.</label><input type="tel" id="author2" name="mob" value="<?php echo $mob ?>" class="required input_field" />
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