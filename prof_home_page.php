<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["prof_ID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>XYZ Institute of Technology ERP</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	
		<?php include"navbar.php";?><br>
		
		
		<img src="img/1.jpg" style="margin-left:90px;" class="sha">
			
			<div id="section">
			
				<?php include"sidebar.php";?><br>
				
				<div class="content">
					<h3 class="text">Welcome <?php echo $_SESSION["prof_name"]; ?></h3><br><hr><br>
						<h3 > College Information</h3><br>
					<img src="img/home.jpg" class="imgs">
					<p class="para">
                        Welcome to the XYZ Institute of Technology's ERP system! Our ERP system is a comprehensive software solution that provides a suite of tools to manage the various functions and processes of our college. Our ERP system includes modules for managing student data, admission processes, course schedules, faculty and staff management, attendance tracking, library management, financial aid management, and more.
					</p>
					<p class="para">
                        Our ERP system is designed to improve the efficiency and productivity of our college operations by automating administrative tasks and streamlining communication between departments. We understand the importance of providing better visibility and transparency into college operations, and our ERP system is specifically designed to meet this need.
					</p>
                    <p>
                        Our ERP system provides a centralized system for managing college operations, helping to reduce errors and ensure consistency across departments. Our system is designed to improve data accuracy and accessibility, which is critical for regulatory compliance and reporting.
                    </p>
                    <p>
                        We are confident that our ERP system will make college operations more efficient, effective, and streamlined, while also providing a better experience for students, faculty, and staff. We are committed to providing the best possible experience for all users of our ERP system and are constantly working to improve its functionality and capabilities. Thank you for choosing our ERP system for your college operations!
                    </p>
				</div>
				
			</div>
	
		<?php include"footer.php";?>
	</body>
</html>