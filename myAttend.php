<?php
session_start();
if(isset($_SESSION["user_id"]) && $_SESSION["cat"]=="Student" )
{
	if(isset($_GET['br'])&&isset($_GET['id'])&&isset($_GET['code'])){
require 'Connection.php';
	 $br=$_GET['br'];
	 $id=$_GET['id'];
 $code=$_GET['code'];
$query="SELECT * FROM `$code` WHERE `Enrollment No`='$id'";
$query_run=mysql_query($query);
if($query_run)
{
	$query_row=mysql_fetch_assoc($query_run);
			$nm=$query_row['Name'];
			$attend=$query_row['Attendance'];
}
		else{
			echo "Subject Code not Found";
		require 'loginstud1.php';
		die();
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
				
                	<h3>Attendance</h3>

        	    <div class="panel" id="services">
                    <div class="cleaner h30"></div>
                    <div id="contact_form">
                      	<form method="post" name="contact" action="#">
						<br/><br/>	<label for="author2">Enrollment No:</label><input type="text" id="author2" name="author" value="<?php echo $id; ?>" class="required input_field" />
							<div class="cleaner h10"></div>
				
				
							<label for="author2">Name:</label><input type="text" id="author2" name="author" value="<?php echo $nm; ?>" class="required input_field" />
							<div class="cleaner h10"></div>
							
							<label for="email">Subject Code:</label><input type="text" id="email" name="email" value="<?php echo $code; ?>" class="validate-email required input_field" />
							<div class="cleaner h10"></div>
							
							<label for="text">Attendance(in%):</label><input type="text" id="text" name="text" value="<?php echo $attend; ?>" class="required"></textarea>
							<div class="cleaner h10"></div>
                    	</form>
								<form action="loginstud1.php" method="post">
									<input type="hidden" name="nm" value="<?php echo $nm; ?>">			
									<input type="hidden" name="br" value="<?php echo $br; ?>">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Ok" />
							   </form>
													
                  	</div>
        	  	</div>

					
					
					</h2>   
                                
                </div> <!-- end of home -->
				
        	    <div class="panel" id="about">
          <br/><br/><br/>    <h2>View Attendance</h2>
                    
      	      	</div> <!-- end of about us -->
				
        	    <div class="panel" id="services">
                    <h2>View Attendance</h2>		

					<form action='myAttend.php'>
						<input type='hidden' name='br' value='<?php echo $br; ?>'/>
						<input type='hidden' name='id' value='<?php echo $id; ?>'/>
						Subject Code:<input type='text' name='code'/><input type='Submit' value='View'/>
					</form>

					

                    
      	      	</div> <!-- end of services -->
				
        	  	<div class="panel" id="gallery">
        	      	<h2>View</h2>
        	      	
      	      	</div> <!-- end of gallery -->
				
	        	    <div class="panel" id="contact">
                    <h2>Fill-Exam Form</h2>
                    <h5>Company Name</h5>
                    224-448 Suspendisse velit nisi,<br />
                    Duis consequat tempus, 10880<br />
                    Cras sit amet ipsum sit
                    <div class="cleaner h30"></div>
                    <div id="contact_form">
					<form method="post" name="contact" action="UpdatePass.php">
					  
							<label for="author2">Enrollment No.:</label><input type="text" id="author2" name="enroll" value="<?php echo $id ?>" class="required input_field" />
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
else mysql_error();
}
?>